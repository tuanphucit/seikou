<!-- uploadtify for import tool -->
<link href="<?php echo Html::url('uploadify/uploadify.css');?>" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo Html::url('uploadify/swfobject.js');?>"></script>
<script type="text/javascript" src="<?php echo Html::url('uploadify/jquery.uploadify.v2.1.4.min.js');?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
	  $('#file_upload').uploadify({
		'uploader'  : '<?php echo Html::url('uploadify/uploadify.swf')?>',
		'script'    : '<?php echo Html::url('uploadify/uploadify.php')?>',
		'cancelImg' : '<?php echo Html::url('uploadify/cancel.png')?>',
		'folder'    : '<?php echo Html::url('uploads/databases')?>',
		'auto'      : true,
		'onComplete': function (event, queueID, fileObj, response, data) {
			$("#image").html('<img src="' + response + '" width="300px" height="200px"/>');
			$("#Products_image").val(response);
			}
	  });
	});
</script>


<h2>Database Management Tool</h2>
<hr>
<?php 
	echo "<strong>".t('Export Entire Database')."</strong>";
	echo "<br>";
	echo "<br>";
	$this->widget('bootstrap.widgets.BootButton', array(
		'label'=>t('Export Now','admin'),
		'type'=>'primary',
		'size'=>'medium',
		'url'=>array('/admin/tool/export'),
)); ?>
<hr>
<?php 
	echo "<strong>".t('Import Database')."</strong>";
	echo "<br>";
	echo "<br>";
	echo '<div id="file_upload"></div>';
	echo Html::textField('FilePath');
	echo Html::hiddenField('File');
?>
