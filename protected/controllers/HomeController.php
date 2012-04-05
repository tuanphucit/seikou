<?php

class HomeController extends Controller
{
	public function actionIndex()
	{
		// Breadcrumbs
		$this->breadcrumbs = array(
			t('Index'),
		);
		// Get 10 newest added room to show in homepage　（ホームページに表示する10最新追加された部屋を得る）
		$products = Products::model()->findAllByAttributes(
			array('type'=>Products::TYPE_ROOM),
			array('order'=>'price DESC','limit'=>5)
		);
		
		// Get recent activity of user　（ユーザーの最近の活動を取得する）
		$today = date('Y-m-d');
		$dataProvider = new CActiveDataProvider('Orders',array(
			'criteria'=>array(
				'condition' => "end_date >= '$today' and user_id ='".Yii::app()->user->id."'",
				'order'     => "start_date ASC",
			),
			'pagination'=>array(
				'pageSize'  => 20,
			)
		));
		
		// Construct OrderTimeForm for containing order information　（注文情報を含むためOrderTimeFormを構築する）
		$orderTime      = new OrderTimeForm();
		
		$this->render('index',array(
			'products'=>$products,
			'dataProvider' => $dataProvider,
			'orderTime'    => $orderTime,
		));
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
			array('allow', // allow authenticated users to access all actions　（されたユーザーはすべてのアクションへのアクセスを許可する）
				'users'=>array('@'),
				'actions'=>array('index')
			),
			array('deny',  // deny all users　(すべてのユーザーを拒否する。)
				'users'=>array('*'),
			),
		);
	}
}