<?php
$this->breadcrumbs=array(
	'Arters Indexes'=>array('index'),
	$model->iid=>array('view','id'=>$model->iid),
	'Update',
);

$this->menu=array(
	array('label'=>'List ArtersIndex', 'url'=>array('index')),
	array('label'=>'Create ArtersIndex', 'url'=>array('create')),
	array('label'=>'View ArtersIndex', 'url'=>array('view', 'id'=>$model->iid)),
	array('label'=>'Manage ArtersIndex', 'url'=>array('admin')),
);
?>

<h1>Update ArtersIndex <?php echo $model->iid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>