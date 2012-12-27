<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="zh_cn" />
	<meta name="keywords" content="杨彦,艺术,山水,画家,国画,李可染,张大千,度一精舍,爱达.杨,中非艺术研究院,度一学堂"  />
	<meta name="description" content="国画大师杨彦个人网站,你可以不出门坐在家中就能细细品味他的作品" />
	<?php $url=Yii::app()->getBaseUrl();?>

	<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/imgJquery.js');  ?>  
<title>作品欣赏</title>
<style type="text/css">
.l{
	float:left;
}
body{
	background:url(/show/images/body_bg2.jpg);
	background-border:none;
}
h1 a:hover,h2 a:hover{
	color:#29A2B5;
}
h1 a, h2,a{
	color:#333;
	text-decoration:none;
}
.link{
/* 	border-right:solid 5px #333; */
}
.img{
	margin-left:10px;
	padding:5px;
	overflow:hidden;
}
ul li
{	
	padding:0px;
	margin:0px;
	list-style:none;
}
.xiaotu{overflow:hidden;padding:10px 0;margin-top:30px;}
.link li img
{
filter:alpha(opacity=40);  /* ie 有效*/
	-moz-opacity:0.4; /* Firefox  有效*/
	opacity:0.4; /* 通用，其他浏览器  有效*/
 }
 .link li .on{
	filter:alpha(opacity=100);  /* ie 有效*/
	-moz-opacity:1; /* Firefox  有效*/
	opacity:1; /* 通用，其他浏览器  有效*/
 }
 .line{
 	display:block;
 	margin:0 5px 0 10px;

 }

</style>
<script type="text/javascript">
$(function(){

	$(".link").height();	
	$(".line").css("height",$(".link").height());
	$("h2 a").click(function()
			{
				history.go(-1);
		})	
	$(".xiaotu li img").click(function()
			{
		$(".on").removeClass("on");
		$(this).addClass("on");
		var src=$(this).attr("src");
		$(".img").find("img").remove();
		$(".img").append("<img src='"+src+"' />");	

		})
		
})

</script>
</head>
<body>
<div class="l link">
	<h1 ><a style="color:#3333" href="<?php echo $this->createUrl('index/index');?>">杨彦艺术网</a></h1>
	<h2 ><a style="color:#3333" href="javascript:void(0)"?>返回</a></h2>
	<div class='xiaotu' >
		<div>
			<?php foreach ($xiaotu as $v):?>
		
				<li><img class="<?php if(isset($_GET['gdid'])){ if($v['gdid']==$_GET['gdid']) {echo 'on';} } ?>" src="<?php echo Yii::app()->controller->getImgDir($v['thumb']).$v['thumb']?>" width="160" height="160"/></li>
			<?php endforeach;?>
		</div>
	</div>
</div>

<img src="<?php echo Yii::app()->getBaseUrl()?>/images/color_line.png" class="l line">
<div class="l img">

	<img src="<?php 

if(isset($datu)){
	echo Yii::app()->controller->getImgDir($datu[0]['thumb']).$datu[0]['thumb'];
	}else{
		echo Yii::app()->controller->getImgDir($xiaotu[0]['thumb']).$xiaotu[0]['thumb'];}?>" />

</div>

</body>
</html>