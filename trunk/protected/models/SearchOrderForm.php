<?php
/**
 * SearchOrderForm
 * Search order by many filter
 * @author luckymancvp
 * @version 1
 */
class SearchOrderForm extends CFormModel{
	
	public $user_id;
	public $product_id;
	
	public $start_date;
	public $end_date;
	public $start_time;
	public $end_time;
	
	public $order_status;
	
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('user_id, product_id, start_date, end_date, start_time, end_time, order_status','safe'),
		);
	}
	
	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
				'user_id'  => t('Full Name','model'),
				'product_id'  => t('Product','model'),
				'start_date' => t('Start Date', 'model'),
				'end_date' => t('End Date', 'model'),
				'start_time' => t('Start Time', 'model'),
				'end_time' => t('End Time', 'model'),
				'order_status'=> t('Status','model'),
		);
	}
}