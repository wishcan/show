<?php
$this->breadcrumbs=array(
	'Arters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Arters', 'url'=>array('index')),
	array('label'=>'Manage Arters', 'url'=>array('admin')),
);
?>

<h1>Create Arters</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>