<?php

class ReportController extends Controller
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
			t('Report','admin')  => $this->createUrl('/admin/report/index'),
			t('Index','admin'),
		);
		$this->render('index');
	}
	
	public function actionProductMonth() {
		$series = array(
			array(
				'name'=>'Tu',
				'data'=>array(10,10,10)
			),
			array(
				'name'=>'Tu2',
				'data'=>array(5,7,3)
			)
		);
		echo CJSON::encode($series);
		Yii::app()->end();
	}
}