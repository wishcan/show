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

<div id="form_content">
<link rel="stylesheet" type="text/css" href="<?php Yii::app()->baseUrl.'css/default.css' ?>">
<h3 class="top_l"><span id="title">添加分类</span><i class="top_r"></i></h3>
<div class="c"></div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>