<?php
$this->breadcrumbs=array(
	'Gallery Categories'=>array('index'),
	$model->cateid,
);

?>

<h1>View GalleryCategory #<?php echo $model->cateid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cateid',
		'cname',
	),
));
?>
