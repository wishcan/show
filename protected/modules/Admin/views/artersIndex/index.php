<?php
$this->breadcrumbs=array(
	'Arters Indexes',
);

$this->menu=array(
	array('label'=>'Create ArtersIndex', 'url'=>array('create')),
	array('label'=>'Manage ArtersIndex', 'url'=>array('admin')),
);
?>

<h1>Arters Indexes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
