<?php

class HomeController extends Controller
{
	public function actionIndex()
	{
		// Breadcrumbs
		$this->breadcrumbs = array(
			t('Index'),
		);
		// Get 10 newest added room to show in homepage
		$products = Products::model()->findAllByAttributes(
			array('type'=>Products::TYPE_ROOM),
			array('order'=>'price DESC','limit'=>5)
		);
		
		// Get recent activity of user
		$today = date('Y-m-d');
		$dataProvider = new CActiveDataProvider('Orders',array(
			'criteria'=>array(
				'condition' => "start_date >= '$today'",
				'order'     => "start_date ASC",
			),
			'pagination'=>array(
				'pageSize'  => 20,
			)
		));
		
		// Construct OrderTimeForm for containing order information
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
			array('allow', // allow authenticated users to access all actions
				'users'=>array('@'),
				'actions'=>array('index')
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
}