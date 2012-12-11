<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Role', 'url'=>array('index')),
	array('label'=>'Create Role', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('role-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $url=Yii::app()->request->baseUrl;?>
<script src="<?php echo $url?>/js/form.js" type="text/javascript" charset="utf-8" async defer></script>
<div id="form_content">
<h3 class="top_l"><span id="title">角色管理</span><i class="top_r"></i></h3>
<div class="c"></div>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<?php echo CHtml::link('角色添加',array('role/create'),array('style'=>'font-weight:bold;margin-left:5px;'))?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'role-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'rid',
		'rname',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
