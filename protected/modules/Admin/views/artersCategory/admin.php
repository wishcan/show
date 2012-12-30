<?php
$this->breadcrumbs=array(
	'Arters Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ArtersCategory', 'url'=>array('index')),
	array('label'=>'Create ArtersCategory', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('arters-category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php $url=Yii::app()->request->baseUrl;?>
<script src="<?php echo $url?>/js/form.js" type="text/javascript" charset="utf-8" async defer></script>
<div id="form_content">
<h3 class="top_l"><span id="title">艺术家分类管理</span><i class="top_r"></i></h3>
<div class="c"></div>
<?php	
			 echo CHtml::link('高级搜索','#',array('class'=>'search-button form_link')); 
			 echo CHtml::link('添加分类',array('artersCategory/create'),array('target'=>'con','class'=>'form_link'));

?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'arters-category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'cateid',

		array('name'=>'cname'),
		array(
			'class'=>'CButtonColumn',
				'createButtonImageUrl'=>Yii::app()->baseUrl.'/images/create.png',

		),
	),
)); ?>
