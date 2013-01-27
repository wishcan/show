<?php
$this->breadcrumbs=array(
	'Opuses'=>array('index'),
	$model->oid=>array('view','id'=>$model->oid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Opus', 'url'=>array('index')),
	array('label'=>'Create Opus', 'url'=>array('create')),
	array('label'=>'View Opus', 'url'=>array('view', 'id'=>$model->oid)),
	array('label'=>'Manage Opus', 'url'=>array('admin')),
);
?>

<h1>Update Opus <?php echo $model->oid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>