<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>栏目管理</h1>


<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button alink')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?> 
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'cname',
		array('name'=>'pid','value'=>'Category::model()->getCateName($data->pid)'),
		array(
			'class'=>'CButtonColumn',
			'header'=>'操作',
		    'viewButtonImageUrl'=>false,
             'updateButtonImageUrl'=>false,
             'deleteButtonImageUrl'=>false,
             'createButtonLabel'=>'添加子栏目',
             'headerHtmlOptions'=>array(
             		'style'=>'width:200px;'

             	),
             'htmlOptions'=>array(
             		'style'=>'padding:5px;',
             		'class'=>'inputFocus',

             	)
		),
	),
)); ?>
