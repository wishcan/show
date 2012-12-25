
<div class="form" style="margin-left:50px;">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'arters-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"> <span class="required">*</span> 为必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
		<?php echo $form->textField($model,'sex',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
	
	<span>生日</span> <input size="30" id="f_date" name="Arters[birthDay]" /><button id="f_btn">选择</button><br />
	<script type="text/javascript">//<![CDATA[
	      Calendar.setup({
	        inputField : "f_date",
	        trigger    : "f_btn",
	        onSelect   : function() { this.hide() },
	        showTime   : 12,
	        dateFormat : "%Y-%m-%d"
	      });

    //]]></script>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bl_arters_category_cateid'); ?>
		<?php echo $form->dropDownList($model,'bl_arters_category_cateid',ArtersCategory::getCateName()); ?>
		<?php echo $form->error($model,'bl_arters_category_cateid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php echo $form->textField($model,'tags',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'district'); ?>
		<?php echo $form->textField($model,'district',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'district'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '添加' : '更新'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->