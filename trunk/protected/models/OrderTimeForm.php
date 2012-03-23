<?php

/**
 * OrderTimeForm class.
 * OrderTimeForm is the data structure for keeping
 * order information : date and time
 */
class OrderTimeForm extends CFormModel
{
	public $date;
	public $start_date;
	public $end_date;
	public $start_time = "8:00";
	public $end_time   = "11:00";
	public $product;
	
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// date and start_time and end_time are required
			array('date ,start_time, end_time', 'required'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'date'=>Yii::t('user','Pick day you want to rent:'),
			'start_time'=>Yii::t('user','Start Time'),
			'end_time'=>Yii::t('user','End Time'),
		);
	}
	
	/** Validate entered time
	 * - check from date < end date
	 * - check date, time with ones in database
	 */
	public function validateTime() {
		// STEP1: Split start date and end date
		$date = explode(" - ", $this->date);
		if (sizeof($date) < 1)
			return false;
		$this->start_date = $date[0];
		if (sizeof($date) == 2)
			$this->end_date = $date[1];
		if (sizeof($date) > 2)
			return false;
		
		// STEP2: Validate Date and Time format
		$dateValidator = CValidator::createValidator(
			"CDateValidator", 
			$this, 
			array(
				'start_date',
				'end_date',
				'start_time',
				'end_time',
			),
			array(
				'safe'=>true,
				'format'=>array(
					"M/d/yyyy",
					"h:m",
					"h:mm",
				),
			)
		);
		$dateValidator->safe = true;
		$dateValidator->validate($this);
		Yii::log('debug',"Model:".CVarDumper::dumpAsString($this,3,true));
		Yii::log('debug',"Error:".CVarDumper::dumpAsString($this->errors,3,true));
		if ($this->hasErrors())
			return false;
		return true;
	}
	
	/** Save order
	 * - Save order data
	 * - Save order history
	*/
	public function save() {
		// Save order information
		$order = new Orders;
		$order->product_id   = $this->product->id;
		$order->user_id    = Yii::app()->user->id;
		$order->start_date = Html::formatDateTime($this->start_date,"M/d/yyyy","Y-m-d");
		$order->end_date   = Html::formatDateTime($this->end_date,"M/d/yyyy","Y-m-d");
		$order->start_time = $this->start_time;
		$order->end_time   = $this->end_time;
		$order->total      = $this->product->price * $this->date_difference($this->start_date, $this->end_date) * $this->time_difference($this->start_time, $this->end_time);
		Yii::log("debug","Time: ".CVarDumper::dumpAsString($this->time_difference($this->start_time, $this->end_time),3,true));
		Yii::log("debug","Total: ".CVarDumper::dumpAsString($order->total,3,true));
		if (!$order->save()) {
			Yii::log('debug',"Error Order:".CVarDumper::dumpAsString($order->errors,3,true));
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
	
	private function time_difference($time1,$time2) {
		$timestamp_diff = strtotime($time2) - strtotime($time1);
		$half_an_hour = 30*60;
		return ceil($timestamp_diff / $half_an_hour);
	}
}
