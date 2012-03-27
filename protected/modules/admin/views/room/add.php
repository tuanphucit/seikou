<!-- 
<link href="<?php echo Html::url('uploadify/uploadify.css');?>" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo Html::url('uploadify/swfobject.js');?>"></script>
<script type="text/javascript" src="<?php echo Html::url('uploadify/jquery.uploadify.v2.1.4.min.js');?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
	  $('#file_upload').uploadify({
		'uploader'  : '<?php echo Html::url('uploadify/uploadify.swf')?>',
		'script'    : '<?php echo Html::url('uploadify/uploadify.php')?>',
		'cancelImg' : '<?php echo Html::url('uploadify/cancel.png')?>',
		'folder'    : '<?php echo Html::url('uploads/products')?>',
		'auto'      : true,
		'onComplete': function (event, queueID, fileObj, response, data) {
			$("#avatar").html('<img src="' + response + '"/>');
			$("#Post_avatar").val(response);
			}
	  });
	});
</script>
 -->
<script type="text/javascript" src="<?php echo Html::url('ckeditor/ckeditor.js')?>"></script>
<script type="text/javascript" src="<?php echo Html::url('ckfinder/ckfinder.js')?>"></script>
<?php 
	$cs = Yii::app()->getClientScript();
	$cs->registerScript('load-content',"
		var editor = CKEDITOR.replace( 'Products_description');
		CKFinder.setupCKEditor( editor, '".Yii::app ()->baseUrl."/ckfinder' ) ;
	",CClientScript::POS_READY);
	
	$form = $this->beginWidget('bootstrap.widgets.BootActiveForm',array(
		'id'=>'add-post-form',
	));
	echo "<table>";	
		echo $form->hiddenField($product,'type',array('value'=>0));
		echo "<tr>";
			echo "<td>";
				echo $form->label($product,'id');
			echo "</td>";
			echo "<td>";
				echo $form->textField($product,'id',array('placeholder'=>'RMXXX'));
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($product,'name');
			echo "</td>";
			echo "<td>";
				echo $form->textField($product,'name');
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($product,'price');
			echo "</td>";
			echo "<td>";
				echo $form->textField($product,'price');
				echo Yii::t('admin',' .000 VND / 0.5 hour');
			echo "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>";
				echo $form->label($product,'image');
			echo "</td>";
			echo "<td>";
				echo $form->textField($product,'image');
			echo "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>";
				echo $form->label($product,'description');
			echo "</td>";
			echo "<td>";
				echo $form->textArea($product,'description');
			echo "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>";
				echo $form->label($product,'option');
			echo "</td>";
			echo "<td>";
				echo $form->textField($product,'option');
			echo "</td>";
		echo "</tr>";
		echo "<tfoot>";
			echo $form->errorSummary($product);
			echo "<tr>";
				echo "<td>";
					echo Html::submitButton(t("Add",'admin'),array('class'=>'button'));
				echo "</td>";
			echo "</tr>";
		echo "</tfoot>";
	echo "</table>";
	$this->endWidget();
?>