<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $full_name
 * @property string $birthday
 * @property integer $idcard
 * @property string $work
 * @property string $address1
 * @property string $address2
 * @property string $email
 * @property string $tel
 * @property string $yahoo
 * @property string $skype
 * @property integer $status
 * @property string $last_login
 *
 * The followings are the available model relations:
 * @property Orders[] $orders
 * @property OrdersHistory[] $ordersHistories
 */
class Users extends CActiveRecord
{
	const USER_NONE    = 0;
	const USER_WAITING = 1;
	const USER_REJECT  = 2;
	const USER_ACTIVE  = 3;
	
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
			array('id, username, password, full_name, birthday, idcard, work, address2, email, tel', 'required'),
			array('idcard, status', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>8),
			array('id, username', 'unique'),
			array('id', 'match', 'pattern'=>'/^US\d{3}$/'),
			array('username', 'length', 'max'=>15),
			array('password, full_name, email, yahoo, skype', 'length', 'max'=>40),
			array('email','email'),
			array('work, address1, address2', 'length', 'max'=>256),
			array('tel', 'length', 'max'=>11),
			array('last_login, password_repeat', 'safe'),
			array('password_repeat', 'compare', 'compareAttribute'=>'password'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, full_name, birthday, idcard, work, address1, address2, email, tel, yahoo, skype, status, last_login', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('model','ID'),
			'username' => Yii::t('model','Username'),
			'password' => Yii::t('model','Password'),
			'password_repeat' => Yii::t('model','Password Repeat'),
			'full_name' => Yii::t('model','Full Name'),
			'birthday' => Yii::t('model','Birthday'),
			'idcard' => Yii::t('model','Idcard'),
			'work' => Yii::t('model','Work'),
			'address1' => Yii::t('model','Hometown'),
			'address2' => Yii::t('model','Home Address'),
			'email' => Yii::t('model','Email'),
			'tel' => Yii::t('model','Tel'),
			'yahoo' => Yii::t('model','Yahoo'),
			'skype' => Yii::t('model','Skype'),
			'status' => Yii::t('model','Status'),
			'last_login' => Yii::t('model','Last Login'),
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
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('idcard',$this->idcard);
		$criteria->compare('work',$this->work,true);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('yahoo',$this->yahoo,true);
		$criteria->compare('skype',$this->skype,true);
		if (request('status') != 0)
			$criteria->compare('status',request('status'));
		unset($_GET['status']);
		$criteria->compare('last_login',$this->last_login,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Fetch User id from Full name
	 * @param string $full_name
	 */
	public static function getUserID($full_name){
		$user = Users::model()->findByAttributes(array('full_name'=>$full_name));
		if ($user != null)
			return $user->id;
		return null;
	}
	
	/**
	 * Get list user name with id
	 * @return array user
	 */
	public static function getListUserName(){
		$list = array();
		$list['0'] = t('Select ...','admin');
		$users = Users::model()->findAll('',array('order'=>'full_name ASC'));
		foreach ($users as $user){
			$list[$user->id] = $user->full_name;
		}
		return $list;
	}
	
	public static function getListStatus()
	{
		return array(
			Users::USER_NONE     => t('Select ...','admin'),
			Users::USER_WAITING  => t('Waiting','model'),
			Users::USER_REJECT   => t('Reject','model'),
			Users::USER_ACTIVE   => t('Active','model'),
		);
	}
	
	public function getStatusLabel(){
		$list = $this->getListStatus();
		return $list[$this->status];
	}
}