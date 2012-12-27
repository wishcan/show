


<?php

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
<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button form_link')); ?>
<?php
echo CHtml::link('草稿箱',array('news/admin','typeid'=>3),array('class'=>'form_link','value'=>3));

echo CHtml::link('未审核',array('news/admin','typeid'=>2),array('class'=>'form_link','value'=>2));

echo CHtml::link('回收站',array('news/admin','typeid'=>4),array('class'=>'form_link','value'=>4));
?>
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
		array(
			'name'=>'type_id',
			'value'=>'NewsType::model()->getTypeName($data->type_id)',

			),
// 		'home_cate',
// 		'home_top',
// 		array('name'=>'children_top',
// 				 'headerHtmlOptions'=>array(
// 				 		'style'=>'background:#dddd'
// 				 		),	
// 				),
		
		array(
			'class'=>'CButtonColumn',
			'header'=>'操作',
				'createButtonImageUrl'=>Yii::app()->baseUrl.'/images/create.png',
			'headerHtmlOptions'=>array(
					'style'=>'width:100px;'
					
					),
				'htmlOptions'=>array(
						'style'=>'width:100px;'
						
						),
		),
	),
)); ?>
