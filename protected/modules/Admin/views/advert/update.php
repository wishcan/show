<?php
$this->breadcrumbs=array(
	'Adverts'=>array('index'),
	$model->title=>array('view','id'=>$model->aid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Advert', 'url'=>array('index')),
	array('label'=>'Create Advert', 'url'=>array('create')),
	array('label'=>'View Advert', 'url'=>array('view', 'id'=>$model->aid)),
	array('label'=>'Manage Advert', 'url'=>array('admin')),
);
?>

<h1>Update Advert <?php echo $model->aid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>