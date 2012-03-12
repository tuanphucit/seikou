<?php

class HomeController extends Controller
{
	public function actionIndex()
	{
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