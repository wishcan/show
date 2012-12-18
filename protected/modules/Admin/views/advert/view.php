<?php
$this->breadcrumbs=array(
	'Adverts'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Advert', 'url'=>array('index')),
	array('label'=>'Create Advert', 'url'=>array('create')),
	array('label'=>'Update Advert', 'url'=>array('update', 'id'=>$model->aid)),
	array('label'=>'Delete Advert', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->aid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Advert', 'url'=>array('admin')),
);
?>

<h1>View Advert #<?php echo $model->aid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'aid',
		'cid',
		'title',
	),
)); ?>
