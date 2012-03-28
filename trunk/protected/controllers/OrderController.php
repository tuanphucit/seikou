<?php

class OrderController extends Controller
{
	public function actionIndex()
	{
		// Breadcrumbs
		$this->breadcrumbs = array(
			t('Order')  => $this->createUrl('/order/index'),
			t('Index'),
		);
		// Construct OrderTimeForm for containing order information　　（注文情報を含むためにご注文時のフォームを構築する）
		$orderTime      = new OrderTimeForm();
		$orderTime->pid = request('pid');
		logged('OrderTime model:'.dump($orderTime));
		$this->render('index',array(
			'orderTime'=>$orderTime,
		));
	}
	
	public function actionAdd()
	{
		// Breadcrumbs
		$this->breadcrumbs = array(
			t('Order')  => $this->createUrl('/order/add'),
			t('Index'),
		);
		// Check if whenever order form is submitted　（オーダーフォームがサブミットされれば、チェックする）
		$orderTime = new OrderTimeForm();
		$form = request("OrderTimeForm");
		if (isset($form)){
			$orderTime->attributes = $form;
			if ($orderTime->validateTime()){
				if ($orderTime->save()){
					echo "Save successed";
					return;
				}
			};
		}
		echo Html::errorSummary($orderTime,null,null,array("class"=>"alert-error"));
		//For debug only　（デバッグのみ）
		//$this->render('order_form',array('orderTime'=>$orderTime));
	}
	
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
			),
			array('deny',  // deny all users　　(すべてのユーザーを拒否する。)
				'users'=>array('*'),
			),
		);
	}
}