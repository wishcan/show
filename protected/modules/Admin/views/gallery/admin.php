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
<div id="form_content">
<div class="content" style='margin-left:0px;'>
        
        <div class="header">
            
            <h1 class="page-title">图片信息</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">后台</a> <span class="divider">/</span></li>
            <li class="active">图片信息</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <a href='<?php echo $this->createAbsoluteUrl('gallery/create');?>'><button class="btn btn-primary"><i class="icon-plus"></i>添加文章</button></a>
  
    <a href='<?php echo $this->createAbsoluteUrl('gallery/create',array('typeid'=>3));?>'><button class="btn btn-primary">草稿箱</button></a>
  	 <a href='<?php echo $this->createAbsoluteUrl('gallery/create',array('typeid'=>2));?>'><button class="btn btn-primary">待审核</button></a>
  	 <a href='<?php echo $this->createAbsoluteUrl('gallery/create',array('typeid'=>4));?>'><button class="btn btn-primary">回收站</button></a>
 	  <button class='search-button btn'>高级搜索</button>
  <div class="btn-group">
  </div>
</div>


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
