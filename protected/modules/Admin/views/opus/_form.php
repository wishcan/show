<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'opus-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> 为必填项</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'opuName'); ?>
		<?php echo $form->textField($model,'opuName',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'opuName'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'pubName'); ?>
		<?php echo $form->textField($model,'pubName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'pubName'); ?>
	</div>	
	<div class="row">
		<?php echo $form->labelEx($model,'creatTime'); ?>
		<?php echo $form->textField($model,'creatTime'); ?>
		<?php echo $form->error($model,'creatTime'); ?>
	</div>
	<div class="row">

   		<div id="divFileProgressContainer"></div>
 			<span>缩略图上传(<span class='red'>限一张</span> &nbsp;)</span>
   			<div class="swfupload" id="bswf"style="">
   			 	<button id="swfupload"></button>
  			</div>
  	</div>
    <div id="smallImg"> 
    </div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '添加' : '更新'); ?>
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
        'file_upload_limit'=>1,
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
?>
