<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">
		<span class="required">*</span>为必填项
	</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<span>用户账号</span>&nbsp;&nbsp;
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
		<span class='red'>*</span>
	</div>

	<div class="row">
		<span>用户密码</span>&nbsp;&nbsp;
		<?php echo $form->passwordField($model,'password',array('size'=>36,'maxlength'=>36)); ?>
		<span class='red'>*</span>
	</div>
	<div class="row">
		<span>确认密码</span>&nbsp;&nbsp;
		<input type='password' name='repass' />&nbsp;<span class='red'>*</span>
	</div>
	<div class="row">
		<span>用户性别</span>&nbsp;&nbsp;
		<select name='User[sex]'>
			<?php if(isset($model->sex) && $model->sex=='女'){?>
			<option value='2'>女</option>
			<option value='1'>男</option>
			<?php }else{?>
			<option value='1'>男</option>
			<option value='2'>女</option>
			<?php }?>
		</select>

	</div>
	<div class="row">
		<span>分配角色</span>&nbsp;&nbsp;
		<?php echo $form->dropDownList($model,'bl_role_rid',Role::model()->getRoles()); ?>
		
	</div>

	<div class="row buttons">&nbsp;&nbsp;
		<?php echo CHtml::submitButton($model->isNewRecord ? '添加' : '更新'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->