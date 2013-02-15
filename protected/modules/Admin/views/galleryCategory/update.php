<?php
$this->breadcrumbs=array(
	'Gallery Categories'=>array('index'),
	$model->cateid=>array('view','id'=>$model->cateid),
	'Update',
);

$this->menu=array(
	array('label'=>'List GalleryCategory', 'url'=>array('index')),
	array('label'=>'Create GalleryCategory', 'url'=>array('create')),
	array('label'=>'View GalleryCategory', 'url'=>array('view', 'id'=>$model->cateid)),
	array('label'=>'Manage GalleryCategory', 'url'=>array('admin')),
);
?>

<h1>Update GalleryCategory <?php echo $model->cateid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>