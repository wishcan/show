<?php
$this->breadcrumbs=array(
	'Adverts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Advert', 'url'=>array('index')),
	array('label'=>'Create Advert', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('advert-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div id="form_content">
<div class="content" style='margin-left:0px;'>
        
        <div class="header">
            
            <h1 class="page-title">广告位管理</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">后台</a> <span class="divider">/</span></li>
            <li class="active">广告位</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <a href='<?php echo $this->createAbsoluteUrl('advert/create');?>'><button class="btn btn-primary"><i class="icon-plus"></i>添加广告位</button></a>  
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
	'id'=>'advert-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,

	'columns'=>array(
		'aid',
		array(
			'name'=>'cid',
			'value'=>'Category::model()->getCateName($data->cid)',

			),
		'title',
		array(
			'class'=>'CButtonColumn',
			'header'=>'操作',
			'createButtonLabel'=>'添加广告',
			'createButtonUrl'=>'Yii::app()->createAbsoluteUrl("Admin/advert/create",array("aid"=>$data->aid))',
		),
	),
)); ?>
