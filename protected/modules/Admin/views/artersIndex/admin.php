<?php
$this->breadcrumbs=array(
	'Arters Indexes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ArtersIndex', 'url'=>array('index')),
	array('label'=>'Create ArtersIndex', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('arters-index-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div id="form_content">
<link rel="stylesheet" type="text/css" href="<?php Yii::app()->baseUrl.'css/default.css' ?>">
<h3 class="top_l"><span id="title">艺术家指数管理</span><i class="top_r"></i></h3>
<div class="c"></div>


<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button form_link')); ?>
<?php echo CHtml::link('新建指数',array('create'),array('class'=>'form_link')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'arters-index-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'iid',
		'aid',
		'createTime',
		'index',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
