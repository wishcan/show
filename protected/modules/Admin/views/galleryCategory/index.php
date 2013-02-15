<?php
$this->breadcrumbs=array(
	'Gallery Categories',
);

$this->menu=array(
	array('label'=>'Create GalleryCategory', 'url'=>array('create')),
	array('label'=>'Manage GalleryCategory', 'url'=>array('admin')),
);
?>

<h1>Gallery Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
