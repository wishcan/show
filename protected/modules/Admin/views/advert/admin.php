<?php
$this->breadcrumbs=array(
	'Adverts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Advert', 'url'=>array('index')),
	array('label'=>'Create Advert', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('advert-grid', {
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
<h3 class="top_l"><span id="title">广告位管理</span><i class="top_r"></i></h3>
<div class="c"></div>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button form_link')); ?>
<?php echo CHtml::link('广告位添加',array('advert/create'),array('class'=>'form_link')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'advert-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,

	'columns'=>array(
		'aid',
		array(
			'name'=>'cid',
			'value'=>'Category::model()->getCateName($data->cid)',

			),
		'title',
		array(
			'class'=>'CButtonColumn',
			'header'=>'操作',
			'createButtonLabel'=>'添加广告',
			'createButtonUrl'=>'Yii::app()->createAbsoluteUrl("Admin/advert/create",array("aid"=>$data->aid))',
		),
	),
)); ?>
