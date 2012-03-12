<?php

class UserController extends Controller
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
		$this->breadcrumbs = array("Danh sách user");
		$this->pageTitle   = "Admin - Danh sách user";
		$users = Users::model()->findAll();
		$this->render('index',array('users'=>$users));
	}
	
	public function actionAdd()
	{
		$this->breadcrumbs = array("Thêm user");
		$this->pageTitle   = "Admin - Thêm user";
		$user = new Users();
		if (isset($_POST['Users']))
		{
			$user->attributes = $_POST['Users'];
			if ($user->save()) {
				Yii::app()->user->setFlash('success','Đã thêm user thành công');
				$this->redirect(array('/admin/user/index'));
			}
			else 
				Yii::app()->user->setFlash('error','Gặp lỗi khi thêm user');
		}
		$this->render('add',array('users'=>$user));
	}
	
	public function actionEdit()
	{
		$this->breadcrumbs = array("Sửa user");
		$this->pageTitle   = "Admin - Thêm user";
		$id   = Yii::app()->request->getParam('id',0);
		$user = User::model()->findByPk($id);
		if ($user == null)
			throw new CHttpException('404','Không tìm thấy user');
		if (isset($_POST['User']))
		{
			$user->attributes = $_POST['User'];
			if ($user->save()) {
				Yii::app()->user->setFlash('success','Đã sửa user thành công');
				$this->redirect(array('/admin/user/index'));
			}
			else 
				Yii::app()->user->setFlash('error','Gặp lỗi khi sửa user');
		}
		$this->render('edit',array('user'=>$user));
	}
	
	public function actionDel()
	{
		$id   = Yii::app()->request->getParam('id',0);
		$user = User::model()->findByPk($id);
		if ($user == null)
			throw new CHttpException('404','Không tìm thấy user');
		if ($user->delete()) {
			Yii::app()->user->setFlash('success','Đã xóa user thành công');
		}
		else 
			Yii::app()->user->setFlash('error','Gặp lỗi khi xóa user');
		$this->redirect(array('/admin/user/index'));
	}
}