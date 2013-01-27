<?php
$this->breadcrumbs=array(
	'Opuses'=>array('index'),
	$model->oid,
);

$this->menu=array(
	array('label'=>'List Opus', 'url'=>array('index')),
	array('label'=>'Create Opus', 'url'=>array('create')),
	array('label'=>'Update Opus', 'url'=>array('update', 'id'=>$model->oid)),
	array('label'=>'Delete Opus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->oid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Opus', 'url'=>array('admin')),
);
?>

<h1>View Opus #<?php echo $model->oid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'oid',
		'thumb',
		'opuName',
		'creatTime',
		'pubName',
	),
)); ?>
