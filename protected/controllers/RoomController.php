<?php

class RoomController extends Controller
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
				'actions'=>array('index','view')
			),
			array('deny',  // deny all users　　(すべてのユーザーを拒否する。)
				'users'=>array('*'),
			),
		);
	}
	
	public function actionIndex()
	{
		// Breadcrumbs
		$this->breadcrumbs = array(
			t('Conference Room')  => $this->createUrl('/room/index'),
			t('Index'),
		);
		// Retrieve Room data from database　　（データベースからのルームデータを取得する）
		$dataProvider=new CActiveDataProvider('Products',array(
			'criteria'=>array(
				'condition'=>'type='.Products::TYPE_ROOM,
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
		// Breadcrumbs
		$this->breadcrumbs = array(
			t('Conference Room')  => $this->createUrl('/room/index'),
			t('View'),
		);
		// Get Parameter pid for product id　　プロダクトIDのためPIDパラメータを受ける。
		$pid = Yii::app()->request->getParam('pid');
		if ($pid == NULL)
			throw new CHttpException('404','Parameter is not enough');
		
		// Get model for this product id　（この製品IDのためのモデルを得る）
		$product = Products::model()->findByPk($pid);
		if ($product == NULL)
			throw new CHttpException('404','Object not found');
		
		$this->render('view',array(
			'product'=>$product,
		));
	}

}