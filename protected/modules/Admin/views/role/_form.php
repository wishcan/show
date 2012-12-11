<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'role-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rname'); ?>
		<?php echo $form->textField($model,'rname',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'rname'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '提交' : '更改'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->