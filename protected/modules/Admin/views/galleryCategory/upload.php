<?php
$this->breadcrumbs=array(
	'Galleries'=>array('index'),
	'Create',
);

?>

<?php $url=Yii::app()->request->baseUrl;?>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<div class="content" style='margin-left:0px;'>
        
        <div class="header">
            
            <h1 class="page-title">添加图片信息</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">后台</a> <span class="divider">/</span></li>
            <li class="active">图片上传</li>
        </ul>
<div class="c"></div>

<div class="form" style='margin-left:0px'>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gallery-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data'),
));

Yii::app()->clientScript->registerMetaTag(' text/html;charset=gbk', null, 'Content-Type');  
?>

<style type="text/css">
    
    .uploads{
        border:solid 2px #fff;
        width:860px;
        /*height:462px;*/
        padding: 20px;
    }
    .gate{
        height:46px;
        overflow: hidden;
    }
    .up_t span,.gate div,.or{
        padding:10px 5px;
    }
</style>
<div class='uploads'>
	<div class='up_t'>
         <span class='l up'>上传到：</span>
         <div class='gate l'>
                <?php 
                foreach ($cate as $v):?>
                    
                <div>
              <?php echo '<a href="'.Yii::app()->createUrl('Admin/gallery/create',array('cid'=>$v->cateid)).'">'.$v->cname.'</a>'?>
                </div>
               <?php endforeach;  ?>
         </div>      
         <div class='or l'>
            <span>或</span>
             <a href="<?php echo Yii::app()->createUrl('Admin/galleryCategory/create')?>">新建栏目</a>
        </div>
    </div>
    <div class='c'></div>
    <div>
     <div id="smallImg" style="display:none">
    </div>
    <div class="row">
<!--图片上传后会自动生成input hidden表单 name为thumb 这个在所有的图片上传中通用-->
         <div id="divFileProgressContainer"></div>
              
              <div class="swfupload" id="bswf"style=""><button id="swfupload"></button>
              </div><span class='limit l'>限99张</span>
              <div class='c'></div>
    </div>

    </div>

</div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('添加'); ?>
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
        'button_width'=>112,
        'button_height'=>28,
        'button_text'=>'<button class="button"><b></b></button>',
        'button_text_style'=>'.button { text-align: center;}',
        'button_text_top_padding'=>0,
        'button_text_left_padding'=>0,
        'button_window_mode'=>'js:SWFUpload.WINDOW_MODE.TRANSPARENT',
        'button_cursor'=>'js:SWFUpload.CURSOR.HAND',
        ),
    )
);
// Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/check.js');
?>
 




