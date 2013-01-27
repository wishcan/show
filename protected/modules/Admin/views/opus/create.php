<?php
$this->breadcrumbs=array(
	'Opuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Opus', 'url'=>array('index')),
	array('label'=>'Manage Opus', 'url'=>array('admin')),
);
?>
<?php $url=Yii::app()->request->baseUrl;?>
<script src="<?php echo $url?>/js/form.js" type="text/javascript" charset="utf-8" async defer></script>
<div id="form_content">
<h3 class="top_l"><span id="title">添加出版作品</span><i class="top_r"></i></h3>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>