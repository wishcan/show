<?php
$this->breadcrumbs=array(
	'Galleries'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Gallery', 'url'=>array('index')),
	array('label'=>'Create Gallery', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('gallery-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php $url=Yii::app()->request->baseUrl;?>
<script src="<?php echo $url?>/js/form.js" type="text/javascript" charset="utf-8" async defer></script>
<div id="form_content">
<h3 class="top_l"><span id="title">预览管理</span><i class="top_r"></i></h3>
<div class="c"></div>
<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button form_link')); ?>
<?php
echo CHtml::link('草稿箱',array('gallery/admin','typeid'=>3),array('class'=>'form_link','value'=>3));

echo CHtml::link('未审核',array('gallery/admin','typeid'=>2),array('class'=>'form_link','value'=>2));

echo CHtml::link('回收站',array('gallery/admin','typeid'=>4),array('class'=>'form_link','value'=>4));
?>


<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gallery-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'gid',
			'headerHtmlOptions'=>array(
				'style'=>'width:30px;'
				),	
			),
		array(
			'name'=>'cid',
			'value'=>'Category::model()->getCateName($data->cid)',
			'headerHtmlOptions'=>array(
				'style'=>'width:40px;',
				),
			),
		array(

			'name'=>'title',
			'type'=>'raw',
			'value'=>'CHtml::link($data->title,array("gallery/view","id"=>$data->gid),array("target"=>"con"))',
			),
		'description',
		array(
			'name'=>'type_id',
			'value'=>'NewsType::model()->getTypeName($data->type_id)',
			'headerHtmlOptions'=>array(
				'style'=>'width:50px;',

				),
			),
		'tag',

		array(
			'name'=>'createTime',
			'htmlOptions'=>array(
				'style'=>'widh:160px;'

				),

			),
		array(
			'class'=>'CButtonColumn',
				'createButtonImageUrl'=>Yii::app()->baseUrl.'/images/create.png',
		),
	),
)); ?>
