<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="c"></div>
<<<<<<< HEAD
<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button form_link')); ?>
<?php echo CHtml::link('添加用户',array("user/create"),array('class'=>'form_link','target'=>'con','style'=>'margin-left:5px;font-weight:bold;'))?>
=======
<div class="content" style='margin-left:0px;'>
        
        <div class="header">
            
            <h1 class="page-title">用户管理</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">后台</a> <span class="divider">/</span></li>
            <li class="active">用户</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <a href='<?php echo $this->createAbsoluteUrl('user/create');?>'><button class="btn btn-primary"><i class="icon-plus"></i>添加用户</button></a>
    <button class='search-button btn'>高级搜索</button>
  <div class="btn-group">
  </div>
</div>


>>>>>>> df5fb8b012f47d193deb10e0c4982163c2092bba
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'creatime',
		'sex',
		array(
				'name'=>'bl_role_rid',
				'value'=>'Role::getRoles($data->bl_role_rid)',	
				),
		array(
			'class'=>'CButtonColumn',
			'createButtonImageUrl'=>Yii::app()->baseUrl.'/images/create.png',
			
		),
	),
)); ?>
