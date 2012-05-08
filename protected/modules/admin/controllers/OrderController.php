<?php

class OrderController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations　（　RUD操作のためのアクセス制御を実行します　）
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated users to access all actions　　（　されたユーザーはすべてのアクションへのアクセスを許可する　）
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users　(すべてのユーザーを拒否する。)
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
		// Get model contains users's information　　　（ユーザの情報が含まれているモデルをうける。）
		$orders = new Orders();
		
		// Construct order search form
		$searchOrder = new SearchOrderForm();
		if (isset($_GET['SearchOrderForm'])){
			$searchOrder->attributes = $_GET['SearchOrderForm'];
			// After get params must unset these params
			unset($_GET['SearchOrderForm']);
		}
		$this->render('index',array(
				'orders'=>$orders,
				'searchOrder'=>$searchOrder,
		));
	}
	
	public function actionUpdate()
	{
		// Breadcrumbs
		$this->breadcrumbs = array(
			t('Order','admin')  => $this->createUrl('/admin/order/index'),
			t('Update'),
		);
		
		//  要求からIDをとる。もしIDがないと４０４ページを表示
		$id = Yii::app()->request->getParam('id');
		if ($id == NULL)
			throw new CHttpException('404','Param is not enough');
		// IDからModelをみつける。もし見つけません、４０４ページを表示する
		$order = Orders::model()->findByPk($id);
		if ($order == NULL)
			throw new CHttpException('404',Yii::t('user','Object not found'));
		// Load all data history about this order　（　この注文に関するすべてのデータの履歴をロードする　）
		$dataProvider = new CActiveDataProvider('OrdersHistory',array(
			'criteria'=>array(
				'condition'=>"order_id = $order->id",
				'order'    =>"time ASC",
			),
		));
		// Update Order Information
		if (isset($_POST['Orders'])){
			$order->attributes = $_POST['Orders'];
			if ($order->save()){
				Yii::app()->user->setFlash('success',Yii::t('admin','Edit order successful'));
				// Save new log for this order
				$orderHistory = new OrdersHistory();
				$orderHistory->time     = new CDbExpression('NOW()');
				$orderHistory->order_id = $order->id;
				$orderHistory->user_id  = Yii::app()->user->id;
				$orderHistory->status   = OrdersHistory::HISTORY_EDIT_ADMIN; 
				$orderHistory->save();
				$this->redirect(array('view','id'=>$order->id));
			}
			else
				Yii::app()->user->setFlash('error',Yii::t('admin','Edit order failed'));
			
		}
		$this->render('update',array(
			'order'=>$order,
			'dataProvider'=>$dataProvider,
		));
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
		// Load all data history about this order　（　この注文に関するすべてのデータの履歴をロードする　）
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
		
		// save log　　（ログを保存する。）
		logged("$order->id | ".Yii::app()->user->name. "Delete Order");
		if ($order->status != Orders::ORDER_CREATED) 
			throw new CHttpException('500',t('Your order have already been deleted'));
		// save new order information
		$order->status = Orders::ORDER_CANCELED;
		$fee = Fee::model()->find();
		$order->total  = $fee->cancel + $fee->register;
		if ($order->save()){
			// Save order history　　（　注文の履歴を保存する。）
			$orderHistory = new OrdersHistory();
			$orderHistory->order_id = $order->id;
			$orderHistory->user_id  = Yii::app()->user->id;
			$orderHistory->status   = OrdersHistory::HISTORY_CANCEL_ADMIN;
			$orderHistory->time     = new CDbExpression('NOW()');
			if (!$orderHistory->save()) {
				logged("Error when save OrderHistory model:".dump($order->errors));
				return false;
			}
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
		
		$status = $order->status; 
		if ( $status != Orders::ORDER_CREATED) 
			throw new CHttpException('500',t('Your order have already deleted or stopped'));
		
		// Save order history　（　注文の履歴を保存する。）
		$orderHistory = new OrdersHistory();
		$orderHistory->order_id = $order->id;
		$orderHistory->user_id  = Yii::app()->user->id;
		$orderHistory->status   = OrdersHistory::HISTORY_FINISH;
		$orderHistory->time     = new CDbExpression('NOW()');
		if (!$orderHistory->save()) {
			logged("Error when save OrderHistory model:".dump($orderHistory->errors));
			return false;
		}
		// Save real stop time　　　（　実際のストップタイムを格納する　）
		if ($order->end_time > date('H:i'))
			$order->real_stop_time = date('H:i');
		else 
			$order->real_stop_time = $order->end_time; 
		if (!$order->save()) {
			logged("Error when save Order model:".dump($order->errors));
			return false;
		}
		// save log　　（ログを保存する。）
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
		
		$status = $order->status; 
		if ( $status != Orders::ORDER_CREATED)  
			throw new CHttpException('500',t('Your order have already deleted or stopped'));
		
		// Save order history　　　　（　注文の履歴を保存する。）
		$orderHistory = new OrdersHistory();
		$orderHistory->order_id = $order->id;
		$orderHistory->user_id  = Yii::app()->user->id;
		$orderHistory->status   = OrdersHistory::HISTORY_OVERTIME;
		$orderHistory->time     = new CDbExpression('NOW()');
		if (!$orderHistory->save()) {
			logged("Error when save OrderHistory model:".dump($orderHistory->errors));
			return false;
		}
		// Save real stop time　　　（　実際のストップタイムを格納する　）
		$order->real_stop_time = new CDbExpression("NOW()");
		if (!$order->save()) {
			logged("Error when save Order model:".dump($order->errors));
			return false;
		}
		// save log　　　（ログを保存する。）
		logged("$order->id | ".Yii::app()->user->name. "Stop Order");
		return true;
	}
}