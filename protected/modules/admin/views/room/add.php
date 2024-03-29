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
			$("#image").html('<img src="' + response + '" width="300px" height="200px"/>');
			$("#Products_image").val(response);
			}
	  });
	});
</script>
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
		'enableClientValidation'=>true,
		'clientOptions'=>array('validateOnSubmit'=>true),
	));
	echo "<table>";	
		echo $form->hiddenField($product,'type',array('value'=>0));
		echo "<tr>";
			echo "<td>";
				echo $form->label($product,'id');
			echo "</td>";
			echo "<td>";
				echo $form->textField($product,'id',array('placeholder'=>'RMXXX'));
				echo "<br>";
				echo $form->error($product,'id');
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($product,'name');
			echo "</td>";
			echo "<td>";
				echo $form->textField($product,'name');
				echo "<br>";
				echo $form->error($product,'name');
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($product,'price');
			echo "</td>";
			echo "<td>";
				echo $form->textField($product,'price');
				echo Yii::t('admin',' VND / 0.5 hour');
				echo "<br>";
				echo $form->error($product,'price');
			echo "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>";
				echo $form->label($product,'image');
			echo "</td>";
			echo "<td>";
				echo "<div id='image'>";
				if ($product->image != null){
					echo Html::image($product->image,$product->name,array('width'=>'300px','height'=>'200px'));
				}
				echo "</div>";
				echo "<div id='file_upload'></div>";
				echo $form->hiddenField($product,'image');
				echo "<br>";
				echo $form->error($product,'image');
			echo "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>";
				echo $form->label($product,'description');
			echo "</td>";
			echo "<td>";
				echo $form->textArea($product,'description');
				echo "<br>";
				echo $form->error($product,'description');
			echo "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>";
				echo $form->label($product,'option');
			echo "</td>";
			echo "<td>";
				echo $form->textField($product,'option');
				echo "<br>";
				echo $form->error($product,'option');
			echo "</td>";
		echo "</tr>";
	echo "</table>";
	echo $form->errorSummary($product);
	echo "<br>";
	echo Html::submitButton(t("Save",'admin'),array('class'=>'button'));
	$this->endWidget();
?>