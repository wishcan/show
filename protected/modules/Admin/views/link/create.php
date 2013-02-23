<?php
$this->breadcrumbs=array(
	'Links'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Link', 'url'=>array('index')),
	array('label'=>'Manage Link', 'url'=>array('admin')),
);
?>
<div class="content" style='margin-left:0px;'>
        
        <div class="header">
            
            <h1 class="page-title">添加友情链接</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">后台</a> <span class="divider">/</span></li>
            <li class="active">友情链接</li>
        </ul>
<div class="c"></div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>