<?php
$this->breadcrumbs=array(
	'Gallery Categories'=>array('index'),
	$model->cateid,
);

$this->menu=array(
	array('label'=>'List GalleryCategory', 'url'=>array('index')),
	array('label'=>'Create GalleryCategory', 'url'=>array('create')),
	array('label'=>'Update GalleryCategory', 'url'=>array('update', 'id'=>$model->cateid)),
	array('label'=>'Delete GalleryCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cateid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GalleryCategory', 'url'=>array('admin')),
);
?>

<h1>View GalleryCategory #<?php echo $model->cateid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cateid',
		'cname',
	),
)); ?>
