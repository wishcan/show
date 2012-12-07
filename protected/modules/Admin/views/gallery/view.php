<?php
$this->breadcrumbs=array(
	'Galleries'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Gallery', 'url'=>array('index')),
	array('label'=>'Create Gallery', 'url'=>array('create')),
	array('label'=>'Update Gallery', 'url'=>array('update', 'id'=>$model->gid)),
	array('label'=>'Delete Gallery', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->gid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Gallery', 'url'=>array('admin')),
);
?>

<h1>View Gallery #<?php echo $model->gid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'gid',
		'title',
		'description',
		'type_id',
		'recommendation',
		'tag',
		'createTime',
		'updateTime',
	),
)); ?>
