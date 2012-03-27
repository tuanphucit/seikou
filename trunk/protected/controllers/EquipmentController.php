<?php

class EquipmentController extends Controller
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
		// Breadcrumbs - パン粉
		$this->breadcrumbs = array(
			t('Equipment')  => $this->createUrl('/room/index'),
			t('Index'),
		);
		// Retrieve Room data from database
		$dataProvider=new CActiveDataProvider('Products',array(
			'criteria'=>array(
				'condition'=>'type='.Products::TYPE_EQUIPMENT,
				'order'=>'name ASC',
			),
		));
		$this->render('index',array('dataProvider'=>$dataProvider));
	}
	
	
	/**
	 * 機能:プロダクトの情報と注文
	 */
	public function actionView()
	{
		// Breadcrumbs - パン粉
		$this->breadcrumbs = array(
			t('Equipment')  => $this->createUrl('/room/index'),
			t('View'),
		);
		// Get Parameter pid for product id
		$pid = Yii::app()->request->getParam('pid');
		if ($pid == NULL)
			throw new CHttpException('404','Parameter is not enough');
		
		// Get model for this product id
		$product = Products::model()->findByPk($pid);
		if ($product == NULL)
			throw new CHttpException('404','Object not found');
		
		$this->render('view',array(
			'product'=>$product,
		));
	}

}