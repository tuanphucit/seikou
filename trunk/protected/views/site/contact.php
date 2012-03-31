<?php
$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Contact Us</h1>


<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="contact-form">

<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'name')?>
		<?php echo $form->textFieldRow($model,'email')?>
		<?php echo $form->textFieldRow($model,'subject')?>
		<?php echo $form->textFieldRow($model,'subject')?>
		<?php echo $form->textAreaRow($model,'body')?>

	<?php if(CCaptcha::checkRequirements()): ?>
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	<?php endif; ?>
		<br>
		<?php echo CHtml::submitButton('Submit'); ?>

	<?php $this->endWidget(); ?>

</div><!-- form -->

