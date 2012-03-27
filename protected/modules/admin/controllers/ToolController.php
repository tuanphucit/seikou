<?php

class ToolController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated users to access all actions
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionIndex()
	{
		// Breadcrumbs - パン粉
		$this->breadcrumbs = array(
			t('Tool','admin')  => $this->createUrl('/admin/tool/index'),
			t('Index','admin'),
		);
		$this->render('index');
	}
	
	public function actionExportcsv()
	{
		// Breadcrumbs
		$this->breadcrumbs = array(
			t('Tool','admin')  => $this->createUrl('/admin/tool/index'),
			t('Export CSV'),
		);
		
		// STEP0 : init data
		$systemCode = "CSY-RVR-GWK52M78";
		$year  = request('year');
		$month = request('month');
		if (!$year || !$month) {
			$content = 0;
			$this->render('exportcsv',array('content'=>$content));
			return;
		}
		$month = $month + 0;
		if ($month < '10') $month = '0'.$month;
		// Get current user
		$user = Users::model()->findByPk(Yii::app()->user->id); 
		$csvData = array(
			array(
				$systemCode, $year, $month, date('Y'), date('m'), date('d'), date('H'), date('i'), date('s'), $user->username, $user->full_name      
			)
		);
		logged("First row:".dump($csvData));
		// Init total price for all user
		$users = Users::model()->findAll("role != ".Users::USER_ADMIN,array("order"=>"full_name ASC"));
		$total = array();
		foreach ($users as $user){
			$total[$user->id] = 0;
		}

		// STEP1 : load all fee
		$fee = Fee::model()->find();
		
		// STEP2 : load all order in month
		$thisMonth = "$year-$month";
		$nextMonth = "$year-{$month}9";
		$orders = Orders::model()->findAll("(end_date > '$thisMonth') and (end_date < '$nextMonth')"); 
		
		// STEP3 : with each order , calc total price for users
		foreach($orders as $order){
			$status = $order->getLastestStatus();
			logged("{$order->id}:".OrdersHistory::getStatusTypeLabel($status));
			switch ($status) {
				case OrdersHistory::HISTORY_CANCEL_USER : 
					$total[$order->user_id] += $fee->cancel;
					break;
				case OrdersHistory::HISTORY_FINISH : 
					$total[$order->user_id] += $order->total;
					break;				
				case OrdersHistory::HISTORY_OVERTIME : 
					$total[$order->user_id] += ($order->total + $fee->penalty*$order->overTime());
					break;
			}
		}
		
		logged(dump($total));
		// STEP4: Join all users'sdata
		foreach ($users as $user)
			if ($total[$user->id] != 0) {
				$csvData[] = array(
					$user->username, $user->full_name, $total[$user->id], $user->address2
				);
			}
		
		// Final export
		Yii::import('ext.CSVExport');
		$csv = new CSVExport($csvData);
		$content = $csv->toCSV();
		$filename = 'produse.csv';
		//$content = $csv->toCSV($filename, ",", "\"");           
		Yii::app()->getRequest()->sendFile($filename, $content, "text/csv", false);
		exit();
		$this->render('exportcsv',array('content'=>$content));
	}
	
	public function actionAdd()
	{
		// Breadcrumbs - パン粉
		$this->breadcrumbs = array(
			t('Order','admin')  => $this->createUrl('/admin/user/index'),
			t('Add','admin'),
		);
		$user = new Users();
		if(isset($_POST['Users']))
		{
			logged("Have user submit".dump($_POST['Users']));
			// パラメータ をとる
			$currentPassword  = $_POST['Users']['password'];
			$user->attributes = $_POST['Users'];
			if ($user->password != $currentPassword)
				$user->password = sha1(md5($user->password));
			// 保存と検証する
			if($user->save()){
				Yii::app()->user->setFlash('success',Yii::t('admin','Add user successful'));
				$this->redirect(array('view','id'=>$user->id));
			}
			else 
				Yii::app()->user->setFlash('error',Yii::t('admin','Add user failed'));
		}
		$this->render('add',array('user'=>$user));
	}
	
	public function actionDelete()
	{
		// Breadcrumbs - パン粉
		$this->breadcrumbs = array(
			t('Order','admin')  => $this->createUrl('/admin/order/index'),
			t('Delete','admin'),
		);
		
		//  要求からIDをとる。もしIDがないと４０４ページを表示
		$id = Yii::app()->request->getParam('id');
		if ($id == NULL)
			throw new CHttpException('404','Param is not enough');
		// IDからModelをみつける。もし見つけません、４０４ページを表示する
		$order = Orders::model()->findByPk($id);
		if ($order == NULL)
			throw new CHttpException('500',Yii::t('user','Object not found'));
		
		// save log
		logged("$order->id | ".Yii::app()->user->name. "Delete Order");
		if (($order->getLastestStatus() == OrdersHistory::HISTORY_CANCEL_ADMIN) || 
			($order->getLastestStatus() == OrdersHistory::HISTORY_CANCEL_USER))
			throw new CHttpException('500',t('Your order have already deleted'));
		
		// Save order history
		$orderHistory = new OrdersHistory();
		$orderHistory->order_id = $order->id;
		$orderHistory->user_id  = Yii::app()->user->id;
		$orderHistory->status   = OrdersHistory::HISTORY_CANCEL_ADMIN;
		$orderHistory->time     = new CDbExpression('NOW()');
		if (!$orderHistory->save()) {
			logged("Error when save OrderHistory model:".dump($order->errors));
			return false;
		}
		return true;
	}
	
	public function actionStop()
	{
		// Breadcrumbs - パン粉
		$this->breadcrumbs = array(
			t('Order','admin')  => $this->createUrl('/admin/order/index'),
			t('Stop','admin'),
		);
		
		//  要求からIDをとる。もしIDがないと４０４ページを表示
		$id = Yii::app()->request->getParam('id');
		if ($id == NULL)
			throw new CHttpException('404','Param is not enough');
		// IDからModelをみつける。もし見つけません、４０４ページを表示する
		$order = Orders::model()->findByPk($id);
		if ($order == NULL)
			throw new CHttpException('500',Yii::t('user','Object not found'));
		
		$status = $order->getLastestStatus(); 
		if (( $status == OrdersHistory::HISTORY_CANCEL_ADMIN) || 
			( $status == OrdersHistory::HISTORY_CANCEL_USER)   ||
			( $status == OrdersHistory::HISTORY_FINISH))
			throw new CHttpException('500',t('Your order have already deleted or stopped'));
		
		// Save order history
		$orderHistory = new OrdersHistory();
		$orderHistory->order_id = $order->id;
		$orderHistory->user_id  = Yii::app()->user->id;
		$orderHistory->status   = OrdersHistory::HISTORY_FINISH;
		$orderHistory->time     = new CDbExpression('NOW()');
		if (!$orderHistory->save()) {
			logged("Error when save OrderHistory model:".dump($orderHistory->errors));
			return false;
		}
		// Save real stop time
		$order->real_stop_time = new CDbExpression("NOW()");
		if (!$order->save()) {
			logged("Error when save Order model:".dump($order->errors));
			return false;
		}
		// save log
		logged("$order->id | ".Yii::app()->user->name. "Stop Order");
		return true;
	}
}