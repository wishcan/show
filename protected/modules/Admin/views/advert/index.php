<?php
$this->breadcrumbs=array(
	'Adverts',
);

$this->menu=array(
	array('label'=>'Create Advert', 'url'=>array('create')),
	array('label'=>'Manage Advert', 'url'=>array('admin')),
);
?>

<h1>Adverts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
