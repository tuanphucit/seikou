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
			array('allow', // allow authenticated users to access all actions　　（されたユーザーはすべてのアクションへのアクセスを許可する）
				'users'=>array('@'),
				'actions'=>array('index',)
			),
			array('deny',  // deny all users　　(すべてのユーザーを拒否する。)
				'users'=>array('*'),
			),
		);
	}
	
	/**
	 * Show and Edit User's Profile
	 * @name Action Index
	 * @author luckymancvp
	 * @version 15
	 * @copyright team12
	 */
	public function actionIndex()
	{
		/* Breadcrumbs for profile/index action
		 */
		$this->breadcrumbs = array(
			t('Profile')  => $this->createUrl('/profile/index'),
			t('Index'),
		);
		// Find model asscociated with current user
		// カレントのユーザーのモデルをみつける。
		$user = Users::model()->findByPk(Yii::app()->user->id);
		if (isset($_POST['Users'])){
			$currentPassword  = $user->password;
			$user->attributes = $_POST['Users'];
			// Only save new password - 新しいパースワードだけ更新する。
			if ($user->password != $currentPassword){
				$user->password = sha1(md5($user->password));
				$user->password_repeat = $user->password;
			}
			if ($user->save())
				Yii::app()->user->setFlash('success',Yii::t('user','Editting profile successed'));
			else				
				Yii::app()->user->setFlash('error',Yii::t('user','Editting profile failed'));
		}
		$this->render('index',array('user'=>$user));
	}
}
