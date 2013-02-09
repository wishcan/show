<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php $url=Yii::app()->getBaseUrl();?>
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo $url;?>/css/static.css" />-->
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>/css/web.css" />
	<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/web.js');  ?>  
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/imgJquery.js');?>
	<title> 宝隆艺术网</title>
</head>

<style type="text/css">

*{
	font-family:   "楷体";
	}
</style>
<body>
	<!--头部开始-->

<div id='head'>
	
	<div class='center '>
		<p class='h_menu'>
			<a href='<?php echo Yii::app()->createUrl("index/index")?>' style="微软雅黑" >宝隆艺术网 </a>  
			<a href='#' class='r' style='*margin-top:-35px;'>招商加盟:010-8178-8388</a>
		</p>
		<div class='c'></div>
		<div class='h_c l'>
			<a href='<?php echo Yii::app()->createUrl("index/index")?>' class='logo l'></a>		
			<form class='search l'>
				
				<input type='text' name='' class='tiaojian l'/>
				<ul class='l'>
					<li class='on'>全部</li>
					<li>资讯</li>
					<li>拍卖</li>
					<li>视频</li>					
				</ul>
				<input type='submit' value='' class='sousuo l' />
			</form>
			<!--最新动态-->
		</div>
		
		<!--导航菜单开始{-->
		<div id='web_menu' class='l' >
				<ul style='*margin-left:40px;'>
					<li>
						<a href='<?php echo Yii::app()->createUrl('news')?>'><b>新闻</b></a>
						<a href='#'>综合</a>
						<a href='#'>市场</a>
						<a href='#'>收藏</a>
					</li>
					<li>
						<a href='<?php echo Yii::app()->createUrl('comment')?>'><b>评论</b></a>
						<a href='#'>综合</a>
						<a href='#'>展览</a>
						<a href='#'>作品</a>
					</li>
					<li>
						<a href='<?php echo Yii::app()->createUrl('subject')?>'><b>专题</b></a>
						<a href='#'>事件</a>
						<a href='#'>观点</a>
						<a href='#'>点评</a>
					</li>	
				</ul>
				<ul>
					<li>
						<a href='<?php echo Yii::app()->createUrl('auction')?>'><b>拍卖</b></a>
						<a href='#'>预展</a>
						<a href='#'>展讯</a>
						<a href='#'>成果</a>
					</li>
					<li>
						<a href='#'><b>画廊</b></a>
						<a href='#'>展讯</a>
						<a href='#'>专题</a>
						<a href='#'>访谈</a>
					</li>
					<li>
						<a href='#'><b>书画</b></a>
						<a href='#'>新闻</a>
						<a href='#'>评论</a>
						<a href='#'>展览</a>
					</li>	
				</ul>
				<ul>
					<li>
						<a href='#'><b>视频</b></a>
						<a href='#'>节目</a>
						<a href='#'>访谈</a>
						<a href='#'>综合</a>
					</li>
					<li>
						<a href='#'><b>展览</b></a>
						<a href='#'>机构</a>
						<a href='#'>画廊</a>
						<a href='#'>预告</a>
					</li>
					<li>
						<a href='#'><b>艺术</b></a>
						<a href='#'>油画</a>
						<a href='#'>雕塑</a>
						<a href='#'>设计</a>
					</li>	
				</ul>
				<ul>
					<li>
						<a href='#'><b>摄影</b></a>
						<a href='#'>艺术家</a>
						<a href='#'>新势力</a>
						<a href='#'>精品在线</a>
					</li>
					<li>
						<a href=''> <b>艺术家</b></a>
						<a href='#'>近代艺术家</a>
						<a href='#'>当代艺术家</a>
						<a href='#'></a>
					</li>
					<li>
						<a href='#'><b>电子期刊</b></a>
						<a href='#'>杂志</a>
						<a href='#'>书画</a>
					<!-- 	<a href='#'></a> -->
					</li>	
				</ul>

		</div>
		<!--}导航部分结束-->
	</div>

</div>	
<i class='c'></i>
<!--头部结束-->
<!--内容输出开始{-->
<div id='content' class='c'>
	<div class='center'>
<?php echo $content;?>
	</div>
</div>
<!--}内容输出结束-->
<!--底部内容开始{-->
<div class='c'></div>
<div id='foot' style=''> 
	<div class='center'>
	<!--友情链接-->
		<div class='youlian'>
			<p>
			<span>友情链接</span>
				<a href='#'> 中国红木古典家具网 百雅轩 北京画院 中国收藏家协会 中央美术学院 	中国油画学会 中国美术馆 中国美术家协会</a>
			</p>
		</div>
		<div class='xiangguan'>
			
			<p>关于我们|我们的足迹|平面导购|联系我们|招贤纳士</p>
			<p>地址：北京昌平区王府大街21号 电话：010－81780388/81789903/05 传真：010－81780388</p>
			<p>《中华人民共和国网络信息产业经营许可证》京ICP备060623225号</p>

		</div>	
	</div>
</div>
<!--}底部内容结束-->
</body>