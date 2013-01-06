

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
			<p class='user_error'>
				<i></i>
				<span class='error0'>用户名不能为空</span>
				<span class='error1'>用户名已存在</span>
				<span class='error2'>用户名应该为5-20个字符(一个中文占2个字符)</span>
			</p>
			<p class='pass'>
				<i></i>
				<span>恭喜用户名可以注册</span>
			</p>
	</div>

	<div class="row">
		<span>用户密码</span>&nbsp;&nbsp;
		<?php echo $form->passwordField($model,'password',array('size'=>36,'maxlength'=>36)); ?>
	
		<span class='red'>*</span>
			<p class='pwd_error'>
				<i></i>
				<span class='error3'>密码不能为空</span>
				<span class='error4'>密码应该为6-20位英文字母和数字组合</span>
			</p>
			<p class='pass'><i></i></p>
	</div>
	<div class="row">
		<span>确认密码</span>&nbsp;&nbsp;
		<input type='password' name='repass' class='passwordc' />&nbsp;<span class='red'>*</span>
		<p class='rpwd_error'>
				<span class='error5'>俩次输入的密码不一致</span>
				<p class='pass'><i></i></p>
		</p>
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
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/sign.js');  ?>
<!-- form -->