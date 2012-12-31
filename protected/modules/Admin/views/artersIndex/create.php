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

<<<<<<< HEAD
<h1>Create ArtersIndex</h1>
=======
>>>>>>> c6b36b97f3bc6b3fa7dcd61c57a20744c751554e

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>