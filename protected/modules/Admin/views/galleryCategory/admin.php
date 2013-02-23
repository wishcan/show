<?php
$this->breadcrumbs=array(
	'图片信息'=>array('index'),
	'管理',
);
?>
<?php echo CHtml::link("创建分类",array("galleryCategory/create",'pid'=>$_GET["pid"]),array('class'=>'btn')) ;?>
<?php echo CHtml::link("上传图片",array("gallery/create",'cid'=>$_GET['pid']),array('class'=>'btn')) ;?>

<hr />
<div class='tuc'>
<h3>上传</h3>

<?php

if(empty($model)){
	echo (  '暂无图册，请添加');
}else{
	foreach ($model as $v) {
		echo CHtml::link("上传至".$v->cname,array("gallery/create",'cid'=>$v->cateid),array('class'=>'btn')) ;
	}
}


?>
<hr />
<div class='tuc'>
<h3>查看图册</h3>
<hr />
<?php

		foreach ($model as $v) {
		echo CHtml::link("查看".$v->cname,array("gallery/view",'id'=>$v->cateid),array('class'=>'btn')) ;
	}

?>
</div>
<hr />
<div class='tuc'>
<h3>删除图册</h3>

<?php
foreach ($model as $v) {
		//echo CHtml::link("删除".$v->cname,array("galleryCategory/delete",'id'=>$v->cateid),array('class'=>'btn'));
		echo "<button cid={$v->cateid} class='btn'>删除{$v->cname}</button>" ;
	}
?>
</div>

<script type="text/javascript">

		$("button").live("click",function()
		{
			if(!confirm("确定删除吗？")) return;
			var cid=$(this).attr('cid');
			$.post(
				'<?php echo Yii::app()->createAbsoluteurl("Admin/galleryCategory/delete")?>',
				{id:cid},
				function (data)
				{	
					switch(data)
					{
						case "1":
						location.reload();
						break;
						case "2":
						alert("操作失败请重试");
						break;
						default:
						alert(data)
						break;
					}
				}
				)


		})

</script>



