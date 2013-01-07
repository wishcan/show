<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gallery-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data'),
)); ?>

	<p class="note"> <span class="required">*</span> 为必填项</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<span>标题</span>
		<?php echo $form->textField($model,'title',array('size'=>30,'maxlength'=>30)); ?>
		<span class='red'>*</span>
			<p class='gallery_error check_error'>
				<i></i>
				<span class='error1'>标题不能为空</span>
				<span class='error2'>文章已经存在</span>
			</p>
			<p class='pass'>
				<i></i>
			</p>
		<?php echo $form->error($model,'title'); ?>
	</div>

    
    <div class="row">
        <span>简介</span>
        <?php echo $form->textArea($model,'description',array('size'=>60,'maxlength'=>100,'style'=>'width:300px;height:50px;resize:none;')); ?>
        <?php echo $form->error($model,'description'); ?>
    </div>
    <div>
    <div class="row">
<!--图片上传后会自动生成input hidden表单 name为thumb 这个在所有的图片上传中通用-->
    <div id="divFileProgressContainer"></div>
  <label>缩略图上传(<span class='limit'>限99张</span>)</label>
    <div class="swfupload" id="bswf"style=""><button id="swfupload"></button></div>
    </div>
    <div id="smallImg"> 
    <label>图片预览 </label>
    </div>
    </div>


    <div class="row">
        
       <span>标签</span> <?php echo $form->textField($model,'tag',array('size'=>20,'maxlength'=>20)); ?>
        <?php echo $form->error($model,'tag'); ?>
    </div>
	<div class="row">
		<span>状态</span>
		<?php echo $form->dropDownList($model,'type_id',NewsType::model()->getTypeList(0)); ?>
		<?php echo $form->error($model,'type_id'); ?>
	</div>

	<div class="row">

	</div>



    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? '添加' : 'Save'); ?>
    </div>

  <?php $this->endWidget(); ?>
</div><!-- form -->

<?php

$this->widget('application.extensions.swfupload.CSwfUpload', array(
    'jsHandlerUrl'=>Yii::app()->baseUrl.'/js/handler.js', //Relative path
    'postParams'=>array(),
    'config'=>array(
        'use_query_string'=>true,
        'upload_url'=>Yii::app()->createUrl("Upload/add"), //Use $this->createUrl method or define yourself
        'file_size_limit'=>'2 MB',
        'file_types'=>'*.jpg;*.png;*.gif',
        'file_types_description'=>'Image Files',
        'file_upload_limit'=>99,
        'file_queue_error_handler'=>'js:fileQueueError',
        'file_dialog_complete_handler'=>'js:fileDialogComplete',
        'upload_progress_handler'=>'js:uploadProgress',
        'upload_error_handler'=>'js:uploadError',
        'upload_success_handler'=>'js:uploadSuccess',
        'upload_complete_handler'=>'js:uploadComplete',
        'upload_addImage_handler'=>'js:addImage',
        'custom_settings'=>array('upload_target'=>'divFileProgressContainer'),
        'button_placeholder_id'=>'swfupload',
        'button_width'=>50,
        'button_height'=>50,
        'button_text'=>'<button class="button"><b></b></button>',
        'button_text_style'=>'.button { text-align: center;}',
        'button_text_top_padding'=>0,
        'button_text_left_padding'=>0,
        'button_window_mode'=>'js:SWFUpload.WINDOW_MODE.TRANSPARENT',
        'button_cursor'=>'js:SWFUpload.CURSOR.HAND',
        ),
    )
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/check.js');
?>
 




