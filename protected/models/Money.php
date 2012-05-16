<?php

/**
 * This is the model class for table "money".
 *
 * The followings are the available columns in table 'money':
 * @property integer $id
 * @property string $user_id
 * @property integer $year
 * @property integer $month
 * @property integer $real
 * @property integer $penalty
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class Money extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Money the static model class
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
		return 'money';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, year, month', 'required'),
			array('year, month, real, penalty', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, year, month, real, penalty', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'ユーザ',
			'year' => '年',
			'month' => '月',
			'real' => '実績',
			'penalty' => '課徴金',
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
		$criteria->compare('year',$this->year);
		$criteria->compare('month',$this->month);
		$criteria->compare('real',$this->real);
		$criteria->compare('penalty',$this->penalty);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function addMoney($year,$month,$amount,$type = 'real'){
		$money = Money::model()->findByAttributes(array(
				'user_id'=>Yii::app()->user->id,
				'year'   =>$year,
				'month'  =>$month,
		));
		if ($money == null){
			$money = new Money();
			$money->user_id = Yii::app()->user->id;
			$money->year    = $year;
			$money->month   = $month;
		}
		if ($type == 'penalty')
			$money->penalty = $money->penalty + $amount;
		else $money->real = $money->real + $amount;
		$money->save();
	}
	
	public static function removeMoney($year,$month,$amount){
		$money = Money::model()->findByAttributes(array(
				'user_id'=>Yii::app()->user->id,
				'year'   =>$year,
				'month'  =>$month,
		));
		if ($money == null){
			$money = new Money();
			$money->user_id = Yii::app()->user->id;
			$money->year    = $year;
			$money->month   = $month;
		}
		$money->real = $money->real - $amount;
		$money->save();
	}
}