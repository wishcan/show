<?php
$this->breadcrumbs=array(
	'Links'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Link', 'url'=>array('index')),
	array('label'=>'Create Link', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('link-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php 
$url=Yii::app()->request->baseUrl;?>
<script src="<?php echo $url?>/js/form.js" type="text/javascript" charset="utf-8" async defer></script>
<div id="form_content">
<link rel="stylesheet" type="text/css" href="<?php Yii::app()->baseUrl.'css/default.css' ?>">
<h3 class="top_l"><span id="title">用户管理</span><i class="top_r"></i></h3>
<div class="c"></div>
<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button form_link')); ?>
<?php echo CHtml::link('添加链接',array("link/create"),array('class'=>'form_link','target'=>'con','style'=>'margin-left:5px;font-weight:bold;'))?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'link-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'url',
		'name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
