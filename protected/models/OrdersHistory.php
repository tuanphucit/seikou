<?php

/**
 * This is the model class for table "orders_history".
 *
 * The followings are the available columns in table 'orders_history':
 * @property integer $id
 * @property string $user_id
 * @property integer $order_id
 * @property integer $status
 * @property string $time
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Orders $order
 * @property Users $user
 */
class OrdersHistory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrdersHistory the static model class
	 */
	const HISTORY_NONE         = 0;
	const HISTORY_CREATE_USER  = 1;
	const HISTORY_CANCEL_USER  = 2;
	const HISTORY_FINSIH_USER  = 3;
	
	const HISTORY_CREATE_ADMIN  = 4;
	const HISTORY_CANCEL_ADMIN  = 5;
	const HISTORY_FINSIH_ADMIN  = 6;
	const HISTORY_OVER_ADMIN    = 7;
	const HISTORY_EDIT_ADMIN    = 8;
	
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'orders_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, order_id, status, time', 'required'),
			array('order_id, status', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>8),
			array('description', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, order_id, status, time, description', 'safe', 'on'=>'search'),
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
			'order' => array(self::BELONGS_TO, 'Orders', 'order_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => t('ID','model'),
			'user_id' => t('User','model'),
			'order_id' => t('Order','model'),
			'status' => t('Status','model'),
			'time' => t('Time','model'),
			'description' => t('Description','model'),
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

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	/**
	 * Get status name
	 * @param status value
	 * @return The name of status
	 */
	public static function getStatusList()
	{
		$statusList = array(
				OrdersHistory::HISTORY_NONE         => t('Select ...','model'),
				OrdersHistory::HISTORY_CREATE_USER  => t('CREATE','model'),
				OrdersHistory::HISTORY_CANCEL_USER  => t('CANCEL','model'),
				OrdersHistory::HISTORY_FINSIH_USER  => t('FINISH','model'),
				
				OrdersHistory::HISTORY_CREATE_ADMIN  => t('ADMIN CREATE','model'),
				OrdersHistory::HISTORY_CANCEL_ADMIN  => t('ADMIN CANCEL','model'),
				OrdersHistory::HISTORY_FINSIH_ADMIN  => t('ADMIN FINISH','model'),
				OrdersHistory::HISTORY_OVER_ADMIN    => t('ADMIN OVER','model'),
				OrdersHistory::HISTORY_EDIT_ADMIN    => t('ADMIN EDIT','model'),
				
		);
	
		return $statusList;
	}
	
	public static function getStatusLabel($status)
	{
		$statusList = OrdersHistory::getStatusList();
		return $statusList[$status];
	}
}