    <script src="<?php echo Yii::app()->baseUrl.'/js/jscal2/jscal2.js'; ?>"></script>
    <script src="<?php echo Yii::app()->baseUrl.'/js/jscal2/cn.js' ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.'/js/jscal2/jscal2.css' ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.'/js/jscal2/steel/steel.css' ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.'/js/jscal2/border-radius.css' ?>" />
<div class="form" style="margin-left:50px;">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'arters-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"> <span class="required">*</span> 为必填项</p>

	<?php echo $form->errorSummary($model); ?>
<<<<<<< HEAD

=======
>>>>>>> master
	<div class='row'>
		<span>姓名</span>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
			<span class="red">*</span>
			<p class='name_error check_error'>
				<i></i>
				<span class='error1'>姓名不能为空</span>
				<span class='error2'>此成员已添加</span>
			</p>
			<p class='pass'>
				<i></i>
			</p>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<span>性别</span>
		<select value='' name="Arters[sex]" >
			<?php if($model->sex=='女'){?>
				<option value='2'>女</option>
				<option value='1'>男</option>

			<?php }else{?>
				<option value='1'>男</option>
				<option value='2'>女</option>
			<?php }?>
		</select>
<<<<<<< HEAD
	<span class="red">*</span>

		<?php echo $form->error($model,'name'); ?>
	</div>
=======

>>>>>>> master
	<div class="row">
       <span>个人简介:</span><span class="red">*</span><br/>
		<?php echo $form->textArea($model,'description',array('size'=>60,'maxlength'=>300,'style'=>'resize:none;width:600px;height:100px;')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
<<<<<<< HEAD
	

	<span>生日</span>
	<?php echo $form->textField($model,'birthDay',array('id'=>'f_date','value'=>$model->birthDay));?><br />		

	<script type="text/javascript">//<![CDATA[
	      Calendar.setup({
	        inputField : "f_date",
	        trigger    : "f_date",
	        onSelect   : function() { this.hide() },
	        showTime   : 12,
	        dateFormat : "%Y-%m-%d"
	      });
=======

	<span>生日</span>
>>>>>>> master

	<?php echo $form->textField($model,'birthDay',array('id'=>'f_date','value'=>$model->birthDay));?>		
	<span class='red'>*</span>
	</div>

	<div class="row">
<<<<<<< HEAD

		<span>分类</span>&nbsp;&nbsp;&nbsp;
=======
	
		<span>分类</span>
>>>>>>> master
		

		<?php echo $form->dropDownList($model,'bl_arters_category_cateid',ArtersCategory::getCateName()); ?><span class="red">*</span>
		<?php echo $form->error($model,'bl_arters_category_cateid'); ?>
	</div>

	<div class="row">
	<span>标签</span>
		<?php echo $form->textField($model,'tags',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="row">
		<span>地区</span>
		<?php echo $form->textField($model,'district',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'district'); ?>
	</div>

	<div class="row">
		<span>城市</span>
		<?php echo $form->textField($model,'country',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '添加' : '更新'); ?>
	</div>

<?php $this->endWidget();
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/check.js');
?>
	<script type="text/javascript">//<![CDATA[
	      Calendar.setup({
	        inputField : "f_date",
	        trigger    : "f_date",
	        onSelect   : function() { this.hide() },
	        showTime   : 12,
	        dateFormat : "%Y-%m-%d"
	      });

    //]]>
	      </script>
</div><!-- form -->