<?php
$this->breadcrumbs=array(
	'Arters',
);

$this->menu=array(
	array('label'=>'Create Arters', 'url'=>array('create')),
	array('label'=>'Manage Arters', 'url'=>array('admin')),
);
?>

<h1>Arters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
