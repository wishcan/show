<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gallery-category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span>为必填项</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'cname'); ?>
		<?php echo $form->textField($model,'cname',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cname'); ?>
	</div>
	<div class='row'> 
		<input type='hidden' name='GalleryCategory[pid]' value= '<?php echo $_GET['pid'];?>' />

	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '添加' : '更新'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->