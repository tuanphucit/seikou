<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property integer $id
 * @property string $user_id
 * @property string $product_id
 * @property string $start_date
 * @property string $end_date
 * @property string $start_time
 * @property string $end_time
 * @property string $real_stop_time
 * @property integer $total
 * @property integer $visible
 *
 * The followings are the available model relations:
 * @property Users $user
 * @property Products $product
 * @property OrdersHistory[] $ordersHistories
 */
class Orders extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Orders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, product_id, start_date, end_date, start_time, total', 'required'),
			array('total, visible', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>8),
			array('product_id', 'length', 'max'=>5),
			array('end_time, real_stop_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, product_id, start_date, end_date, real_stop_time, start_time, end_time, total, visible', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'product' => array(self::BELONGS_TO, 'Products', 'product_id'),
			'ordersHistories' => array(self::HAS_MANY, 'OrdersHistory', 'order_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => t('User','model'),
			'product_id' => t('Product','model'),
			'start_date' => t('Start Date','model'),
			'end_date' => t('End Date','model'),
			'start_time' => t('Start Time','model'),
			'end_time' => t('End Time','model'),
			'real_stop_time' => t('Real Stop Time','model'),
			'total' => t('Total','model'),
			'visible' => t('Visible','model'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->order = "start_date DESC";

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('product_id',$this->product_id,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('start_time',$this->start_time,true);
		$criteria->compare('end_time',$this->end_time,true);
		$criteria->compare('real_stop_time',$this->real_stop_time,true);
		$criteria->compare('total',$this->total);
		$criteria->compare('visible',$this->visible);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'  => 30,
			)
		));
	}
	
	/**
	 * Get lastest status of an order
	 * @param int order_id
	 */
	public function getLastestStatus()
	{
		$orderHistory = OrdersHistory::model()->findByAttributes(
													array('order_id'=>$this->id),
													array('order'=>'time DESC')
													);
		return $orderHistory->status;
	}
	
	/**
	 * @return Get over time (30 minutes = 1 unit) round up to 30 minutes
	 */
	public function overTime()
	{
		return OrderTimeForm::time_difference($this->end_time, $this->real_stop_time);
	}
}