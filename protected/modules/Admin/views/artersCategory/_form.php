<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'arters-category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span>为必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<span>分类名</span>
		<?php echo $form->textField($model,'cname',array('size'=>45,'maxlength'=>45)); ?>
		<span class="red">*</span>
		<p class='ac_error check_error'>
			<i></i>
			<span class='error1'>栏目名不能为空</span>
			<span class='error2'>此栏目已存在</span>	
		</p>
		<p class='pass'>
			<i></i>
		</p>
		<?php echo $form->error($model,'cname'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '添加' : '更新'); ?>
	</div>

<?php $this->endWidget(); 
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/check.js');
?>

</div><!-- form -->