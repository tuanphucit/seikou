<?php

class ProfileController extends Controller
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
				'actions'=>array('index',)
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionIndex()
	{
		$user = User::model()->findByPk(Yii::app()->user->id);
		if (isset($_POST['User'])){
			$user->attributes = $_POST['User'];
			if ($user->save())
				Yii::app()->user->setFlash('error',Yii::t('user','Editting profile failed'));
			else				
				Yii::app()->user->setFlash('success',Yii::t('user','Editting profile successed'));
		}
		$this->render('index',array('user'=>$user));
	}
}