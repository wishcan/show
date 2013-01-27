<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>作品欣赏</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="杨彦,艺术,山水,画家,国画,李可染,张大千,度一精舍,爱达.杨,中非艺术研究院,度一学堂"  />
	<meta name="description" content="国画大师杨彦个人网站,你可以不出门坐在家中就能细细品味他的作品" />
	<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/imgJquery.js');  ?>
<style type='text/css'>
*{
	padding:0px;
	margin: 0px;
}
.center{
	width:999px;
	margin:0px auto;
}
.l{
	float:left;
}
.r{
	float:right;
}
body{
	background:url(/show/images/body_bg2.jpg);
	background-border:none;
	
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
	background:url(/show/images/biaoqian_1.png)no-repeat;
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
	background:url(/show/images/qita.png)no-repeat;
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
	background:url(/show/images/qita1.png)no-repeat;
	color:#fff;
}
.prev,.next{
	display: block;
	width:30px;
	height:60px;
	cursor:pointer;
	background:url(/show/images/zuoyou.png) no-repeat ;
	margin-top:20px;

}
.prev{
	
	/*background-position:left -139px;*/
}
.next{
	background-position:left -167px;
}
.prev:hover{
		background-position:left -56px;
}
.next:hover{
background-position:left -112px;
}
.bigImg{
	margin:0px auto;
	width:960px;
	min-height:600px;
}
.bigImg img{
	max-width:960px;
	max-height:800px;
}
.img img{
	max-width:960px;
	max-height:960px;
}
ul li
{	
	padding:0px;
	margin:0px;
	list-style:none;
	float:left
}
ul{
	width:30000px;
	padding:0px;
}
.xiaotu{
	padding:10px 0px;
	width:960px;
	overflow:hidden;
	position: absolute;
}
.xiaotu img{
	/*width:180px;*/
	height:100px;
}
.xiaotu li img
{	
	filter:alpha(opacity=40);  /* ie 有效*/
	-moz-opacity:0.4; /* Firefox  有效*/
	opacity:0.4; /* 通用，其他浏览器  有效*/
 }
 .li img:hover{
 		filter:alpha(opacity=80);  /* ie 有效*/
	-moz-opacity:0.8; /* Firefox  有效*/
	opacity:0.8; /* 通用，其他浏览器  有效*/
 }
 .xiaotu li .on{
	filter:alpha(opacity=100);  /* ie 有效*/
	-moz-opacity:1; /* Firefox  有效*/
	opacity:1; /* 通用，其他浏览器  有效*/
 }
