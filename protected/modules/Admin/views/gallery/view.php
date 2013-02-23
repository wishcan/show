<?php
$this->breadcrumbs=array(

	'图片编辑',

);


?>

<style type="text/css">

</style>
<div class='edit'>
<script type='type/javascript'> 

</script>
<div id='gallery_view'>

<?php 
if(empty($data))
{

 echo CHtml::link("暂无图片请添加",array('gallery/create','cid'=>$_GET['id']),array('class'=>'btn'));;

}
foreach ($data as $v):?>
<ul class='c'>

		<li class='dv <?php if($v["covert"]==1) echo "covert"; ?>' >
				<img class='thumb' cid='<?php echo $v['cid'];?>' title="点击图片设为封面" src='<?php  echo MYS::getDir($v['thumb']).'small/'.$v['thumb']?>'/>
			<input type='hidden' value='<?php echo $v['thumb']?>' class='th' />
			<input type='hidden' value='<?php echo $v['gdid']?>' class='pk' />
		</li>
		<li class='text'>
			<span>描述</span>：
						<input type='text' name='Gallery["desc"]' class='desc' value='<?php echo $v['description']?>'/>
		</li>
		<li class='text'>
						<span class='btn ok'>添加备注</span>
						<span class='del btn'>删除图片</span>
		</li>
	</ul>

<?php endforeach;?>
</div>
<script type="text/javascript">
$(function()
{
	var l=$('#gallery_view img').length;
	var i=0;

	window.onload=function(){

		for(i;i<l;i++)
		{

			var iH=$('#gallery_view .dv').eq(i).find("img").height();
			var T=($('#gallery_view .dv').eq(i).height()-iH)/2;
			$('#gallery_view .dv').eq(i).find("img").css('top',T);
		}

	}	
})
	$(".thumb").live('click',function(){
		var data = getData($(this));
		th=$(this);
		$.post(
			'<?php echo Yii::app()->createUrl("Admin/gallery/changeThumb")?>',
			{cid:data['cid'],gdid:data['gdid']},
			function(data){

				switch(data)
				{
					case "0":

						alert('服务器暂忙，请稍后再试试');

					break;
					case "1":

					alert("设置成功");

					$('.covert').removeClass('covert');
					$(th).parent().addClass('covert');
					break;
					case "2":

					alert("数据库写入出错，请检查或联系技术人员410345759@qq.com")

					break;
					case "3":

					alert("这已经是此图册的封面了,请选择其它的图片吧!");

					break;
					case "4":
					alert("非法操作，请重试");
					break;
					default:
					alert(data);
					break;


				}
					
			}


			);

	})

$(".ok").live("click",function(){

	var data=getData($(this));

	$.post(
		'<?php echo Yii::app()->createUrl("Admin/gallery/addDesc")?>',
		{gdid:data['gdid'],desc:data['desc']},
		function(data)
		{
			switch(data)
			{
				case "1":
					alert("编辑成功");
				break;

				case "2":
					alert("数据库写入出错，请检查或联系技术人员410345759@qq.com");
				break;

				case "4":
				alert("数据不能为空");
				break;
			}
		}

		);
})

$(".del").live("click",function()
{
	var data=getData($(this));
	th=$(this);
	$.post(
		'<?php echo Yii::app()->createUrl("Admin/gallery/del")?>',
		{gdid:data['gdid'],desc:data['thumb']},
		function(data)
		{
			switch(data)
			{
				case "1":
					alert("删除成功");
					th.parent().parent().remove();
				break;

				case "2":
					alert("数据库操作出错，请检查或联系技术人员410345759@qq.com");
				break;

				case "3":

				alert("请重试");

				break;
			}
		}

		);
})



/*获得说对应的数据
 *cid  图册ID
 *THUMB  图片地址
 * DESC 备注	
*/
function getData(element)
{
	var data=new Array();
	data['cid']=$(element).parent().parent().find("img").attr('cid');
	data['thumb']=$(element).parent().parent().find(".th").val();
	data['desc']=$(element).parent().parent().find(".desc").val();
	data['gdid']=$(element).parent().parent().find(".pk").val();
	return data;
}
</script>