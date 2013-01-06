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
	background:url(./images/body_bg2.jpg);
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
/*大图*/
.img{
	margin-left:10px;
	padding:5px;
	overflow:hidden;
}
.img img{
	max-width:960px;
	max-height:960px;
}
.back{
	display:block;	
	width:108px;
	height:53px;
	cursor:pointer;
	background:url(./images/back_link.png) no-repeat;
}
.back:hover{
	background:url(./images/back_hover.png) no-repeat;
	padding:0 2px;
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
.gengduo{
	border-top:solid 2px #12F10E;
	width:100%;
	background:#ddd;
	position:fixed;
	bottom:0px;
 	filter:alpha(opacity=80);  /* ie 有效*/
	-moz-opacity:0.8; /* Firefox  有效*/
	opacity:0.8; /* 通用，其他浏览器  有效*/
}
.gengduo p{
	margin:0px;
	text-align:center;height:20px;
	cursor:pointer;
}
.gengduo p:hover{
	color:#ff6600;
}
.gengduo p b{
	position:relative;top:-5px;
}
.qita{
	position:fixed;
	right:-210px;
	width:200px;
	top:240px;
	padding:5px;
}
.qita a{
	display:block;
	float:left;
	width:97px;
	height:36px;
	background:url(./images/biaoqian_1.png)no-repeat;
	color:#fff;
	font-size:12px;
	text-align:center;
	line-height:36px;
}
.qita a:hover{
	text-decoration:underline;
	color:#000;
}
.click{
	width:38px;
	height:275px;
	background:url(./images/qita.png)no-repeat;
	position:fixed;
	right:0px;
	color:#ff6600;
	top:400px;
}
.click p{
	width:20px;
	font-size:16px;
	text-align:center;
	margin-top:0px;
	padding:10px 10px;
	font-weight:bold;
	cursor:pointer;
}
.click p:hover{
	background:url(./images/qita1.png)no-repeat;
	color:#fff;
}
</style>
<script type="text/javascript">
$(function(){
	$("body").css("width",parseInt($(".img img").width())+400);
	$(".link").height();	
	$(".line").css("height",$(".link").height());
	$("h2").click(function()
			{
				history.go(-1);
		})	
	for(var i=0;i<$(".qita a").length;i++)
		{
			$(".qita a").eq(i).css("background","url(./images/biaoqian_"+Math.floor(Math.random()*9+1)+".png)");
		}
	$(".xiaotu li img").click(function()
			{
		$(".on").removeClass("on");
		$(this).addClass("on");
		var src=$(this).attr("src");
		$(".img").find("img").remove();
		$(".img").append("<img src='"+src+"' />");	

		})
		$(".click").click(function(){
				
		
					$(this).animate({'right':200},500);
					$(".qita").animate({'right':0},500);
					$(this).find("p").addClass("hide");
			
			})
			$(".qita").mouseleave(function(){
				$(this).animate({'right':-210},10);
				$(".click").animate({'right':0},10);
				})



		
})

</script>
</head>
<body>
<div id='content'>
<div class="l link">
	<h1 ><a style="color:#3333" href="<?php echo $this->createUrl('index/index');?>">杨彦艺术网</a></h1>
	<h2 class="back"></h2><!-- 返回按钮 -->
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
<div class='c'></div>

<div class="qita">

		<?php foreach (Category::getChildren(23) as $v):?>
		
		<a href="<?php echo Yii::App()->createUrl('gallery/showImg',array('cid'=>$v->id));?> "><?php echo $v->cname?></a>
			<?php endforeach;?>
		</div>
</div>
<div class='c'></div>
<div class="click l"><p>更多作品</p></div>
</body>
</html>