<?php

/**
 * OrderTimeForm class.
 * OrderTimeForm is the data structure for keeping
 * order information : date and time
 */
class OrderTimeForm extends CFormModel
{
	public $date;
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
		return true;
	}
	
	/** Save order
	 * - Save order data
	 * - Save order history
	*/
	public function save() {
		$order = new Orders;
		
		$order->order_id   = $this->product->id;
		$order->user_id    = Yii::app()->user->id;
		$order->start_date = $this->product->start_date;
		$order->end_date   = $this->product->end_date;
		$order->start_time = $this->product->start_time;
		$order->end_time   = $this->product->end_time;
		
	}
}
