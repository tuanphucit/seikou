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
		$year = date('Y');
		$nextYear = $year+1;
		// Init array for count order in 12months
		$numberOrdersMonth = array();
		for ($i=1; $i<10;$i++)
			$numberOrdersMonth['0'.$i] = 0;
		$numberOrdersMonth[10] = 0;$numberOrdersMonth[11] = 0;$numberOrdersMonth[12] = 0;
		// get all finish order in $year to caculate
		$orders = Orders::model()->findAll("
				(visible = 1)
				and (end_date >= '$year')
				and (end_date <  '$nextYear')
		");
		foreach ($orders as $order){
			$status = $order->status;
			if ($status != Orders::ORDER_CANCELED)
			{
				$end_date = explode("-", $order->end_date);
				$numberOrdersMonth[$end_date[1]]++;
			}
		}
		
		$series = array(
			array(
				'data'=>array_values($numberOrdersMonth),
			)
		);
		echo CJSON::encode($series);
		Yii::app()->end();
	}
}