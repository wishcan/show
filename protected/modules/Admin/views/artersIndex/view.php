<?php
$this->breadcrumbs=array(
	'Arters Indexes'=>array('index'),
	$model->iid,
);

$this->menu=array(
	array('label'=>'List ArtersIndex', 'url'=>array('index')),
	array('label'=>'Create ArtersIndex', 'url'=>array('create')),
	array('label'=>'Update ArtersIndex', 'url'=>array('update', 'id'=>$model->iid)),
	array('label'=>'Delete ArtersIndex', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->iid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ArtersIndex', 'url'=>array('admin')),
);
?>

<h1>View ArtersIndex #<?php echo $model->iid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'iid',
		'aid',
		'createTime',
		'index',
	),
)); ?>
