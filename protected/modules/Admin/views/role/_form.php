<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'role-form',
	'enableAjaxValidation'=>false,
)); ?>

<<<<<<< HEAD
	<p class="note"><span class="required">*</span>为必填项</p>
=======
	<p class="note"> <span class="required">*</span> 为必填项.</p>
>>>>>>> df5fb8b012f47d193deb10e0c4982163c2092bba

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