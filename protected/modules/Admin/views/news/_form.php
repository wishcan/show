<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data'),
)); ?>

	<p class="note"> <span class="required">*</span> 为必填项</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>


    <div class="row">
        <?php echo $form->labelEx($model,'source'); ?>
        <?php echo $form->textField($model,'source',array('size'=>10,'maxlength'=>10)); ?>
        <?php echo $form->error($model,'source'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model,'decription'); ?>
        <?php echo $form->textArea($model,'decription',array('size'=>60,'maxlength'=>100,'style'=>'width:300px;height:50px;resize:none;')); ?>
        <?php echo $form->error($model,'decription'); ?>
    </div>
    <div>
    <div class="row">
    <div id="divFileProgressContainer"></div>
    <div class="swfupload" style="width:150px;hegiht:30px;background:#ddd;"><button id="swfupload"></button></div>
    </div>
</div>

    <div class="row">
        <?php echo $form->labelEx($model,'tag'); ?>
        <?php echo $form->textField($model,'tag',array('size'=>20,'maxlength'=>20)); ?>
        <?php echo $form->error($model,'tag'); ?>
    </div>
	<div class="row">
        <b>内容</b><br/>
    <?php
    $data=new NewsType;
    $this->widget('ext.ueditor.UEditor',
            array(
                'id'=>'editor',
                'model'=>$data,
                'attribute'=>'typeName',
                'UEDITOR_CONFIG'=>array(
                    'UEDITOR_HOME_URL'=>Yii::app()->baseUrl.'/ueditor/',
                    'initialContent'=>'',
                    'imageUrl'=>Yii::app()->baseUrl.'/ueditor/php/imageUp.php',
                    'imagePath'=>Yii::app()->baseUrl.'/ueditor/php/',
                    'emotionLocalization'=>true,
                    'pageBreakTag'=>'[page]',
                    
                    'toolbars'=>array(
                        array(
                       'fullscreen', 'source', '|', 'undo', 'redo', '|',
                    'bold', 'italic',   'superscript', 'subscript', 'removeformat', 'formatmatch','autotypeset', '|',
                    'blockquote', '|', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist','selectall', 'cleardoc', '|', 'customstyle',
                    'paragraph', '|','rowspacingtop', 'rowspacingbottom','lineheight', '|','fontfamily', 'fontsize', '|',
                    '|', '', 'indent', '|',
                    'justifyleft', 'justifycenter',  '|',
                    'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright','pagebreak',
                    'imagecenter', '|', 'insertimage', 'emotion', 'insertvideo', 'attachment',  'gmap', 'insertframe','highlightcode','|',
                    'preview', 'searchreplace','wordimage',
                        ),
                    ),
                                'labelMap'=>array(
                'anchor'=>'锚点', 'undo'=>'撤销', 'redo'=>'重做', 'bold'=>'加粗', 'indent'=>'首行缩进','snapscreen'=> '截图',
                'italic'=>'斜体', 'underline'=>'下划线', 'strikethrough'=>'删除线',
                'superscript'=>'上标', 'formatmatch'=>'格式刷', 'source'=>'源代码', 'blockquote'=>'引用',
                'pasteplain'=>'纯文本粘贴模式', 'selectall'=>'全选', 'print'=>'打印', 'preview'=>'预览',
                'horizontal'=>'分隔线', 'removeformat'=>'清除格式',
                'unlink'=>'取消链接', 'insertrow'=>'前插入行', 'insertcol'=>'前插入列', 
           
                'fontfamily'=>'字体', 'fontsize'=>'字号', 'paragraph'=>'段落格式', 'insertimage'=>'图片', 'inserttable'=>'表格', 'link'=>'超链接',
                'emotion'=>'表情', 'searchreplace'=>'查询替换','gmap'=>'Google地图',
                'insertvideo'=>'视频',  'justifyleft'=>'居左对齐', 'justifyright'=>'居右对齐', 'justifycenter'=>'居中对齐',
                'justifyjustify'=>'两端对齐', 'forecolor'=>'字体颜色', 'backcolor'=>'背景色', 'insertorderedlist'=>'有序列表',
                'insertunorderedlist'=>'无序列表', 'fullscreen'=>'全屏', 'directionalityltr'=>'从左向右输入',
                 'pagebreak'=>'分页', 'insertframe'=>'插入Iframe', 'imagenone'=>'默认',
                'imageleft'=>'左浮动', 'imageright'=>'右浮动','attachment'=>'附件', 'imagecenter'=>'居中', 'wordimage'=>'图片转存',
                'lineheight'=>'行间距', 'customstyle'=>'自定义标题','autotypeset'=> '自动排版',
            ), 
                    
                ),
 
            ));
?>
</div>



	<div class="row">
		<?php echo $form->labelEx($model,'type_id'); ?>
		<?php echo $form->dropDownList($model,'type_id',NewsType::model()->getTypeList(0)); ?>

		<?php echo $form->error($model,'type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->checkBox($model,'recomendation'); ?> 推荐
		<?php echo $form->checkBOx($model,'home_top'); ?> 首页置顶
		<?php echo $form->checkBox($model,'home_cate'); ?>首页栏目
		<?php echo $form->checkBOx($model,'children_top'); ?>栏目页置顶

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
        'upload_url'=>'http://localhost/show/index.php?r=Admin/news/upload', //Use $this->createUrl method or define yourself
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
        'custom_settings'=>array('upload_target'=>'divFileProgressContainer'),
        'button_placeholder_id'=>'swfupload',
        'button_width'=>170,
        'button_height'=>30,
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
 
<?php echo CHtml::beginForm(array("")); ?>

<?php echo CHtml::endForm(); ?>




