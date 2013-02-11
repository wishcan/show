<div class="content" style='margin-left:0px;'>
        
        <div class="header">
            
            <h1 class="page-title">公司信息</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">后台</a> <span class="divider">/</span></li>
            <li class="active">编辑信息</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">

  <div class="btn-group">
  </div>    
</div>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'about-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>500,'style'=>'width:300px')); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telephone'); ?>
		<?php echo $form->textField($model,'telephone',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'telephone'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'telephone'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'putNum'); ?>
		<?php echo $form->textField($model,'putNum',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'putNum'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '添加' : '更新'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->