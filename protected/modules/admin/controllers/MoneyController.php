<?php

class MoneyController extends Controller
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
			array('allow',
				'actions'=>array('add'),
				'users'  =>array('?'),	
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
			t('お金','admin')  => $this->createUrl('/admin/money/index'),
			t('Index','admin'),
		);
		$moneys = new Money();
		$this->render('index',array('moneys'=>$moneys));
	}
	
	public function actionUpdate()
	{
		// Breadcrumbs - パン粉
		$this->breadcrumbs = array(
			t('Money','admin')  => $this->createUrl('/admin/money/index'),
			t('Update','admin'),
		);
		//  要求からIDをとる。もしIDがないと４０４ページを表示
		$id = Yii::app()->request->getParam('id');
		if ($id == NULL)
			throw new CHttpException('404','Param is not enough');
		$money = Money::model()->findByPk($id);
		if ($money == NULL)
			throw new CHttpException('404',Yii::t('admin','Object not found'));
		if(isset($_POST['Money']))
		{
			// パラメータ をとる
			$money->attributes = $_POST['Money'];
			if($money->save()){
				$this->redirect(array('/admin/money/index/'));
			}
			else 
				Yii::app()->user->setFlash('error',Yii::t(''));
		}
		$this->render('update',array('money'=>$money));
	}
}