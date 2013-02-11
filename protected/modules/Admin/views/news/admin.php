


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

<div id="form_content">
<div class="content" style='margin-left:0px;'>
        
        <div class="header">
            
            <h1 class="page-title">文章管理</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">后台</a> <span class="divider">/</span></li>
            <li class="active">文章</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <a href='<?php echo $this->createAbsoluteUrl('news/create',array("cid"=>$_GET['cid']));?>'><button class="btn btn-primary"><i class="icon-plus"></i>添加文章</button></a>
  
    <a href='<?php echo $this->createAbsoluteUrl('news/create',array('typeid'=>3));?>'><button class="btn btn-primary">草稿箱</button></a>
  	 <a href='<?php echo $this->createAbsoluteUrl('news/create',array('typeid'=>2));?>'><button class="btn btn-primary">待审核</button></a>
  	 <a href='<?php echo $this->createAbsoluteUrl('news/create',array('typeid'=>4));?>'><button class="btn btn-primary">回收站</button></a>
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
	'id'=>'news-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'id',
	//		'headerHtmlOptions'=>array(
	//			'width'=>'10px',)	

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
			// 'headerHtmlOptions'=>array(
			// 	'width'=>'20px',
			// 	),
			),
		'recomendation',
		'tag',
		'updateTime',
		array(
			'name'=>'type_id',
			'value'=>'NewsType::model()->getTypeName($data->type_id)',

			),
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
