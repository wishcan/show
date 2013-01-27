<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'video-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> 为必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<span>标题</span>
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<span>链接</span>
		<input type='text' value='视频地址' name='Video[thumb]'class='video' style='color:#666;width:300px;'/><input type ='button' style='display:inline-block' class='prew' value='预览' />
		<input type='hidden' />
	</div>
<script type='text/javascript'>
$(function(){

	/*
		点击
	*/
	$(".video").focus(function(){
		if($(this).val()=='视频地址')
			{
				$(this).val('');
			}
	})
	$(".video").blur(function(){
			if($(this).val()=='')
				{
				$(this).val('视频地址');
				}

		})
	$('.prew').click(function(){
		pullData();
	
		})
function pullData()
{
		var url=$('.video').val();
		$.post(
				'/show/index.php?r=Admin/video/createThumb',
				{url:url},
				function(json)
				{
					$("<img src='"+json.img+"' />").insertAfter($(".prew"));
					},'json')

}
	
})
</script>
	<div class="row">
		<span>标签</span>
		<?php echo $form->textField($model,'tag',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'tag'); ?>
	</div>
	<div class="row">
		<span>简介</span>
		<?php echo $form->textArea($model,'description',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '添加' : '更新'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->