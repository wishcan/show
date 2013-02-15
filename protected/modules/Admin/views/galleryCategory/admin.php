<?php
$this->breadcrumbs=array(
	'图片信息'=>array('index'),
	'管理',
);
?>
<a href='<?php echo Yii::app()->createAbsoluteurl('Admin/galleryCategory/create');?>' class='btn' />
创建分类
</a>
<a href='<?php echo Yii::app()->createAbsoluteurl('Admin/gallery/create');?>' class='btn' />
上传图片
</a>