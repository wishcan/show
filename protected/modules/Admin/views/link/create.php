<?php
$this->breadcrumbs=array(
	'Links'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Link', 'url'=>array('index')),
	array('label'=>'Manage Link', 'url'=>array('admin')),
);
?>
<?php 
$url=Yii::app()->request->baseUrl;?>
<script src="<?php echo $url?>/js/form.js" type="text/javascript" charset="utf-8" async defer></script>
<div id="form_content">
<link rel="stylesheet" type="text/css" href="<?php Yii::app()->baseUrl.'css/default.css' ?>">
<h3 class="top_l"><span id="title">账号添加</span><i class="top_r"></i></h3>
<div class="c"></div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>