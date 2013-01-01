<meta charset='UTF-8' />
<link  rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl();?>/css/news.css" />
<!-- 现在位置 -->

<div id="weizhi">
	<div class="center">
	<b>现在位置:</b> <a href="<?php echo Yii::app()->getBaseUrl();?>">首页</a> -><a href="<?php $this->createAbsoluteUrl('news/index')?>">新闻</a>
	</div>
</div>

<!-- 内容 -->
<div id="content">
	<div class="center">
		
		<div id="list_l" class="l">
		<hr/>
			<ul class="liebiao">
			<?php
			foreach ($news as $v):if(!empty($v->newsData)){?>	
				<li>
				
					<div class="wenzi l">	
					<!-- 标题 -->
					<a href="<?php echo $this->createAbsoluteUrl("news/neirong",array('nid'=>$v->id))?>">
					<b class="biaoti">
					<?php echo CHtml::encode($v->title)?></b>
					<!-- 简介 -->
					<hr />
					<p class="jianjie">
					<?php if(empty($neirong->description))
						{	
							
													  
		  					echo trim(mb_substr(strip_tags($v->newsData->content),'0','30','UTF-8'),'\'').'...';
						}else
						{
							
							echo trim(strip_tags($v->decription,'\''));
						}	
					?>
			
					</p></a>
					<span class="shijian"><b class="shuxian">|</b><?php echo $v->createTime ?></span>
					</div>
					<div class="tupian r">
					<img src='<?php   echo Yii::app()->controller->getImgDir($v->newsData->thumb). $v->newsData->thumb;?>' width="120" height="80"/>
 					</div>
				</li>
				<?php } endforeach;?>

			</ul>	
		
			<?php 	
				$this->widget('CLinkPager',array(
					'header'=>'',
					'firstPageLabel'=>'首页',
					'lastPageLabel'=>'末页',
					'prevPageLabel'=>'上一页',
					'nextPageLabel'=>'下一页',
					'pages'=>$pages,
					'maxButtonCount'=>13,
					'htmlOptions'=>array(
						'id'=>'pager'
							
							),
					));
				?>					
		</div>
		<div id="list_r" class="r">
			<div class="biaoqian">
				<iframe src="<?php echo Yii::app()->createUrl('index/showCate');?>"></iframe>
			</div>
		</div>
	</div>
</div>

