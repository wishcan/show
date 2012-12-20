<?php
$this->breadcrumbs=array(
	'Arters Categories',
);

$this->menu=array(
	array('label'=>'Create ArtersCategory', 'url'=>array('create')),
	array('label'=>'Manage ArtersCategory', 'url'=>array('admin')),
);
?>

<h1>Arters Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
