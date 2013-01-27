<?php
$this->breadcrumbs=array(
	'Opuses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Opus', 'url'=>array('index')),
	array('label'=>'Create Opus', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('opus-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $url=Yii::app()->request->baseUrl;?>
<script src="<?php echo $url?>/js/form.js" type="text/javascript" charset="utf-8" async defer></script>
<div id="form_content">
<h3 class="top_l"><span id="title">出版作品管理</span><i class="top_r"></i></h3>
<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button form_link')); ?>
<?php echo CHtml::link('添加出版作品',array('opus/create'),array('class'=>'form_link')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'opus-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'oid',
		'thumb',
		'opuName',
		'creatTime',
		'pubName',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
