<?php

class HomeController extends Controller
{
	public function actionIndex()
	{
		Yii::app()->user->setFlash('success', '<strong>Well done!</strong> You successfully read this important alert message.');
		Yii::app()->user->setFlash('info', '<strong>Heads up!</strong> This alert needs your attention, but it\'s not super important.');
		Yii::app()->user->setFlash('warning', '<strong>Warning!</strong> Best check yo self, you\'re not looking too good.');
		Yii::app()->user->setFlash('error', '<strong>Oh snap!</strong> Change a few things up and try submitting again.');
		$this->render('index');
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
				'actions'=>array('index',)
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
}