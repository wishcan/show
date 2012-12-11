<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Create News', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('news-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $url=Yii::app()->request->baseUrl;?>
<script src="<?php echo $url?>/js/form.js" type="text/javascript" charset="utf-8" async defer></script>
<div id="form_content">
<h3 class="top_l"><span id="title">文章管理</span><i class="top_r"></i></h3>
<div class="c"></div>
<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">


<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'id',
			'headerHtmlOptions'=>array(
				'width'=>'10px',)	

			),
		array(
			'name'=>'title',
			'type'=>'raw',
			'value'=>'CHtml::link($data->title,array("news/view",\'id\'=>$data->id),array("target"=>"_blank"))',

			),
		'decription',
		'createTime',
		'source',
		array(
			'name'=>'click',
			'headerHtmlOptions'=>array(
				'width'=>'20px',
				),
			),
		'recomendation',
		'tag',
		'updateTime',
		'type_id',
		'home_cate',
		'home_top',
		'children_top',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
