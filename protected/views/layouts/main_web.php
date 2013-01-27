
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="language" content="zh_cn" />
	<meta name="keywords" content="杨彦,艺术,山水,画家,国画,李可染,张大千,度一精舍,爱达.杨,中非艺术研究院,度一学堂"  />
	<meta name="description" content="国画大师杨彦个人网站,你可以不出门坐在家中就能细细品味他的作品" />
	<?php $url=Yii::app()->getBaseUrl();?>
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>/css/static.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>/css/web.css" />
	<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/web.js');  ?>  
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/imgJquery.js');?>
<<<<<<< HEAD
	<title> 杨彦艺术网</title>
=======
	<title> 宝隆艺术网</title>
>>>>>>> df5fb8b012f47d193deb10e0c4982163c2092bba
</head>

<style type="text/css">
</style>
<body>

<<<<<<< HEAD
<div id="header">
	<div class="center">
		<span class="text_l orange"><b>杨彦艺术网</b></span>
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

<!-- 		<div id="search-form">
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
		</div> -->

	</div><div class='c'></div>
	<div id='menu' style='margin-top:20px;'>
	<div style='background:#F0F3F4;height:60px;border-radius:10px;border:solid 1px #ddd;box-shadow: 0px 0px 5px #F0F3F4;' >
 <div class="center">	
			<ul class="u1 l" style='margin-top:0px;' >	
		
				<li style="margin-left:20px;">
				<a  class='on' href="<?php echo Yii::app()->getBaseUrl();?>">首页</a></li>
				<li><a href="<?php echo $this->createAbsoluteUrl("news/index");?>">新闻动态</a></li>
				<li><a href="<?php echo $this->createAbsoluteUrl("gallery/index");?>">作品欣赏</a></li>
				<li><a href="<?php echo $this->createAbsoluteUrl("gallery/shey");?>">杨彦摄影</a></li>
				<li><a href="<?php echo $this->createAbsoluteUrl("gallery/ada");?>">爱达杨作品</a></li>
				<li><a href="<?php echo $this->createAbsoluteUrl("video/index");?>">视频短片</a></li>
				<li><a href="<?php echo $this->createAbsoluteUrl("news/duyi");?>">度一学堂</a></li>
				<li><a href="<?php echo $this->createAbsoluteUrl("news/pinglun");?>">诸家评论</a></li>
				<li><a href="javascript:void(0)">杨彦相关</a></li>
				
			</ul>
			<!--分类-->
			<div class='fen fenlei'>
				<?php
					foreach(Category::getChildren(24) as $v)
					{

						
						echo '<a href='.Yii::app()->createUrl('gallery/show',array('cid'=>$v->id)).'>'.$v->cname.'</a>';
					}

				?>
			</div>
			<!--分类结束-->
			<!--关于杨彦开始-->
			<div class='about fenlei' style='text-align:right'>
				<a href='<?php echo  $this->createAbsoluteUrl('news/neirong',array('nid'=>47))?>' >杨彦简介</a>
				<a href='<?php echo  $this->createAbsoluteUrl('news/neirong',array('nid'=>48))?>' >杨彦履历</a>
				<a href='#' >常用印谱</a>
			</div>
			<!--杨彦相关结束-->
			<!--摄影分类开始-->
			<div class='sfenlei fenlei'>
				<?php
					foreach(Category::getChildren(25) as $v)
					{

						
						echo '<a href='.Yii::app()->createUrl('gallery/show',array('cid'=>$v->id)).'>'.$v->cname.'</a>';
					}

				?>

			</div>
			<!---->
			</div>
	</div>

	

</div>
 <div class="c"></div>
 
<!-- 输出开始 -->
<?php  echo $content;?>
<!-- 输出结束 -->
<!-- 尾部开始 -->
<div class="c"></div>
<div id="foot">
	<div class="center">
		<!-- 友情链接开始 -->
		<div class="hudong">
			<h1>互动空间</h1>
			<p>
				<?php
					foreach(Link::getLinks() as $v){

						echo '<a href="'.$v->url.'">['.$v->name.']</a>';
					}
		?>
			</p>
		</div>
		
		<!-- 友情链接结束 -->
		<!-- 关于我们开始 -->
		<div class="guanwu">
		<h1>关于我们</h1>
		<p>【杨彦艺术网】</p>
		<p> 北京杨彦画友会 度一文化</p>
<p>联系地址：北京市昌平区北七家镇王府街21号宝隆艺园度一精舍（100000） 电话：010-87731618 87731985(传真) Email：87731985@163.com
京ICP备05067422号</p>
<p>杨彦艺术网【度一精舍】 Www.杨彦.Com</p>
		</div>
		<!-- 关于我们结束 -->
	</div>
</div>
<!-- 尾部结束 -->


=======
>>>>>>> df5fb8b012f47d193deb10e0c4982163c2092bba

</body>