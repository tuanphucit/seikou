<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property integer $role
 * @property string $first_name
 * @property string $last_name
 * @property string $birthday
 * @property integer $idcard
 * @property string $work
 * @property string $address1
 * @property string $address2
 * @property string $email
 * @property string $tel
 * @property string $yahoo
 * @property string $skype
 * @property string $last_login
 *
 * The followings are the available model relations:
 * @property Orders[] $orders
 * @property OrdersHistory[] $ordersHistories
 */
class Users extends CActiveRecord
{
	public $password_repeat;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, username, password, role, first_name, last_name, birthday, idcard, work, address2, email, tel', 'required'),
			array('role, idcard', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>8),
			array('username', 'length', 'max'=>15),
			array('password, first_name, last_name, email, yahoo, skype', 'length', 'max'=>40),
			array('email','email'),
			array('work, address1, address2', 'length', 'max'=>256),
			array('tel', 'length', 'max'=>11),
			array('last_login', 'safe'),
			array('password','compare'),
			array('password_repeat','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, role, first_name, last_name, birthday, idcard, work, address1, address2, email, tel, yahoo, skype, last_login', 'safe', 'on'=>'search'),
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
			'orders' => array(self::HAS_MANY, 'Orders', 'user_id'),
			'ordersHistories' => array(self::HAS_MANY, 'OrdersHistory', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('user','ID'),
			'username' => Yii::t('user','Username'),
			'password' => Yii::t('user','Password'),
			'role' => Yii::t('user','Role'),
			'first_name' => Yii::t('user','First Name'),
			'Last_name' => Yii::t('user','Last Name'),
			'birthday' => Yii::t('user','Birthday'),
			'idcard' => Yii::t('user','Idcard'),
			'work' => Yii::t('user','Work'),
			'address1' => Yii::t('user','Address1'),
			'address2' => Yii::t('user','Address2'),
			'email' => Yii::t('user','Email'),
			'tel' => Yii::t('user','Tel'),
			'yahoo' => Yii::t('user','Yahoo'),
			'skype' => Yii::t('user','Skype'),
			'last_login' => Yii::t('user','Last Login'),
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
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('idcard',$this->idcard);
		$criteria->compare('work',$this->work,true);
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
	
	/**
	 * @return ロールの名前
	 */
	public function getRoleName() {
		return ($this->role == 1)? Yii::t('user','admin'):Yii::t('user','user');
	}
	
	/**
	 * perform one-way encryption on the password before we store it in the database
	 *
	 */
	protected function afterValidate() 
	{
		parent::afterValidate();
		$this->password = sha1(md5($this->password));
	}
}