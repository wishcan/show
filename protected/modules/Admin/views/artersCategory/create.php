<?php
$this->breadcrumbs=array(
	'Arters Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ArtersCategory', 'url'=>array('index')),
	array('label'=>'Manage ArtersCategory', 'url'=>array('admin')),
);
?>
<div class="content" style='margin-left:0px;'>
        
        <div class="header">
            
            <h1 class="page-title">添加艺术家分类</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">后台</a> <span class="divider">/</span></li>
            <li class="active">艺术家分类</li>
        </ul>
<div class="c"></div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>