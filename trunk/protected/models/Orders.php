<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property string $id
 * @property string $user_id
 * @property string $product_id
 * @property integer $duration
 * @property string $start_time
 * @property string $real_stop_time
 * @property integer $total
 *
 * The followings are the available model relations:
 * @property Products $product
 * @property Users $user
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
			array('id, user_id, product_id, duration, start_time, real_stop_time, total', 'required'),
			array('duration, total', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>10),
			array('user_id', 'length', 'max'=>8),
			array('product_id', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, product_id, duration, start_time, real_stop_time, total', 'safe', 'on'=>'search'),
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
			'product' => array(self::BELONGS_TO, 'Products', 'product_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
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
			'user_id' => 'User',
			'product_id' => 'Product',
			'duration' => 'Duration',
			'start_time' => 'Start Time',
			'real_stop_time' => 'Real Stop Time',
			'total' => 'Total',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('product_id',$this->product_id,true);
		$criteria->compare('duration',$this->duration);
		$criteria->compare('start_time',$this->start_time,true);
		$criteria->compare('real_stop_time',$this->real_stop_time,true);
		$criteria->compare('total',$this->total);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}