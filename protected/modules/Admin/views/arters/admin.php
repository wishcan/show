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
<div class="content" style='margin-left:0px;'>
        
        <div class="header">
            
            <h1 class="page-title">艺术家信息管理</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">后台</a> <span class="divider">/</span></li>
            <li class="active">艺术家信息</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <a href='<?php echo $this->createAbsoluteUrl('arters/create');?>'><button class="btn btn-primary"><i class="icon-plus"></i>添加成员</button></a>
   	 <button class='search-button btn'>高级搜索</button>
   	<a href='<?php echo $this->createAbsoluteUrl('artersIndex/admin')?>'><button class='btn'>艺术家指数</button></a>
  <div class="btn-group">
  </div>
</div>
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
		array('name'=>'aid',
				'headerHtmlOptions'=>
				array('style'=>'width:40px;padding:0;'),
				'htmlOptions'=>
				array('style'=>'text-align:center'),
				),
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
		array(
				'name'=>'bl_arters_category_cateid',
			'value'=>'ArtersCategory::getCateName($data->bl_arters_category_cateid)',
				),
			'tags',
// 		'district',
		'country',
		
		array(
			'class'=>'CButtonColumn',
			'header'=>'操作',
				'createButtonLabel'=>'编辑',
			'createButtonImageUrl'=>Yii::app()->baseUrl.'/images/change.png',	 
			'createButtonUrl'=>'Yii::app()->createAbsoluteUrl("arters/index")',
			
		),
	),
)); ?>


