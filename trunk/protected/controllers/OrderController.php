<?php

class OrderController extends Controller
{
	public function actionIndex()
	{
		// Construct OrderTimeForm for containing order information
		$orderTime      = new OrderTimeForm();
		$orderTime->pid = request('pid');
		logged('OrderTime model:'.dump($orderTime));
		$this->render('index',array(
			'orderTime'=>$orderTime,
		));
	}
	
	public function actionAdd()
	{
		// Check if whenever order form is submitted
		$orderTime = new OrderTimeForm();
		$form = request("OrderTimeForm");
		if (isset($form)){
			$orderTime->attributes = $form;
			if ($orderTime->validateTime()){
				if ($orderTime->save()){
					echo "Save successed";
					return;
				}
			};
		}
		echo Html::errorSummary($orderTime);
		//For debug only 
		//$this->render('order_form',array('orderTime'=>$orderTime));
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
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
}