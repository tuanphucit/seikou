<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	
	const ERROR_REJECT  = 10;
	const ERROR_WAITING = 11;

	private $_id;
	public function authenticate()
	{
		$record = Users::model()->findByAttributes(array('username'=>$this->username));
		if ($record == NULL)
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		else if ($record->password != sha1(md5($this->password)))
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else{
			$this->_id = $record->id;
			$record->last_login = new CDbExpression('NOW()');
			$record->save();
			$this->errorCode = self::ERROR_NONE;
			if ($record->status == Users::USER_REJECT)
				$this->errorCode = self::ERROR_REJECT;
			if ($record->status == Users::USER_WAITING)
				$this->errorCode = self::ERROR_WAITING;
		}
		return $this->errorCode;
	}
	
	/**
	 * @author luckymancvp
	 * @return id of current Indentity
	 * @see CUserIdentity::getId()
	 */
	public function getId(){
		return $this->_id;
	}
}