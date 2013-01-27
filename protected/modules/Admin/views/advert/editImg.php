<script src="<?php echo Yii::app()->baseUrl?>/js/form.js" type="text/javascript" charset="utf-8" async defer></script>

<link rel="stylesheet" type="text/css" href="<?php Yii::app()->baseUrl.'css/default.css' ?>">

<?php
foreach($row as $v):

?>

<form id="form<?php echo $v['adid'];?>" action='' class="editIMg">
	<img src='<?php echo $v["thumb"]?>' width="100" height="100"	/>
	<span class="s1">添加链接（URL）</span>
		<input type="hidden" value="<?php echo $v['adid']; ?>" name='adid' />
 		<input type='text'   name='link' value="<?php if(!empty($v['link']))  echo $v['link']?>" />
	<span class="s1">标题(TITLE)</span>
		<input type='text' name='title'  value="<?php if(!empty($v['title']))  echo $v['title']?>"/>
	<a class="btn btn-success edit" href="javascript:void(0)" />
		<i class="icon-zoom-in icon icon-white" ></i>
			完成
	</a>
	<a class="btn btn-danger delete" href="javascript:void(0)" val="<?php echo $v['adid']?>" >
		<i class="icon-zoom-in icon icon-white"></i>
			删除
	</a>	
</form>



<?php endforeach;?>
<script type="text/javascript">
	$(function(){
		$(".delete").click(function(){
		var type=confirm("真的要删除吗?");
			if(type){
			var data=$(this).attr("val");	
			var th=$(this).parent();
			var src=$(th).find("img").attr("src");
			$.get(
				"<?php echo $this->createAbsoluteUrl('advert/deleteImg');?>",
				{"data":data,"src":src},
				function(data){

					if(data==1)
					{
						alert("删除成功");
						$(th).remove();
					}else{
						alert(data);
					}
				}
				);

		}
		})

		$(".edit").click(function(){
			var data=$(this).parent().serialize();
			$.post(
				"<?php echo $this->createAbsoluteUrl('advert/updateImg')?>",
				data,
				function(data){
					if(data==1)
					{
						alert("添加成功");
					}else{
						alert('添加失败');
					}
				}

				);

		})

	})



</script>
