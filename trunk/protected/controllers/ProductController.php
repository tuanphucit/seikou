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
		$pid = Yii::app()->request->getParam('pid');
		if ($pid == NULL)
			throw new CHttpException('404');
		
		$product = Products::model()->findByPk($pid);
		$this->render('view',array('product'=>$product));
	}

}