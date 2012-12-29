<div id="form_content">
<link rel="stylesheet" type="text/css" href="<?php Yii::app()->baseUrl.'css/default.css' ?>">
<h3 class="top_l"><span id="title">新建指数</span><i class="top_r"></i></h3>
<div class="c"></div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'arters-index-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span>为必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<span>艺术家</span>
		<?php echo $form->dropDownList($model,'aid',Arters::getArtName()); ?>
		<?php echo $form->error($model,'aid'); ?><span class="red">*</span>
	</div>

	<div class="row">
		<span>指数</span>
		  &nbsp;<?php echo $form->textField($model,'index'); ?>
		<?php echo $form->error($model,'index'); ?><span class="red">*</span>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '添加' : '更新'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->