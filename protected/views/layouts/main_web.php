
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<meta name="keywords" content="杨彦,艺术,山水,画家,国画,李可染,张大千,度一精舍,爱达.杨,中非艺术研究院,度一学堂"  />
	<meta name="description" content="国画大师杨彦个人网站,你可以不出门坐在家中就能细细品味他的作品" />
	<?php $url=Yii::app()->getBaseUrl();?>
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>/css/static.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>/css/web.css" />
	<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/web.js');  ?>  

	<title> 度一精舍</title>
</head>

<style type="text/css">
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
			<a href="<?php echo Yii::app()->getBaseUrl();?>">
				<img src="<?php echo Yii::app()->getBaseUrl();?>/images/logo.jpg" />
			</a>
		</div>

		<div id="search-form">
			<form class="search">
				<div class="select1">
					<div class="select2">
					
						<select> 
							<option>全部</option>
							<option>画作</option>
							<option>摄影</option>
							<option>新闻</option>	
						</select>

					</div>
					
					<input type="text"name="search" value="从您感兴趣的开始" />
					<input type="submit" value="" class="button"/>
				</div>
			</form>
		</div>
		<div class="c"></div>
	</div>
	<div id="menu">
		  <div class="center">	
			<ul class="u1">
				
				<li style="margin-left:20px;">
				<a  class='on' href="<?php echo Yii::app()->getBaseUrl();?>">首页</a></li>
				<li><a href="<?php echo $this->createAbsoluteUrl("news");?>">新闻动态</a></li>
				<li><a href="<?php echo $this->createAbsoluteUrl("gallery");?>">作品欣赏</a></li>
				<li><a href="<?php echo $this->createAbsoluteUrl("gallery/shey");?>">杨彦摄影</a></li>
				<li><a href="<?php echo $this->createAbsoluteUrl("gallery/ada");?>">爱达杨作品</a></li>
				<li><a href="<?php echo $this->createAbsoluteUrl("video");?>">视频短片</a></li>
				<li><a href="<?php echo $this->createAbsoluteUrl("news/duyi");?>">度一学堂</a></li>
				<li><a href="<?php echo $this->createAbsoluteUrl("news/comment");?>">诸家评论</a></li>
				<li><a href="<?php echo $this->createAbsoluteUrl("about");?>">杨彦相关</a></li>
				
			</ul>
			
			</div>
	</div>
	
	

</div>

<!-- 输出开始 -->
<?php  echo $content;?>
<!-- 输出结束 -->
<!-- 尾部开始 -->
<div id="foot">


</div>
<!-- 尾部结束 -->



</body>