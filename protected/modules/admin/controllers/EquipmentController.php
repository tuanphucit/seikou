<?php

class EquipmentController extends Controller
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
		$this->breadcrumbs = array(Yii::t('admin',"Equipment")=>$this->createUrl('/admin/equipment/'),Yii::t('admin',"List"));
		$this->pageTitle   = "Equipment Management - List Product";
		$products = new Products();
		// タイプは１ならルームです。 Setting 1 for equipment 0 means it is room
		$products->type = 1;
		$this->render('index',array('products'=>$products));
	}
	
	public function actionView()
	{
		$this->breadcrumbs = array(Yii::t('admin',"Equipment")=>$this->createUrl('/admin/equipment/'),Yii::t('admin',"View"));
		$this->pageTitle   = "Equipment Management - View Product";
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
		$this->breadcrumbs = array("Equipment"=>$this->createUrl('/admin/equipment/'),"Add");
		$this->pageTitle   = "Equipment Management - Add Product";
		$product = new Products();
		if(isset($_POST['Products']))
		{
			// パラメータ をとる
			$product->attributes=$_POST['Products'];
			// 保存と検証する
			if($product->save()){
				Yii::app()->user->setFlash('success',Yii::t('admin','Add equipment successful'));
				$this->redirect(array('view','id'=>$product->id));
			}
			else 
				Yii::app()->user->setFlash('error',Yii::t('admin','Add equipment failed'));
		}
		$this->render('add',array('product'=>$product));
	}
	
	public function actionUpdate()
	{
		$this->breadcrumbs = array("Equipment"=>$this->createUrl('/admin/equipment/'),"Update");
		$this->pageTitle   = "Equipment Management - Update Product";
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
				Yii::app()->user->setFlash('success',Yii::t('admin','Edit equipment successful'));
				$this->redirect(array('view','id'=>$product->id));
			}
			else 
				Yii::app()->user->setFlash('error',Yii::t('admin','Edit equipment failed'));
		}
		$this->render('add',array('product'=>$product));
	}
	
	public function actionDelete()
	{
		$this->breadcrumbs = array("Equipment"=>$this->createUrl('/admin/equipment/'),"Delete");
		$this->pageTitle   = "Equipment Management - Delete Product";
		//  要求からIDをとる。もしIDがないと４０４ページを表示
		$id = Yii::app()->request->getParam('id');
		if ($id == NULL)
			throw new CHttpException('404','Param is not enough');
		$product = Products::model()->findByPk($id);
		if ($product == NULL)
			throw new CHttpException('404',Yii::t('admin','Object not found'));
		if ($product->delete()){
			Yii::app()->user->setFlash('success',Yii::t('admin','Del equipment successful'));
		}
		else 
			Yii::app()->user->setFlash('error',Yii::t('admin','Del equipment failed'));
		$this->redirect(array('/admin/equipment'));
	}
}