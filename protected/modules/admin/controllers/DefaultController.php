<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		// Breadcrumbs - パン粉
		$this->breadcrumbs = array(
			t('User','admin')  => $this->createUrl('/admin/user/index'),
			t('Index','admin'),
		);
		
		// Search for in use product
		$criteria = new CDbCriteria();
		$criteria->join = 'LEFT JOIN orders ON t.id = orders.product_id';
		$today  = date('Y-m-d');
		$criteria->addCondition("orders.start_date <= '$today' and '$today' <= orders.end_date");
		$now    = date('H-i');
		$criteria->addCondition("orders.start_time <= '$now'");
		$products = new CActiveDataProvider('Products', array(
			'criteria'=>$criteria,
			'pagination'=>array(
		        'pageSize'=>20,
		    ),
		));
		
		// Get model contains users's information　　　（ユーザの情報が含まれているモデルをうける。）
		$users = new CActiveDataProvider('Users', array(
			'criteria'=>array(
				'order'   =>'last_login DESC',
			),
			'pagination'=>array(
				'pageSize'  => 10,
			)
		)); 
		
		// Get model contains orders's information　　　（ユーザの情報が含まれているモデルをうける。）
		$orders = new CActiveDataProvider('Orders', array(
			'criteria'=>array(
				'order'   =>'start_date DESC',
			),
			'pagination'=>array(
				'pageSize'  => 10,
			)
		));
		
		$this->render('index',array(
			'products'=>$products,
			'users'   =>$users,
			'orders'  =>$orders,
		));
	}
	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations　(CRUD操作のためのアクセス制御を実行します。)
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated users to access all actions　（されたユーザーはすべてのアクションへのアクセスを許可する）
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users (すべてのユーザーを拒否する。)
				'users'=>array('*'),
			),
		);
	}
}