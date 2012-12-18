<script src="<?php echo Yii::app()->baseUrl?>/js/form.js" type="text/javascript" charset="utf-8" async defer></script>

<div id="form_content">
<link rel="stylesheet" type="text/css" href="<?php Yii::app()->baseUrl.'css/default.css' ?>">
<form>
<span>原图</span><br/>
<img src="<?php echo $row['thumb'];?>" width="200" height="200"  style="margin-left:2em;"/>
<br/><br/>
<span>更改标题</span><input type="text" value="<?php echo $row['title']?>" name="title" /><br/><br/>
<input type="hidden" name="adid" value="<?php echo $row['adid']?>"/>
<span>更改链接</span><input type="text" value="<?php echo $row['link']?>" name="link" /><br/>
<input type="button" value="完成" class="button"/>
</form>
<script type="text/javascript">
	
$(function(){
	$(".button").click(function(){
	var data=$("form").serialize();
	$.post(
		"/show/index.php?r=Admin/advert/updateImg",
		data,
		function(data){

			if(data==1){
				alert("编辑成功，返回上一页");
				history.go(-1);
			}else{
				alert(data);
			}
		}


		);
})


})

</script>