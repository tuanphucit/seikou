<?php

class ProductController extends Controller
{
	
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
				'actions'=>array('index','view')
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionIndex()
	{
		$this->render('index');
	}
	
	
	/**
	 * 機能:プロダクトの情報と注文
	 */
	public function actionView()
	{
		// Get Parameter pid for product id
		$pid = Yii::app()->request->getParam('pid');
		if ($pid == NULL)
			throw new CHttpException('404','Parameter is not enough');
		
		// Get model for this product id
		$product = Products::model()->findByPk($pid);
		if ($product == NULL)
			throw new CHttpException('404','Object not found');
			
		// Construct OrderTimeForm for containing order information
		$orderTime = new OrderTimeForm();
		$orderTime->product = $product;
		
		// Check if whenever order form is submitted
		if (isset($_POST["OrderTimeForm"])){
			$orderTime->attributes = $_POST["OrderTimeForm"];
			
			// STEP 1: validate
			if ( !$orderTime->validate()){
				Yii::app()->user->setFlash('error','Error with order');
			}
			
			// STEP 2 : save order
			else if ( !$orderTime->save()){
				Yii::app()->user->setFlash('error','Error with save order');
			}
			
			else {
				$this->render('success');
			}
			
		}
		$this->render('view',array(
			'product'=>$product,
			'orderTime'=>$orderTime,
		));
	}

}