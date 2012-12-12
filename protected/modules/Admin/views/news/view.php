<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Create News', 'url'=>array('create')),
	array('label'=>'Update News', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete News', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>

<h1> <?php echo $model->title; ?></h1>
<?php


?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cid',
		'title',
		'decription',
		'createTime',
		'source',
		'bl_user_id',
		'click',
		'recomendation',
		'tag',
		'updateTime',
		'type_id',
		'home_cate',
		'home_top',
		'children_top',
		'newsData.content',
		
	),
)); ?>
<?php if(!is_null($model->newsData)){?>

<img src="http://localhost/show/upload/1212/<?php echo $model->newsData->thumb;?>" /> 

<?php }?>