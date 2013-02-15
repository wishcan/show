<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gallery-category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span>为必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cateid'); ?>
		<?php echo $form->textField($model,'cateid'); ?>
		<?php echo $form->error($model,'cateid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cname'); ?>
		<?php echo $form->textField($model,'cname',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cname'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '添加' : '更新'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->