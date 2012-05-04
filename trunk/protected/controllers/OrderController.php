<?php

class OrderController extends Controller
{
	public function actionGetOrders(){
		// get param
		$start = date("Y-m-d",request('start'));
		$end   = date("Y-m-d",request('end'));
		
		// List all order
		$orders = Orders::model()->findAll("visible and ('$start' <= end_date) and ( end_date <= '$end') ");
		$jsonData = array();
		foreach ($orders as $order) 
			if (($order->getLastestStatus() == OrdersHistory::HISTORY_CREATE_ADMIN) ||
					($order->getLastestStatus() == OrdersHistory::HISTORY_CREATE)){
			$start_date = strtotime($order->start_date);
			$end_date = strtotime($order->end_date);
			for ($date = $start_date; $date <= $end_date; $date = strtotime("+1 day", $date))
				$jsonData[] = array(
						'id'=>$order->id,
						'title'=>$order->product->name,
						'start'=>date('Y-m-d',$date). " $order->start_time",
						'end'  =>date('Y-m-d',$date). " $order->end_time",
						'allDay'=>false,
				);
		}
		// return json Data about current orders
		echo CJSON::encode($jsonData);
		Yii::app()->end();
	}
	
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
			// Check if order all room
			if ($form['pid'] == 'sla'){
				// validate each room
				if ($orderTime->validateTimeAll()){
					if ($orderTime->saveAll()){
						echo "Save successed";
						return;
					}
				}
			}
			else if ($orderTime->validateTime()){
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