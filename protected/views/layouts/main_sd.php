
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta type='content' value='<?php echo  Yii::app()->params['about']['description'];?>'>
<meta type='keywords' value='<?php echo  Yii::app()->params['about']['keywords'];?>'>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="<?php Yii::app()->baseUrl;?>/showbl/css/sangde/system.css">
<?php Yii::app()->clientScript->registerCoreScript('jquery');  ?>
<title>

<?php echo isset($this->pageTitle)? CHtml::encode($this->pageTitle):isset(Yii::app()->params['about']['pageName'])?Yii::app()->params['about']['pageName']:'尚德佳'; ?> 	
</title>
</head>
<body>
	<div class='menu'>
	<?php echo About::createMenu();?>
	</div>
	<script type="text/javascript">
	$(function(){
		function size(){
			$(".menu").css("top",($(window).height()-$(".menu").height())/2+100+$(window).scrollTop())

		}
		size();
		$(window).resize(function(){

			size();
					})

	})

	</script>
	<!--内容输出-->
<?php echo $content;?>

<div class='content crumb c'>

<s>您现在的位置：</s>	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
<!--输出结束-->	
</div>
<!--页尾-->
<div id='foot' class='content'>
<a href=''>网站地图</a>|<a href=''>联系我们</a>|<a href='<?php echo Yii::app()->createUrl('laurel')?>'>尚德殊荣</a>
</div>
</body>