.over{
	width:805px;
	overflow:hidden;
	position: relative;
	border:solid 1px #333;
	padding:0px;
	background-color: #333;
}
.bigImg img{
	display: none;
	float: none;

}
.bigImg .imgon{
	display: block;
	position: absolute;
}
</style>
<script type="text/javascript">
$(function(){

	var index=1;
	for(var j=0;j<$(".xiaotu ul li").length;j++)
	{
		if($(".xiaotu ul li").eq(j).find("img").attr('src')==$('.bigImg img').attr('src')){
			
				goLeft(-(parseInt(j/5)*$('.xiaotu').width()));
			}
	}


	$(".link").height();	

	$("h2").click(function()
			{
				history.go(-1);
		})	
	//给标签加上背景样式
	for(var i=0;i<$(".qita a").length;i++)
		{
			$(".qita a").eq(i).css("background","url(/show/images/biaoqian_"+Math.floor(Math.random()*9+1)+".png)");
		}
	//标签滚动和隐藏功能	
	$(".xiaotu li img").click(function()
		{
			if($(this).attr('class')=='on') return false;
			$(".on").removeClass("on");
			$(this).addClass('on');
			var imgin=$(this).parent().index();
			$(".imgon").removeClass('imgon').hide();
			$(".bigImg img").eq(imgin).addClass('imgon').fadeIn(500);
			$(".imgon").css('left',($(window).width()-parseInt($(".imgon").width()))/2);
		})
		
		$(".click p").click(function(){
					$(this).parent().animate({'right':200},500);
					$(".qita").animate({'right':0},500);
					$(this).addClass("hide");
			
			})
			$(".qita").mouseleave(function(){
				$(this).animate({'right':-210},10);
				$(".click").animate({'right':0},10);
				})
		
// 图片上下滚动	

$('.next').click(function(){

	goLeft(-(index*$('.over').width()));
	index++;
	if(index>(parseInt($('ul li').length)/12)){
		index=0;
	}
})
$('.prev').click(function(){

	if(parseInt($('ul').css('left'))>=0){
		return false;
	}

	goLeft(parseInt($('ul').css('left'))+$('.over').width());
	if(index==1){
		return false;
	}
	index--;
})
	
	function goLeft(left){
	
	$('ul').animate({'left':left},200);
	
	}	
	
$(".bigImg img").click(function(){
	var ind=$(this).index();
	var len=$(".bigImg img").length
	if(ind==len-1){return false;}
	if(ind%5==0){

		var l=0;
		var num=ind+5;
		for(var j=ind;j<num;j++){
	
			l+=$(".xiaotu img").eq(j).width();
		}
				
		goLeft(parseInt($("ul").css("left"))+(-l));

	}
	$(this).removeClass('imgon').hide();
	$(".bigImg img").eq(ind+1).fadeIn(700).addClass('imgon');
	$(".xiaotu .on").removeClass('on');
	$(".xiaotu img").eq(ind+1).addClass('on');
	$(".imgon").css('left',($(window).width()-parseInt($(".imgon").width()))/2);
})
	$(window).resize(function(){
		setSize();
	})

	/*设置DIV尺寸*/
	function setSize()
	{
		var H=$(window).height();
		var W=$(window).width();
		$('.bigImg img').css('height',parseInt(H)-105);
		if(parseInt($(".imgon").width())===0)
		{
			imgW=600;
		}else{
			imgW=parseInt($(".imgon").width());
		}
		
		$(".imgon").css('left',($(window).width()-imgW)/2);
		$(".xiaotu").css('top',parseInt(H)-105);
		$(".xiaotu").css('left',($(window).width()-parseInt($(".over").width()))/2);
	}
setSize();
})

</script>
</head>
<body>
<div class='center'>

<div class='bigImg'>
	<?php foreach($xiaotu as $k=> $v){
			if($k==14) continue;
			if(isset($datu) && ($datu[0]['thumb']== $v['thumb']))
			{
		echo "<img src='".Yii::app()->controller->getImgDir($v['thumb']).$v['thumb']."' class='imgon' />";
			}else{
					echo "<img src='".Yii::app()->controller->getImgDir($v['thumb']).$v['thumb']."'  />";
			}

	}?>
	<img src="<?php 
if(isset($datu)){
	echo Yii::app()->controller->getImgDir($datu[0]['thumb']).$datu[0]['thumb'];
	}else{
		echo Yii::app()->controller->getImgDir($xiaotu[0]['thumb']).$xiaotu[0]['thumb'];}?>" />
</div>

<div class='xiaotu'>
	<span class='prev l'></span>
	<div class='over l'>
	<ul style='position:relative;'class='l'>
			<?php foreach ($xiaotu as $v):?>
				<li><img class="<?php if(isset($_GET['gdid'])){ if($v['gdid']==$_GET['gdid']) {echo 'on';} } ?>" src="<?php echo Yii::app()->controller->getImgDir($v['thumb']).$v['thumb']?>" /></li>
	<?php endforeach;?>
			</ul>
	</div>
<span class='next l'></span>
</div>
</div>
<style type='text/css'>
		.left,.right{
		width:50px;	
		height:66px;	
		background:#ddd;		
}
		
		</style>
<div class='left'>
	<!-- <img src='/show/images/left' /> -->
</div>
<div>
	<!-- <img src='/show/images/right'/> -->
</div>






</body>