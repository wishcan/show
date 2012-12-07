<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<link rel="stylesheet" href="http://blueimp.github.com/cdn/css/bootstrap.min.css">
<!-- Generic page styles -->

<!-- The Templates plugin is included to render the upload/download listings -->

<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/style.css">
<!-- Bootstrap styles for responsive website layout, supporting different screen sizes -->
<!-- <link rel="stylesheet" href="http://blueimp.github.com/cdn/css/bootstrap-responsive.min.css"> -->
<!-- Bootstrap CSS fixes for IE6 -->
<!--[if lt IE 7]><link rel="stylesheet" href="http://blueimp.github.com/cdn/css/bootstrap-ie6.min.css"><![endif]-->
<!-- Bootstrap Image Gallery styles -->
<!-- <link rel="stylesheet" href="http://blueimp.github.com/Bootstrap-Image-Gallery/css/bootstrap-image-gallery.min.css"> -->
<?php	$url=Yii::app()->request->baseUrl;?>
<link href="<?php echo $url;?>/css/static.css" rel="stylesheet" tpye="text/css"/>
<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
<!-- <script src="http://blueimp.github.com/JavaScript-Templates/tmpl.min.js"></script> -->
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<!-- <script src="http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js"></script> -->
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<!-- <script src="http://blueimp.github.com/JavaScript-Canvas-to-Blob/canvas-to-blob.min.js"></script> -->
<!-- Bootstrap JS and Bootstrap Image Gallery are not required, but included for the demo -->
<!-- <script src="http://blueimp.github.com/cdn/js/bootstrap.min.js"></script>
<script src="http://blueimp.github.com/Bootstrap-Image-Gallery/js/bootstrap-image-gallery.min.js"></script> -->

<link href="<?php echo $url;?>/css/form.css" rel="stylesheet" type="text/css" />

<?php echo $content;?>

