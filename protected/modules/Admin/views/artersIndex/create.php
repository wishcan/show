<?php
$this->breadcrumbs=array(
	'Arters Indexes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ArtersIndex', 'url'=>array('index')),
	array('label'=>'Manage ArtersIndex', 'url'=>array('admin')),
);
?>


<div class="content" style='margin-left:0px;'>
        
        <div class="header">
            
            <h1 class="page-title">添加艺术家指数</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">后台</a> <span class="divider">/</span></li>
            <li class="active">艺术家指数</li>
        </ul>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>