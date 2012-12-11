<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Role', 'url'=>array('index')),
	array('label'=>'Manage Role', 'url'=>array('admin')),
);
?>

<?php $url=Yii::app()->request->baseUrl;?>
<script src="<?php echo $url?>/js/form.js" type="text/javascript" charset="utf-8" async defer></script>
<div id="form_content">
<h3 class="top_l"><span id="title">角色添加</span><i class="top_r"></i></h3>
<div class="c"></div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>