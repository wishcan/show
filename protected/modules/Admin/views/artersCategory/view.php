<?php
$this->breadcrumbs=array(
	'Arters Categories'=>array('index'),
	$model->cateid,
);

$this->menu=array(
	array('label'=>'List ArtersCategory', 'url'=>array('index')),
	array('label'=>'Create ArtersCategory', 'url'=>array('create')),
	array('label'=>'Update ArtersCategory', 'url'=>array('update', 'id'=>$model->cateid)),
	array('label'=>'Delete ArtersCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cateid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ArtersCategory', 'url'=>array('admin')),
);
?>

<h1>View ArtersCategory #<?php echo $model->cateid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cateid',
		'cname',
	),
)); ?>
