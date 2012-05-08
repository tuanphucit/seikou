<?php

class UserController extends Controller
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
			t('User','admin')  => $this->createUrl('/admin/user/index'),
			t('Index','admin'),
		);
		// Get model contains users's information　　（ユーザの情報が含まれているモデルをうける。）
		$users = new Users();
		$this->render('index',array('users'=>$users));
	}
	
	public function actionAdd()
	{
		// Breadcrumbs - パン粉
		$this->breadcrumbs = array(
			t('User','admin')  => $this->createUrl('/admin/user/index'),
			t('Add','admin'),
		);
		$user = new Users();
		if(isset($_POST['Users']))
		{	
			$user->attributes = $_POST['Users'];
			logged("Have user submit".dump($_POST['Users']));
			// パラメータ をとる
			$user->password        = sha1(md5($user->password));
			$user->password_repeat = sha1(md5($user->password_repeat));
			// 保存と検証する
			if($user->save()){
				if ( ! Yii::app()->authManager->isAssigned('admin',Yii::app()->user->id)){
					Yii::app()->user->setFlash('success',Yii::t('admin','Thanks you. Please wait to active'));
					$this->redirect(array('/site/login'));
				}
				Yii::app()->user->setFlash('success',Yii::t('admin','Add user successful'));
				$this->redirect(array('view','id'=>$user->id));
			}
			else 
				Yii::app()->user->setFlash('error',Yii::t('admin','Add user failed'));
		}
		$this->render('add',array('user'=>$user));
	}
	
	public function actionUpdate()
	{
		// Breadcrumbs - パン粉
		$this->breadcrumbs = array(
			t('User','admin')  => $this->createUrl('/admin/user/index'),
			t('Update','admin'),
		);
		//  要求からIDをとる。もしIDがないと４０４ページを表示
		$id = Yii::app()->request->getParam('id');
		if ($id == NULL)
			throw new CHttpException('404','Param is not enough');
		$user = Users::model()->findByPk($id);
		if ($user == NULL)
			throw new CHttpException('404',Yii::t('admin','Object not found'));
		if(isset($_POST['Users']))
		{
			logged("Have user submit".dump($_POST['Users']));
			// パラメータ をとる
			$currentPassword  = $user->password;
			$user->attributes = $_POST['Users'];
			// Only save new password - 新しいパースワードだけ更新する。
			if ($user->password != $currentPassword){
				$user->password = sha1(md5($user->password));
				$user->password_repeat = $user->password;
			}
			// 保存と検証する
			if($user->save()){
				Yii::app()->user->setFlash('success',Yii::t('admin','Edit user successful'));
				$this->redirect(array('view','id'=>$user->id));
			}
			else 
				Yii::app()->user->setFlash('error',Yii::t('admin','Edit user failed'));
		}
		$this->render('update',array('user'=>$user));
	}
	
	public function actionView()
	{
		// Breadcrumbs - パン粉
		$this->breadcrumbs = array(
			t('User','admin')  => $this->createUrl('/admin/user/index'),
			t('View','admin'),
		);
		//  要求からIDをとる。もしIDがないと４０４ページを表示
		$id = Yii::app()->request->getParam('id');
		if ($id == NULL)
			throw new CHttpException('404','Param is not enough');
		// IDからModelをみつける。もし見つけません、４０４ページを表示する
		$user = Users::model()->findByPk($id);
		if ($user == NULL)
			throw new CHttpException('404',Yii::t('admin','Object not found'));
		$this->render('view',array('user'=>$user));
	}
	
	public function actionDelete()
	{
		// Breadcrumbs - パン粉
		$this->breadcrumbs = array(
			t('User','admin')  => $this->createUrl('/admin/user/index'),
			t('Delete','admin'),
		);
		//  要求からIDをとる。もしIDがないと４０４ページを表示
		$id = Yii::app()->request->getParam('id');
		if ($id == NULL)
			throw new CHttpException('404','Param is not enough');
		$user = Users::model()->findByPk($id);
		if ($user == NULL)
			throw new CHttpException('404',Yii::t('admin','Object not found'));
		if ($user->delete()){
			Yii::app()->user->setFlash('success',Yii::t('admin','Del user successful'));
		}
		else 
			Yii::app()->user->setFlash('error',Yii::t('admin','Del user failed'));
		logged($user->id." Deleted");
		$this->redirect(array('/admin/user'));
	}
}