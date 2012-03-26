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
		// Breadcrumbs
		$this->breadcrumbs = array(
			t('Profile')  => $this->createUrl('/profile/index'),
			t('Index'),
		);
		$user = Users::model()->findByPk(Yii::app()->user->id);
		if (isset($_POST['Users'])){
			$currentPassword  = $_POST['Users']['password'];
			$user->attributes = $_POST['Users'];
			if ($user->password != $currentPassword)
				$user->password = sha1(md5($user->password));
			if ($user->save())
				Yii::app()->user->setFlash('success',Yii::t('user','Editting profile successed'));
			else				
				Yii::app()->user->setFlash('error',Yii::t('user','Editting profile failed'));
		}
		$this->render('index',array('user'=>$user));
	}
}