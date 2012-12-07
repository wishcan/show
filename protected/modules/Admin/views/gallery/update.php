<?php
$this->breadcrumbs=array(
	'Galleries'=>array('index'),
	$model->title=>array('view','id'=>$model->gid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gallery', 'url'=>array('index')),
	array('label'=>'Create Gallery', 'url'=>array('create')),
	array('label'=>'View Gallery', 'url'=>array('view', 'id'=>$model->gid)),
	array('label'=>'Manage Gallery', 'url'=>array('admin')),
);
?>

<h1>Update Gallery <?php echo $model->gid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>