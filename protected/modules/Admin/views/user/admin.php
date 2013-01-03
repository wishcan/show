<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div id="form_content">
<link rel="stylesheet" type="text/css" href="<?php Yii::app()->baseUrl.'css/default.css' ?>">
<h3 class="top_l"><span id="title">用户管理</span><i class="top_r"></i></h3>
<div class="c"></div>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button form_link')); ?>
<?php echo CHtml::link('添加用户',array('user/create'),array('class'=>'form_link')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'password',
		'creatime',
		'sex',
		'bl_role_rid',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
