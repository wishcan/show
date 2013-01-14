<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>


<div class="content" style='margin-left:0px;'>
        
        <div class="header">
            
            <h1 class="page-title">添加文章</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">后台</a> <span class="divider">/</span></li>
            <li class="active">文章</li>
        </ul>
        <div class='c'></div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
