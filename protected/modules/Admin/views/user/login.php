
</head>

<style type="text/css">
@charset "UTF-8";
body{
	background: #2069B6;
}
.center{
	 background: url("/show/images/login.jpg") repeat scroll 0 0 transparent;
}
form{
	text-align: center;	
	position: relative;
	top:280px;
}
form input[type='submit']{
	*border:none;
	text-align: center;
	position:relative;
	margin-left: 0px;
	margin-top:20px;
	left:440px;
	*left:0px;
}
.center span{
	color:#2780D2;
}
.sign{
position: relative;
top:-27px;
left:80px;
}
.sign:hover{
	color:#88CF00;
	font-weight: bold;
}
input{margin-top:5px;}
input[type='text'],input[type='password']{position: relative;left:15px; }
</style>
<body>

	<div class="center">
	<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?><div class='row'>
			<span>用户名</span>
			<?php echo $form->textField($model,'username')?>
			<?php echo $form->error($model,'username')?>
		</div>
		<div class='row'>
			<span>密&nbsp;&nbsp;&nbsp;码</span>
				<?php echo $form->passwordField($model,'password')?>
				<?php echo $form->error($model,'password');?>
		</div>
		<?php echo CHtml::submitButton('登陆');?>
		<a href='' >注册</a>

		</form>
		<?php $this->endWidget();?>
	</div>
</div>
</body>