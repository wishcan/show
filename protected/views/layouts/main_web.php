<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<meta name="keywords" content="杨彦,艺术,山水,画家,国画,李可染,张大千,度一精舍,爱达.杨,中非艺术研究院,度一学堂"  />
	<meta name="description" content="国画大师杨彦个人网站,你可以不出门坐在家中就能细细品味他的作品" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl();?>/css/static.css" />
	<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
	<title> 度一精舍</title>
</head>

<style type="text/css">
.center{
	width:960px;
	margin:0 auto;
	}
.text_l{
	text-align:left;	
}
.text_r{
	text-align:right;
}	
.orange{
	color:#ff6600;
}
.black{
	color:black;
}
#header{
	height:35px;
	background:url('/show/images/top_bg.jpg')repeat-x;
}
#header b{
line-height:28px;
margin: 20px 20px 40px 0px;
}
#header a{
	border:none;
	text-decoration:none;
	color:black;
}
.logo{
	padding:20px 0px 0 150px;
}

</style>
<body>

<div id="header">
	<div class="center">
		<span class="text_l orange"><b>度一精舍</b></span>
		<span class="text_r r  black">
			<b><a href="javascript:void(0)">加入收藏</a></b>
			<b><a href="javascript:void(0)">联系我们</a></b>
		</span>
		<b class="c"></b>
	<div class="logo">
		<img src="<?php echo Yii::app()->getBaseUrl();?>/images/logo.jpg" />
	</div>
	</div>
	

</div>




<?php  echo $content;?>




</body>