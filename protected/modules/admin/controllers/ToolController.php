<?php

class ToolController extends Controller
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
			t('Tool','admin')  => $this->createUrl('/admin/tool/index'),
			t('Index','admin'),
		);
		$this->render('index');
	}
	
	public function actionExportcsv()
	{
		// Breadcrumbs
		$this->breadcrumbs = array(
			t('Tool','admin')  => $this->createUrl('/admin/tool/index'),
			t('Export CSV'),
		);
		
		// STEP0 : init data　　　（ステップ０：初期データ　）
		$systemCode = "CSY-RVR-GWK52M78";
		$year  = request('year');
		$month = request('month');
		if (!$year || !$month) {
			$content = 0;
			$this->render('exportcsv',array('content'=>$content));
			return;
		}
		$month = $month + 0;
		if ($month < '10') $month = '0'.$month;
		// Get current user　（現在のユーザーを取得する）
		$user = Users::model()->findByPk(Yii::app()->user->id); 
		$csvData = array(
			array(
				$systemCode, $year, $month, date('Y'), date('m'), date('d'), date('H'), date('i'), date('s'), $user->username, $user->full_name      
			)
		);
		logged("First row:".dump($csvData));
		// Init total price for all user　（すべてのユーザーの初期総額　）
		$users = Users::model()->findAll("role != ".Users::USER_ADMIN,array("order"=>"full_name ASC"));
		$total = array();
		foreach ($users as $user){
			$total[$user->id] = 0;
		}

		// STEP1 : load all fee　（すべての手数料を読み込む）
		$fee = Fee::model()->find();
		
		// STEP2 : load all order in month　（　月にすべての順序を読み込む　）
		$thisMonth = "$year-$month";
		$nextMonth = "$year-{$month}9";
		$orders = Orders::model()->findAll("(end_date > '$thisMonth') and (end_date < '$nextMonth')"); 
		
		// STEP3 : with each order , calc total price for users　（ユーザのトータルを計算する）
		foreach($orders as $order){
			$status = $order->getLastestStatus();
			logged("{$order->id}:".OrdersHistory::getStatusTypeLabel($status));
			switch ($status) {
				case OrdersHistory::HISTORY_CANCEL_USER : 
					$total[$order->user_id] += $fee->cancel;
					break;
				case OrdersHistory::HISTORY_FINISH : 
					$total[$order->user_id] += $order->total;
					break;				
				case OrdersHistory::HISTORY_OVERTIME : 
					$total[$order->user_id] += ($order->total + $fee->penalty*$order->overTime());
					break;
			}
		}
		
		logged(dump($total));
		// STEP4: Join all users'sdata　（ユーザーのすべてのデータを結合する）
		foreach ($users as $user)
			if ($total[$user->id] != 0) {
				$csvData[] = array(
					$user->username, $user->full_name, $total[$user->id], $user->address2
				);
			}
		
		// Final export　（最後に出力）
		$csvData[] = array ("END___END___END",$year,$month);
		Yii::import('ext.CSVExport');
		$csv = new CSVExport($csvData);
		$content = $csv->toCSV();
		$filename = "RVR-$year-$month.csv";
		$folder   = YiiBase::getPathOfAlias('webroot').DIRECTORY_SEPARATOR."csv".DIRECTORY_SEPARATOR;
		$saveToFile = $csv->toCSV($folder.$filename, ",", "\"");           
		Yii::app()->getRequest()->sendFile($filename, $content, "text/csv", false);
		exit();
		$this->render('exportcsv',array('content'=>$content));
	}
	
	/**
	 * Manage database
	 * - Import
	 * - Export
	 */
	public function actionDatabase()
	{
		// Breadcrumbs
		$this->breadcrumbs = array(
				t('Tool','admin')  => $this->createUrl('/admin/tool/index'),
				t('Database'),
		);
		$this->render('database');
	}
	
	public function actionExport()
	{
		Yii::import('ext.DLDatabaseHelper');
		DLDatabaseHelper::export();
	}
}