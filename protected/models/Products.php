<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property string $id
 * @property string $name
 * @property string $image
 * @property string $description
 * @property integer $price
 * @property integer $type
 * @property integer $option
 *
 * The followings are the available model relations:
 * @property Orders[] $orders
 */
class Products extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Products the static model class
	 */
	
	// Define two types of product
	const TYPE_ROOM      = 0;
	const TYPE_EQUIPMENT = 1;
	
	const STATUS_FREE    = 2;
	const STATUS_USING   = 3;
	const STATUS_OVER    = 4;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, name, price, type, option', 'required'),
			array('price, type, option', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>5),
			array('id', 'unique'),
			array('id', 'match', 'pattern'=>'/[(^[(RM)(PR)]\d{3}$/)'),
			array('name', 'length', 'max'=>50),
			array('image', 'length', 'max'=>255),
			array('description', 'length', 'max'=>20000),
			array('price','numerical','min'=>1,'max'=>'10000'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, image, description, price, type, option', 'safe', 'on'=>'search'),
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
			'orders' => array(self::HAS_MANY, 'Orders', 'product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => t('ID','model'),
			'name' => t('Product Name','model'),
			'image' => t('Image','model'),
			'description' => t('Description','model'),
			'price' => t('Price / 0.5 hour','model'),
			'type' => t('Type','model'),
			'option' => t('Option','model'),
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('type',$this->type);
		$criteria->compare('option',$this->option);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
		        'pageSize'=>20,
		    ),
		));
	}
	
	/**
	 * @return array プロダクトのタイプ
	 * ０:ルーム
	 * １:設備
	 */
	public function getTypeList()
	{
		return array(
			self::TYPE_ROOM => Yii::t('admin','Room'),
			self::TYPE_EQUIPMENT => Yii::t('admin','Equipment'),
		);
	}
	
	/**
	 * @return プロダクトのタイプ。
	 * ０:ルーム
	 * １:設備
	 */
	public function getProductType()
	{
		$list = $this->getTypeList();
		return $list[$this->type];
	}
	
	/**
	 * @return Option label
	 */
	public function getOptionLabel()
	{
		if ($this->type == self::TYPE_ROOM) {
			return Yii::t('admin','Number of seats');
		}
		return Yii::t('admin','In stock');
	}
	
	public function truncate($string, $limit = 200, $break=" ", $pad="..."){
		$string = strip_tags($string);
		// return with no change if string is shorter than $limit 
		if(strlen($string) <= $limit) return $string;
		 
		// is $break present between $limit and the end of the string? 
		if(false !== ($breakpoint = strpos($string, $break, $limit))) { 
				if($breakpoint < strlen($string) - 1) { 
						$string = substr($string, 0, $breakpoint) . $pad; 
				} 
		}
		return $string;
	}

	/**
	 * Get Room Status
	 */
	public function getStatus() 
	{
		$criteria = new CDbCriteria();
		$criteria->condition = "product_id = '$this->id'";
		$today  = date('Y-m-d');
		$criteria->addCondition("start_date <= '$today' and '$today' <= end_date");
		$now    = date('H-i');
		$criteria->addCondition("start_time <= '$now'");
		$orders = Orders::model()->findAll($criteria);
		foreach ($orders as $order){
			// check order status
			$order_status = $order->getLastestStatus();
			switch ($order_status) {
				case OrdersHistory::HISTORY_CREATE:
				case OrdersHistory::HISTORY_CREATE_ADMIN:
					if ($order->end_time < $now)
						return Products::STATUS_OVER;
					return Products::STATUS_USING;
				break;
			}
		}
		return Products::STATUS_FREE;
	}
	
	/**
	 * Get product status label
	 * @param int $status : Product status value
	 * @param boolean $onHTML : whenever export to HTML or not
	 * @return label of this value
	 */
	public static function getStatusLabel($status,$onHTML = true)
	{
		// List all status
		if (!$onHTML){
			$statusLabels = array(
				Products::STATUS_FREE  =>t('Free ','admin'),
				Products::STATUS_USING =>t('Using','admin'),
				Products::STATUS_OVER  =>t('Over ','admin'),
			);
			return $statusLabels[$status];
		}
		
		switch ($status){
			case Products::STATUS_FREE:
				$type = "primary";
				$label = t('Free','admin');
				break;
			case Products::STATUS_USING:
				$type = "warning";
				$label = t('Using','admin');
				break;
			case Products::STATUS_OVER:
				$type = "danger";
				$label = t('Over','admin');
				break;
		}
		$ajaxButton = 
		Yii::app()->controller->widget('bootstrap.widgets.BootButton', 
			array(
				'url' => '#',
				'type'=> $type,
				'label'=>$label,
	    	),
	    	true
	    ); 
		return $ajaxButton;
	}
}