<?php
/** Class LanguagePikcer extends CWidget
 * 
 * This is a Wrapper for the Yii's CWdiget to display Language Picker
 * @author luckymancvp
 * @version 1.0
 */

class LanguagePicker extends CWidget
{
	public function run(){
		$this->render('language');
	} 
}