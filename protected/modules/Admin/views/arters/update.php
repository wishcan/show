<?php
$this->breadcrumbs=array(
	'Arters'=>array('index'),
	$model->name=>array('view','id'=>$model->aid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Arters', 'url'=>array('index')),
	array('label'=>'Create Arters', 'url'=>array('create')),
	array('label'=>'View Arters', 'url'=>array('view', 'id'=>$model->aid)),
	array('label'=>'Manage Arters', 'url'=>array('admin')),
);
?>

<h1>Update Arters <?php echo $model->aid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>