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
<div id="form_content">
<div class="content" style='margin-left:0px;'>
        
        <div class="header">
            
            <h1 class="page-title">艺术家分类管理</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">后台</a> <span class="divider">/</span></li>
            <li class="active">艺术家分类</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <a href='<?php echo $this->createAbsoluteUrl('artersCategory/create');?>'><button class="btn btn-primary"><i class="icon-plus"></i>添加分类</button></a>
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
	'id'=>'arters-category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'cateid',

		array('name'=>'cname'),
		array(
			'class'=>'CButtonColumn',
				'createButtonImageUrl'=>Yii::app()->baseUrl.'/images/create.png',

				'createButtonLabel'=>'添加成员',
				'createButtonUrl'=>'Yii::app()->createUrl("Admin/arters/create",array("cateid"=>$data->cateid))',


		),
	),
)); ?>
