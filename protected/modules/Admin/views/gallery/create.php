<?php
$this->breadcrumbs=array(
	'Galleries'=>array('index'),
	'Create',
);

?>

<?php $url=Yii::app()->request->baseUrl;?>

<script src="<?php echo $url?>/js/form.js" type="text/javascript" charset="utf-8" async defer></script>
<link rel="stylesheet" type="text/css" href="<?php Yii::app()->baseUrl.'css/default.css' ?>">
<div id="form_content">
<h3 class="top_l"><span id="title">预览添加</span><i class="top_r"></i></h3>
<div class="c"></div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>