<?php
$this->breadcrumbs=array(
	'Opuses',
);

$this->menu=array(
	array('label'=>'Create Opus', 'url'=>array('create')),
	array('label'=>'Manage Opus', 'url'=>array('admin')),
);
?>

<h1>Opuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
