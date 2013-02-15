<?php
$this->breadcrumbs=array(
	'Gallery Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GalleryCategory', 'url'=>array('index')),
	array('label'=>'Manage GalleryCategory', 'url'=>array('admin')),
);
?>

<h1>Create GalleryCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>