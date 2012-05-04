<?php

/**
 * OrderTimeForm class.
 * OrderTimeForm is the data structure for keeping
 * order information : date and time
 */
class OrderTimeForm extends CFormModel
{
	public $pid;
	
	public $start_date;
	public $end_date;
	public $start_hour;
	public $end_hour;
	public $start_minute;
	public $end_minute;
	
	public $start_time;
	public $end_time;

	
	/**
	 * Construct function for default values
	 */
	function __construct(){
		parent::__construct();
		$this->start_date = date('Y-m-d');
		$this->end_date = date('Y-m-d');
		
		$time     = date('H:i');
		$this->start_time = $time;
		$this->end_time   = $time;
		$time             = explode(":", $time);
		$this->start_hour   = $time[0];
		logged('Current Time'.dump($time));
		$this->start_minute = ceil($time[1] / 10) * 10;
		$this->end_hour     = $time[0];
		$this->end_minute   = $this->start_minute;
		
		$this->end_time = date('H:m');
	}
	
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// date and start_time and end_time are required
			array('pid, start_date, end_date, start_hour, end_hour, start_minute, end_minute', 'required'),
			array('start_date, end_date', 'date',
				'format'=>array(
					"yyyy-M-d",
				),
			),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'pid'=>t('Product Name', 'model'),
			'start_date' => t('Start Date', 'model'),
			'end_date' => t('End Date', 'model'),
			'start_hour' => t('Start Hour', 'model'),
			'end_hour' => t('End Hour', 'model'),
			'start_minute' => t('Start Minute', 'model'),
			'end_minute' => t('End Minute', 'model'),
		);
	}
	
	/** Validate entered time
	 * - check from date < end date
	 * - check date, time with ones in database
	 */
	public function validateTime() {
		// STEP1: Validate Date and Time format
		$this->validate();
		if ($this->hasErrors()){
			logged(dump($this->errors));
			return false;	
		}
		logged('Validate format successed');
		
		// STEP2: Validate Logic
		// Convert time format
		$this->start_time = $this->convert24($this->start_hour, $this->start_minute);
		$this->end_time = $this->convert24($this->end_hour, $this->end_minute);
		// Check if start_date is earlier than today
		if ($this->start_date < date('Y-m-d')) {
			logged(t('Start date must be in the furture'));
			$this->addError('Date',t('Start date must be in the furture'));
			return false;
		}
		// Check start_time < end_time
		if ($this->start_time >= $this->end_time) {
			logged(t('Start time must be earlier than End time'));
			logged(dump($this));
			$this->addError('Time',t('Start time must be earlier than End time'));
			return false;
		}
		// Check start_date < end_date
		if ($this->start_date > $this->end_date) {
			logged(t('Start date must be earlier than End date'));
			$this->addError('Date',t('Start date must be earlier than End date'));
			return false;
		}
		// Check start_date before one year
		$start = $this->start_date + " " + $this->start_time;
		$oneyear = 60*60*24*365;
		if ( strtotime("+1 year") -  $start < $oneyear){
			logged(t("Can't reserve before 1 year"));
			$this->addError('Date',t("Can't reserve before 1 year"));
			return false;
		}
		// Select all order with same pid have conflict time with this current order
		$criteria=new CDbCriteria;
		$criteria->addCondition("product_id = '$this->pid'");
		$criteria->addCondition("
			((start_time <= '$this->start_time') and (end_time > '$this->start_time')) 
			or
			((start_time < '$this->end_time') and (end_time >= '$this->end_time')) 
			or
			((start_time >= '$this->start_time') and (end_time <= '$this->end_time'))
		");
		$orders = Orders::model()->findAll($criteria);
		if ($orders == NULL) {
			logged("Don't have time conflict");
			return true;
		}
		
		logged('Have time conflict');
		foreach ($orders as $order){
			// Check if have date conflict
			if ((($this->start_date >= $order->start_date) and ($this->start_date < $order->end_date))
			 or (($this->end_date > $order->start_date) and ($this->end_date < $order->end_date))
			 or (($this->start_date <= $order->start_date) and ($this->end_date >= $order->end_date))
			 ) {
			 	logged("Have date conflict with Order : $order->id");
			 	// Check if this conflict order have been cancel ??
				$lastStatus = $order->getLastestStatus();
				if (($lastStatus == OrdersHistory::HISTORY_CREATE) || ($lastStatus == OrdersHistory::HISTORY_CREATE_ADMIN)) {
				 	/**
				 	 * TODO
				 	 * Need more information about conflict date
				 	 */
					$errorDetail  = "<br> Order ID: $order->id";
					$errorDetail .= "<br> Date: $order->start_date -> $order->end_date";
					$errorDetail .= "<br> Time: $order->start_time -> $order->end_time";
					$errorDetail .= "<br> Room: {$order->product->name}";
					$this->addError('Date',t('Have date conflict').$errorDetail);
					logged("Finally Failed by Order: $order->id");
					return false;	
				}
			}
		}
		logged("Validate logic success");
		return true;
	}
	
	/** Validate All Product
	 * this function run if pid parameter is 'sla'
	 */
	public function validateTimeAll(){
		$products = Products::model()->findAll();
		foreach ($products as $product){
			$this->pid = $product->id;
			if (!$this->validateTime())
				return false;
		}
		return true;
	}
	
	/** Save order
	 * - Save order data
	 * - Save order history
	*/
	public function save() {
		// Save order information
		$order   = new Orders;
		$product = Products::model()->findByPk($this->pid); 
		$order->product_id   = $this->pid;
		$order->user_id    = Yii::app()->user->id;
		$order->start_date = Html::formatDateTime($this->start_date,"yyyy-M-d","Y-m-d");
		$order->end_date   = Html::formatDateTime($this->end_date,"yyyy-M-d","Y-m-d");
		$order->start_time = $this->start_time;
		$order->end_time   = $this->end_time;
		$fee = Fee::model()->find();
		$order->total      = $product->price * $this->date_difference($this->start_date, $this->end_date) * $this->time_difference($this->start_time, $this->end_time) + $fee->register;
		logged("Time: ".dump($this->time_difference($this->start_time, $this->end_time)));
		logged("Total: ".dump($order->total));
		if (!$order->save()) {
			logged("Error when save Order model:".dump($order->errors));
			return false;
		}
		
		// Save order history
		$orderHistory = new OrdersHistory();
		$orderHistory->order_id = $order->id;
		$orderHistory->user_id  = Yii::app()->user->id;
		$orderHistory->status   = OrdersHistory::HISTORY_CREATE;
		$orderHistory->time     = new CDbExpression('NOW()');
		if (!$orderHistory->save()) {
			logged("Error when save OrderHistory model:".dump($order->errors));
			return false;
		}
		return true;
	}
	
	/** Save All
	 */
	public function saveAll(){
		$products = Products::model()->findAll();
		foreach ($products as $product){
			$this->pid = $product->id;
			if (!$this->save())
				return false;
		}
		return true;
	}
	
	private function date_difference($date1,$date2) {
		if ($date2 == null)
			return 1;
		$timestamp_diff = strtotime($date2) - strtotime($date1);
		$date = 60*60*24;
		return ceil($timestamp_diff / $date)+1;
	}
	
	public static function time_difference($time1,$time2) {
		if ($time1 >= $time2)
			return 0;
		$timestamp_diff = strtotime($time2) - strtotime($time1);
		$half_an_hour = 30*60;
		return ceil($timestamp_diff / $half_an_hour);
	}
	
	/**
	 * @return List array id,name of all product
	 */
	public function getListProducts()
	{
		// Get all product model in database
		$products = Products::model()->findAll('',array('order'=>'name ASC'));
		$list = array();
		foreach ($products as $product){
			$list[$product->id] = $product->name;
		}
		$list['sla'] = t('Select all','model'); 
		return $list;
	}
	
	/**
	 * @return List array hour
	 */
	public function getListHours()
	{
		$hours = array();
		for ($i = 0; $i<10; $i++)
			$hours[$i] = '0'.$i;
		for ($i = 10; $i<25; $i++)
			$hours[$i] = $i;
		return $hours;
	}
	
	/**
	 * @return List array minute
	 */
	public function getListMinutes()
	{
		return array(
			'00'=>'00',
			'10'=>'10',
			'20'=>'20',
			'30'=>'30',
			'40'=>'40',
			'50'=>'50',
		);
	}
	
	/**
	 * Convert from am/pm to 24 hours format
	 * @param hour,minute,am/pm
	 * @return 24hours format
	 */
	public function convert24($hour,$minute){
		if ($hour < 10)
			$hour = '0' . $hour;
		return $hour.":".$minute; 
	}
}
