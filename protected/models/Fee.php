<?php

/**
 * This is the model class for table "fee".
 *
 * The followings are the available columns in table 'fee':
 * @property integer $id
 * @property integer $register
 * @property integer $penalty
 * @property integer $cancel
 */
class Fee extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Fee the static model class
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
		return 'fee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, register, penalty, cancel', 'required'),
			array('id, register, penalty, cancel', 'numerical', 'integerOnly'=>true,'max'=>100000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, register, penalty, cancel', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => t('ID','model'),
			'register' => t('Register','model'),
			'penalty' => t('Penalty','model'),
			'cancel' => t('Cancel','model'),
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
		$criteria->compare('register',$this->register);
		$criteria->compare('penalty',$this->penalty);
		$criteria->compare('cancel',$this->cancel);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}