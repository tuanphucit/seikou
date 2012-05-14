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
 * @property string $time
 * @property integer $status
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
	const ORDER_NONE     = 0;
	const ORDER_CREATED  = 1;
	const ORDER_CANCELED = 2;
	const ORDER_FINISHED = 3;
	const ORDER_OVERTIME     = 4;
	
	// This property for sum all total
	
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
			array('user_id, product_id, start_date, end_date, start_time, time, total', 'required'),
			array('status ,total, visible', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>8),
			array('product_id', 'length', 'max'=>5),
			array('end_time, real_stop_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, product_id, start_date, end_date, status, real_stop_time, start_time, end_time, time, total, visible', 'safe', 'on'=>'search'),
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
			'time'   => t('Time','model'),
			'status' => t('Status','model'),
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

		//Get pager size
		if (request('pagerSize') != null){
			Yii::app()->user->setState('pagerSize',(int)request('pagerSize'));
			unset($_GET['pagerSize']);
		}
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'  => Yii::app()->user->getState('pagerSize',Yii::app()->params['defaultPagerSize']),
			)
		));
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions from model.
	 * @param SearchOrderForm $searchOrder
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function advancedSearch($searchOrder)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
	
		$criteria=new CDbCriteria;
		$criteria->order  = "start_date DESC";
		$criteria->compare('id',$this->id);
		
		$thisYear     = date('Y');
		$previousYear = $thisYear - 1;
		$previousDate = $previousYear."-01-01";
		$criteria->compare('time',">=$previousDate");
		
		if ($searchOrder->user_id != '0')
			$criteria->compare('t.user_id',$searchOrder->user_id);
		if ($searchOrder->product_id != '0')
			$criteria->compare('product_id',"$searchOrder->product_id");
		if ($searchOrder->start_date != ''){	
			$criteria->compare('time',">=$searchOrder->start_date");	
		}
		if ($searchOrder->end_date != ''){
			$criteria->compare('time',"<=$searchOrder->end_date");
		}
		
		/** dev
		if ($searchOrder->start_time != '')
			$criteria->compare('time',">=$searchOrder->start_time");
		if ($searchOrder->end_time != '')
			$criteria->compare('time',"<=$searchOrder->end_time");
		if ($searchOrder->order_status != Orders::ORDER_NONE)
			$criteria->compare('status',"$searchOrder->order_status");*/
		$criteria->compare('real_stop_time',$this->real_stop_time,true);
		$criteria->compare('total',$this->total);
		$criteria->order = 'time DESC';
		//Get pager size
		if (request('pagerSize') != null){
			Yii::app()->user->setState('pagerSize',(int)request('pagerSize'));
			unset($_GET['pagerSize']);
		}
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array(
						'pageSize'  => Yii::app()->user->getState('pagerSize',Yii::app()->params['defaultPagerSize']),
				)
		));
	}
	
	/**
	 * @return Get over time (30 minutes = 1 unit) round up to 30 minutes
	 */
	public function overTime()
	{
		return OrderTimeForm::time_difference($this->end_time, $this->real_stop_time);
	}
	
	/**
	 * Get order status list
	 * @return array list status with label
	 */
	public static function getListStatus(){
		return array(
			ORDERS::ORDER_NONE    => t('Select ...','model'),
			ORDERS::ORDER_CREATED => t('Created','model'),
			ORDERS::ORDER_CANCELED => t('Canceled','model'),
			ORDERS::ORDER_FINISHED => t('Finished','model'),
			ORDERS::ORDER_OVERTIME => t('Over Time','model'),
		);
	}
	
	/**
	 * Get status label
	 * @return label <string>
	 */
	public function getStatusLabel(){
		$list = $this->getListStatus();
		return $list[$this->status];
	}
	
	/**
	 * Get total with current search
	 * @param $searchOrder
	 * @return int
	 */
	public function totalSum($searchOrder)
	{
		$dataItems = $this->advancedSearch($searchOrder)->data;
		$total     = 0;
		foreach ($dataItems as $order)
			$total += $order->total;
		return $total;
	}
}