<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property integer $role
 * @property string $name
 * @property string $birthday
 * @property integer $idcard
 * @property string $address1
 * @property string $address2
 * @property string $email
 * @property string $tel
 * @property string $yahoo
 * @property string $skype
 * @property string $last_login
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, username, password, role, name, birthday, idcard, address2, email, tel', 'required'),
			array('role, idcard', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>8),
			array('username', 'length', 'max'=>15),
			array('password, email, yahoo, skype', 'length', 'max'=>40),
			array('name', 'length', 'max'=>128),
			array('address1, address2', 'length', 'max'=>256),
			array('tel', 'length', 'max'=>11),
			array('last_login', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, role, name, birthday, idcard, address1, address2, email, tel, yahoo, skype, last_login', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'role' => 'Role',
			'name' => 'Name',
			'birthday' => 'Birthday',
			'idcard' => 'Idcard',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'email' => 'Email',
			'tel' => 'Tel',
			'yahoo' => 'Yahoo',
			'skype' => 'Skype',
			'last_login' => 'Last Login',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('role',$this->role);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('idcard',$this->idcard);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('yahoo',$this->yahoo,true);
		$criteria->compare('skype',$this->skype,true);
		$criteria->compare('last_login',$this->last_login,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}