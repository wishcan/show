<?php
$this->breadcrumbs=array(
	'Adverts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Advert', 'url'=>array('index')),
	array('label'=>'Manage Advert', 'url'=>array('admin')),
);
?>

<?php 
$url=Yii::app()->request->baseUrl;?>
<script src="<?php echo $url?>/js/form.js" type="text/javascript" charset="utf-8" async defer></script>
<div id="form_content">
<link rel="stylesheet" type="text/css" href="<?php Yii::app()->baseUrl.'css/default.css' ?>">
<h3 class="top_l"><span id="title">

		<?php 
		if(empty($_GET['aid'])){
				echo	'广告位添加';
			}else{
				echo '上传广告图片';
			}
	?></span<i class="top_r"></i></h3>
<div class="c"></div>


<?php if(empty($_GET['aid'])){
	 echo $this->renderPartial('_form', array('model'=>$model)); 
	}else{
		echo $this->renderPartial('_form2');

	}	
	
?>