<?php

class OrderController extends Controller
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
			t('Order','admin')  => $this->createUrl('/admin/user/index'),
			t('Index','admin'),
		);
		// Get model contains users's information
		$orders = new Orders();
		$this->render('index',array('orders'=>$orders));
	}
	
	public function actionView()
	{
		// Breadcrumbs
		$this->breadcrumbs = array(
			t('Order','admin')  => $this->createUrl('/admin/order/index'),
			t('View'),
		);
		
		//  要求からIDをとる。もしIDがないと４０４ページを表示
		$id = Yii::app()->request->getParam('id');
		if ($id == NULL)
			throw new CHttpException('404','Param is not enough');
		// IDからModelをみつける。もし見つけません、４０４ページを表示する
		$order = Orders::model()->findByPk($id);
		if ($order == NULL)
			throw new CHttpException('404',Yii::t('user','Object not found'));
		// Load all data history about this order
		$dataProvider = new CActiveDataProvider('OrdersHistory',array(
			'criteria'=>array(
				'condition'=>"order_id = $order->id",
				'order'    =>"time ASC",
			),
		));
		$this->render('view',array(
			'order'=>$order,
			'dataProvider'=>$dataProvider,
		));
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
		$status = $order->getLastestStatus();
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
	
	public function actionFinish()
	{
		// Breadcrumbs - パン粉
		$this->breadcrumbs = array(
			t('Order','admin')  => $this->createUrl('/admin/order/index'),
			t('Finish','admin'),
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
		if (( $status != OrdersHistory::HISTORY_CREATE) && 
			( $status != OrdersHistory::HISTORY_CREATE_ADMIN))
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
		if ($order->end_time > date('H:i'))
			$order->real_stop_time = date('H:i');
		else 
			$order->real_stop_time = $order->end_time; 
		if (!$order->save()) {
			logged("Error when save Order model:".dump($order->errors));
			return false;
		}
		// save log
		logged("$order->id | ".Yii::app()->user->name. "Finish Order");
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
		if (( $status != OrdersHistory::HISTORY_CREATE) && 
			( $status != OrdersHistory::HISTORY_CREATE_ADMIN))
			throw new CHttpException('500',t('Your order have already deleted or stopped'));
		
		// Save order history
		$orderHistory = new OrdersHistory();
		$orderHistory->order_id = $order->id;
		$orderHistory->user_id  = Yii::app()->user->id;
		$orderHistory->status   = OrdersHistory::HISTORY_OVERTIME;
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