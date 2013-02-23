<?php
$this->breadcrumbs=array(
	'Links'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Link', 'url'=>array('index')),
	array('label'=>'Create Link', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('link-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div id="form_content">
<div class="content" style='margin-left:0px;'>
        
        <div class="header">
            
            <h1 class="page-title">友情链接</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">后台</a> <span class="divider">/</span></li>
            <li class="active">链接</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <a href='<?php echo $this->createAbsoluteUrl('link/create');?>'>
		<button class="btn btn-primary">
		<i class="icon-plus"></i>
		添加链接
		</button>
	</a>  

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'link-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'url',
		'name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
