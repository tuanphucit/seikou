<?php

class QuickTipWidget extends CWidget {
	
	public $header;
	public $content;
	
	public function run(){
		Yii::app()->getAssetManager()->linkAssets = true;
		$assetsUrl = publish(dirname(__FILE__) . '/assets', false, -1, YII_DEBUG);
		$cs = Yii::app()->clientScript;
		$cs->registerScriptFile($assetsUrl . "/js/quicktip.js");
		$cs->registerCssFile($assetsUrl . "/css/quicktip.css");
		
		$this->render('quicktip',array('header'=>$this->header,'content'=>$this->content));
	}
}