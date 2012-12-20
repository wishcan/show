<?php
$this->breadcrumbs=array(
	'Arters Categories'=>array('index'),
	$model->cateid=>array('view','id'=>$model->cateid),
	'Update',
);

$this->menu=array(
	array('label'=>'List ArtersCategory', 'url'=>array('index')),
	array('label'=>'Create ArtersCategory', 'url'=>array('create')),
	array('label'=>'View ArtersCategory', 'url'=>array('view', 'id'=>$model->cateid)),
	array('label'=>'Manage ArtersCategory', 'url'=>array('admin')),
);
?>

<h1>Update ArtersCategory <?php echo $model->cateid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>