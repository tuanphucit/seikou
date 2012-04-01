<?php

class CPhpMailerLogRoute extends CEmailLogRoute {
	protected function sendEmail($email, $subject, $message)
	{
		$asbLink = Yii::app()->createAbsoluteUrl('');
		if (preg_match("/localhost/", $asbLink))
			return;
		parent::sendEmail($email, $subject, $message);
	}
}