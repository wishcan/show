<?php
$this->breadcrumbs=array(
	'图片信息'=>array('index'),
	'管理',
);
?>
<a href='<?php echo Yii::app()->createAbsoluteurl('Admin/galleryCategory/create',array('pid'=>$_GET["pid"]));?>' class='btn' />
创建分类
</a>
<a href='<?php echo Yii::app()->createAbsoluteurl('Admin/gallery/create');?>' class='btn'/>
上传图片
</a>
<<<<<<< HEAD
<table>
<?php

	echo "<pre>";
	foreach($model as $v){
		echo '<tr><td><a href="'.Yii::app()->createUrl('Admin/gallery/create',array('cid'=>$v->cateid)).'>'.$v->cname.'</a></td></tr>';

	}
?>

</table>
=======
<?php

if(empty($model)){
	echo  '暂无图册，请添加';
}else{
	foreach ($model as $v) {
		echo CHtml::link($v->cname,array("gallery/create",'cid'=>$v->cateid),array('class'=>'btn')) ;
	}
}

?>
>>>>>>> master
