<?php
$this->breadcrumbs=array(
	'Arters Indexes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ArtersIndex', 'url'=>array('index')),
	array('label'=>'Manage ArtersIndex', 'url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>