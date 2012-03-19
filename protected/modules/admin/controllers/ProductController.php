<?php

class ProductController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated users to access all actions
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionIndex()
	{
		$this->breadcrumbs = array("Product"=>$this->createUrl('/admin/product/'),"List");
		$this->pageTitle   = "Product Management - List Product";
		$product = new Products();
		$product->type = 0;
		$this->render('index',array('users'=>$product));
	}
	
	public function actionView()
	{
		$this->breadcrumbs = array("Product"=>$this->createUrl('/admin/product/'),"View");
		$this->pageTitle   = "Product Management - View Product";
		//  要求からIDをとる。もしIDがないと４０４ページを表示
		$id = Yii::app()->request->getParam('id');
		if ($id == NULL)
			throw new CHttpException('404','Param is not enough');
		// IDからModelをみつける。もし見つけません、４０４ページを表示する
		$product = Products::model()->findByPk($id);
		if ($product == NULL)
			throw new CHttpException('404',Yii::t('admin','Object not found'));
		$this->render('view',array('product'=>$product));
	}
	
	public function actionAdd()
	{
		$this->breadcrumbs = array("Product"=>$this->createUrl('/admin/product/'),"Add");
		$this->pageTitle   = "Product Management - Add Product";
		$product = new Products();
		if(isset($_POST['Products']))
		{
			// パラメータ をとる
			$product->attributes=$_POST['Products'];
			// 保存と検証する
			if($product->save()){
				Yii::app()->user->setFlash('success',Yii::t('admin','Add room successful'));
				$this->redirect(array('view','id'=>$product->id));
			}
			else 
				Yii::app()->user->setFlash('error',Yii::t('admin','Add room failed'));
		}
		$this->render('add',array('product'=>$product));
	}
	
	public function actionUpdate()
	{
		$this->breadcrumbs = array("Product"=>$this->createUrl('/admin/product/'),"Update");
		$this->pageTitle   = "Product Management - Update Product";
		//  要求からIDをとる。もしIDがないと４０４ページを表示
		$id = Yii::app()->request->getParam('id');
		if ($id == NULL)
			throw new CHttpException('404','Param is not enough');
		$product = Products::model()->findByPk($id);
		if ($product == NULL)
			throw new CHttpException('404',Yii::t('admin','Object not found'));
		if(isset($_POST['Products']))
		{
			// パラメータ をとる
			$product->attributes=$_POST['Products'];
			// 保存と検証する
			if($product->save()){
				Yii::app()->user->setFlash('success',Yii::t('admin','Edit room successful'));
				$this->redirect(array('view','id'=>$product->id));
			}
			else 
				Yii::app()->user->setFlash('error',Yii::t('admin','Edit room failed'));
		}
		$this->render('add',array('product'=>$product));
	}
	
	public function actionDelete()
	{
		$this->breadcrumbs = array("Product"=>$this->createUrl('/admin/product/'),"Delete");
		$this->pageTitle   = "Product Management - Delete Product";
		//  要求からIDをとる。もしIDがないと４０４ページを表示
		$id = Yii::app()->request->getParam('id');
		if ($id == NULL)
			throw new CHttpException('404','Param is not enough');
		$product = Products::model()->findByPk($id);
		if ($product == NULL)
			throw new CHttpException('404',Yii::t('admin','Object not found'));
		if ($product->delete()){
			Yii::app()->user->setFlash('success',Yii::t('admin','Del room successful'));
		}
		else 
			Yii::app()->user->setFlash('error',Yii::t('admin','Del room failed'));
		$this->redirect(array('/admin/product'));
	}
}