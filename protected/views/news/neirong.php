<link  rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl();?>/css/news.css" />
<div class="c"></div>

<div id="weizhi">
	<div class="center">
	<b>现在位置:</b> <a href="<?php echo Yii::app()->getBaseUrl();?>">首页</a> -><a href="<?php $this->createAbsoluteUrl('news')?>">新闻</a>->内容
	</div>
</div>
<style type='text/css'>
.neirong img{
	max-width:80%;
}

</style>
<!-- 内容 -->
<div id="content">
	<div class="center">
		
		<div id="list_l" class="l">
		<hr/>
			<div class="toubu">
			<h3><?php echo $neirong->title;?></h3>	
			<p> <span class="xinxi"><span><?php echo $neirong->createTime; ?></span></span>
				<span class="xinxi">作者:<span>管理员</span></span>
				<span class="xinxi">点击:<span>123次</span></span>
				<span class="xinxi">转发到:</span><b>新浪微博</b><b>腾讯微博</b><b>豆瓣</b></p>	
			</div>
			<div class="jianjie">
			<p><span style="color:#F70375">摘要:</span>
			<span>
			<?php if(empty($neirong->description))
				{

  					echo trim(mb_substr(strip_tags($neirong->newsData->content),'0','60','UTF-8'),'\'').'...';
				}else
				{
					
					echo trim(strip_tags($neirong->decription,'\''));
				}
			?>
			
			</span></p>
			</div>
			<div class="neirong" style="padding:10px;">

			<?php
					$this->beginWidget('CHtmlPurifier');
					
					echo trim($neirong->newsData->content,'\''); 
					$this->endWidget();
				?>	
				
			</div>
		</div>
<!-- 		<div id="list_r" class="r"> -->
			<div class="biaoqian">
			<iframe src='<?php echo Yii::app()->createUrl('index/showCate')?>'></iframe>
			</div>
		</div>
	</div>

</div>