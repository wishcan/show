<?php
$this->breadcrumbs=array(
	'Arters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Arters', 'url'=>array('index')),
	array('label'=>'Create Arters', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('arters-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div id="form_content">
<link rel="stylesheet" type="text/css" href="<?php Yii::app()->baseUrl.'css/default.css' ?>">
<h3 class="top_l"><span id="title">艺术家信息管理</span><i class="top_r"></i></h3>
<div class="c"></div>

<?php 
		  echo CHtml::link('高级信息管理','#',array('class'=>'search-button form_link'));
		  echo CHtml::link('添加成员',array('arters/create'),array('class'=>'form_link','target'=>'con'));
		  echo CHtml::link('艺术家指数管理',array('arters/create'),array('class'=>'form_link','target'=>'con'));
?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'arters-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'aid','headerHtmlOptions'=>array('style'=>'width:40px;padding:0;')),
		array('name'=>'name',
				'headerHtmlOptions'=>
				array(
						'style'=>'width:60px;'),
				'htmlOptions'=>
				array(
						'style'=>'width:70px;'),
				),
		'sex',
		'click',
		'description',
		'birthDay',
		'bl_arters_category_cateid',
		'tags',
// 		'district',
		'country',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
