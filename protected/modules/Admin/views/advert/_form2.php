<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'action'=>'/show/index.php?r=Admin/advert/create_img&aid=1'),
)); ?>

    <div class="row">
    	<input type="hidden"  name="aid" value="<?php echo $_GET['aid'];?>"/>
      <div id="divFileProgressContainer"></div>
  <label>缩略图上传(<span class='limit'>限一张</span>)</label>
    <div class="swfupload" id="bswf"style=""><button id="swfupload"></button></div>
    </div>
    <div id="smallImg"> 
    </div>
        <div class="row buttons">
      <input  type="submit" class="l" value="上传"  />
    </div>
</div>


  <?php $this->endWidget(); ?>
  <img  class="loading" src="/show/images/loading.gif" style="display:none;text-align:center;margin-left:431px;" />
<iframe src="" style='display:none;width:100%;height:100%;border:none;'></iframe>
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
        'file_upload_limit'=>6,
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
 <script type="text/javascript">
$(function(){

	$("input[type=submit]").click(function(){

			var data=$("form").serialize();
			$.ajax({
				url:'http://localhost/show/index.php?r=Admin/advert/createImg',
				data:data,
				type:'post',
				success:function(data){
					if(data)
					{
						
						$(".form").fadeOut(1000);
						$(".loading").fadeIn();	
						$("iframe").attr("src","http://localhost/show/index.php?r=Admin/advert/showImg&aid="+data);
						$(".loading").hide();
						$("iframe").fadeIn(1100);
					}else{

						alert(data);
					}
				}

				});
			// $.post(
			// 		'http://localhost/show/index.php?r=Admin/advert/createImg',
			// 		{data:data},
			// 		function(data)
			// 		{
			// 			if(data==1){

			// 				alert("添加成功");
			// 			}else{
			// 				alert(data);
			// 			}


			// 		}
			// 	);
	return false;
	})

})
 </script>


