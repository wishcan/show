<?php
$this->breadcrumbs=array(

	'图片编辑',

);


?>

<style type="text/css">
*{
	magin:0px;
	padding:0px;

}
.edit{
	padding-left:20px;

}
li{
	list-style: none;
}
	.del{
		color:red;
	}
	.desc{
		margin-top:10px;
	}
   
	.thumb{
		max-width:200px;
		max-height: 200px;
		cursor:pointer;
	}
	.dv{
		width:200px;
		height:200px;
		background-color: #DDD;
		text-align: center;
		line-height: 2em;
	}
	li{
		margin-bottom:10px;

	}
</style>
<div class='edit'>

<table>
<?php 
foreach ($data as $v):?>
<tr>
	
		<td class='dv'>
			<img class='thumb' cid='<?php echo $v['cid'];?>' title="点击图片设为封面" src='<?php  echo MYS::getDir($v['thumb']).'small'.$v['thumb']?>'   />
			<input type='hidden' value='<?php echo $v['thumb']?>' class='th' />
			<input type='hidden' value='<?php echo $v['gdid']?>' class='pk' />
		</td>
		<div>
		<td>描述</span>：
						<input type='text' name='Gallery["desc"]' class='desc' />
						<span class='btn ok'>添加备注</span>
			</td>
		<td>		
						<span class='del btn'>删除图片</span>
		</td>
	</tr>

<?php endforeach;?>
</table>
<script type="text/javascript">

	$(".thumb").live('click',function(){
		var data = getData($(this));
		$.post(
			'<?php echo Yii::app()->createUrl("Admin/galleryCategory/addThumb")?>',
			{cid:data['cid'],thumb:data['thumb']},
			function(data){

				switch(data)
				{
					case "0":

						alert('服务器暂忙，请稍后再试试');

					break;
					case "1":

					alert("设置成功");

					break;
					case "2":

					alert("数据库写入出错，请检查或联系技术人员410345759@qq.com")

					break;
					case "3":

					alert("这已经是此图册的封面了,请选择其它的图片吧!");

					break;


				}
					
			}


			);

	})

$(".ok").live("click",function(){

	var data=getData($(this));

	$.post(
		'<?php echo Yii::app()->createUrl("Admin/galleryCategory/addDesc")?>',
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

				case "3":
				alert("请重试");

				break;
			}
		}

		);
})

$(".del").live("click",function()
{
	var data=getData($(this));
	th=$(this)
	$.post(
		'<?php echo Yii::app()->createUrl("Admin/galleryCategory/del")?>',
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