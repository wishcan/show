<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Create',
);
 
$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Manage Category', 'url'=>array('admin')),
);
?>



<div class="content" style='margin-left:0px;'>
        
        <div class="header">
            
            <h1 class="page-title">添加栏目</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">后台</a> <span class="divider">/</span></li>
            <li class="active">栏目</li>
        </ul>
<div class="c"></div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>