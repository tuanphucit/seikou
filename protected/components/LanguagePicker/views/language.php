<?php 
	$cs = Yii::app()->getClientScript();
	$cs->registerScriptFile(publish($this->viewPath.DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'jquery.polyglot.language.switcher-1.1.js'));
	$cs->registerScriptFile(publish($this->viewPath.DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'persist-min.js'));
	$cs->registerCSsFile(
		$this->viewPath.DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'polyglot-language-switcher-1.1.css',
		'screen'
	);
?>
	<script type="text/javascript">
        $(document).ready(function() {
            $(this).polyglotLanguageSwitcher({
				effect:'fade', 
                testMode:true
			});
        });
    </script>
<!-- begin language switcher -->
<div id="polyglotLanguageSwitcher">
<form action="#">
	<select id="polyglot-language-options">
		<option id="en" value="en" selected>English</option>
		<option id="fr" value="fr">Fran&ccedil;ais</option>
		<option id="de" value="de">Deutsch</option>
		<option id="it" value="it">Italiano</option>
		<option id="es" value="es">Espa&ntilde;ol</option>
	</select>
</form>
</div>
<!-- end language switcher -->