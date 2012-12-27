<?php
$this->breadcrumbs=array(
	'Arters'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Arters', 'url'=>array('index')),
	array('label'=>'Create Arters', 'url'=>array('create')),
	array('label'=>'Update Arters', 'url'=>array('update', 'id'=>$model->aid)),
	array('label'=>'Delete Arters', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->aid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Arters', 'url'=>array('admin')),
);
?>

<h1>View Arters #<?php echo $model->aid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'aid',
		'name',
		'sex',
		'click',
		'description',
		'birthDay',
		'bl_arters_category_cateid',
		'tags',
		'district',
		'country',
	),
)); ?>
