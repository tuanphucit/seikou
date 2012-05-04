<?php

class FeeController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations　　（　RUD操作のためのアクセス制御を実行します　）
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated users to access all actions　（　されたユーザーはすべてのアクションへのアクセスを許可する　）
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users　(すべてのユーザーを拒否する。)
				'users'=>array('*'),
			),
		);
	}
	
	public function actionIndex()
	{
		// Breadcrumbs - パン粉
		$this->breadcrumbs = array(
			t('Fee','admin')  => $this->createUrl('/admin/fee/index'),
			t('Index','admin'),
		);
		// Get model contains fee's information
		$fee = Fee::model()->find();
		$this->render('index',array('fee'=>$fee));
	}
		
	public function actionUpdate()
	{
		// Breadcrumbs - パン粉
		$this->breadcrumbs = array(
			t('Fee','admin')  => $this->createUrl('/admin/fee/index'),
			t('Update','admin'),
		);
		//  要求からIDをとる。もしIDがないと４０４ページを表示
		$fee = Fee::model()->find();
		if (isset($_POST['Fee'])){
			$fee->attributes = $_POST['Fee'];
			if ($fee->save()){
				Yii::app()->user->setFlash('success',t('Updated fee successful','admin'));
				$this->redirect(array('/admin/fee'));
			}
			Yii::app()->user->setFlash('error',t('Updated fee successful','admin'));
		}
		$this->render('update',array('fee'=>$fee));
	}
}