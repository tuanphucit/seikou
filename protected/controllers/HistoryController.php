<?php

class HistoryController extends Controller
{
	public function actionIndex()
	{
		// Breadcrumbs
		$this->breadcrumbs = array(
			t('History')  => $this->createUrl('/history/index'),
			t('Index'),
		);
		
		// Look for order created by current user　　（在のユーザーによって作成されたオーダーを検索する　）
		$dataProvider = new CActiveDataProvider('Orders',array(
			'criteria'=>array(
				'condition' => "user_id = '".Yii::app()->user->id."' and visible = 1",
				'order' => 'start_date DESC',
			),
			'pagination'=>array(
				'pageSize'=>20,
			)
		));
		$this->render('index',array('dataProvider'=>$dataProvider));
	}
	
	public function actionView()
	{
		// Breadcrumbs
		$this->breadcrumbs = array(
			t('History')  => $this->createUrl('/history/index'),
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
	
	public function actionDelete()
	{
		// Breadcrumbs
		$this->breadcrumbs = array(
			t('History')  => $this->createUrl('/profile/index'),
			t('View'),
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
		$status = $order->getLastestStatus();
		if (( $status != OrdersHistory::HISTORY_CREATE) && 
			( $status != OrdersHistory::HISTORY_CREATE_ADMIN))
			throw new CHttpException('500',t('Your order have already deleted or stopped'));
		
		// check if cancel before 2 hours
		$hours_2 = 60*60*2;
		$start = $order->start_date + " " + $order->start_time;
		// check if not admin
		if ( ! Yii::app()->authManager->isAssigned('admin',Yii::app()->user->id))
			if ( strtotime($start) - strtotime('now') > $hours_2)
				throw  new CHttpException('402',t("Can't cancel. You must cancel before 2 hours"));
		// Save order history　（　注文の履歴を保存する。）
		$orderHistory = new OrdersHistory();
		$orderHistory->order_id = $order->id;
		$orderHistory->user_id  = Yii::app()->user->id;
		$orderHistory->status   = OrdersHistory::HISTORY_CANCEL_USER;
		$orderHistory->time     = new CDbExpression('NOW()');
		if (!$orderHistory->save()) {
			logged("Error when save OrderHistory model:".dump($order->errors));
			return false;
		}
		return true;
	}
	
	public function filters()
	{
		return array(
			'accessControl',
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated users to access all actions　　（　されたユーザーはすべてのアクションへのアクセスを許可する　）
				'users'=>array('@'),
				'actions'=>array('index','view','delete')
			),
			array('deny',  // deny all users　(すべてのユーザーを拒否する。)
				'users'=>array('*'),
			),
		);
	}
}