<?php

class QuickTipWidget extends CWidget {
	
	
	public function init(){
		Yii::app()->getAssetManager()->linkAssets = true;
		$assetsUrl = publish(dirname(__FILE__) . '/assets');
		$cs = Yii::app()->clientScript;
		$cs->registerScriptFile($assetsUrl . "/js/quicktip.js");
		$cs->registerCssFile($assetsUrl . "/css/quicktip.css");
		
		$this->render('quicktip');
	}
	
	public function run(){
		
		echo '    	
				</div>
			</div>
		</div>
		';
	}
}