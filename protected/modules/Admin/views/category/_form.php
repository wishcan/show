<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带<span class="required">*</span> 号为必填项</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'pid'); ?>
	<?php

          echo $form->dropDownList($model,'pid',Category::model()->getInfo()); ?>
		<?php echo $form->error($model,'pid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cname'); ?>
		<?php echo $form->textField($model,'cname',array('size'=>40,'maxlength'=>80,'height'=>30)); ?>
		<?php echo $form->error($model,'cname'); ?>
	</div>
	<div class="row">
		<input type="radio" value="1" name="Category[type]"/>文字类
		<input type="radio" value="2" name="Category[type]" />图片类
		<input type="radio" value="3" name="Category[type]" />视频类

	</div>	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '提交' : '更改'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
