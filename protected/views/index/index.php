


	<!-- 幻灯片开始 -->
	<div id="huandeng">
		
		<ul class="center">	
			<li><a href="#"><img src="/show/images/huan1.jpg" /></a></li>		
		</ul>
		<span class="prev l"></span>
		<span class="next r"></span>
		<div class="c"></div>
	</div>
	<!-- 幻灯片结束 -->
<div class="endHuandeng"></div>
<div id="content">
	<div class="center">
	<!-- 绘画史开始 -->
	<h1>杨彦绘画史</h1>
		<div id="huihua">
		<ul class="u2">
		<?php $u=2;foreach ($cate as $k=>$v) :?>
			
		
			<li><a href="<?php echo Yii::app()->createUrl('gallery/show',array('cid'=>$v->id));?>"><span class="l date">2012</span><span><?php echo mb_substr($v->cname,0,12,'UTF-8');?></span></a></li>
		<?php if(($k+1)%6==0){
			$u++;
			echo '</ul><ul class="u'.$u.'">';}
			?>
		<?php endforeach;?>
		</ul>
		

			<img class="hui" src="<?php echo Yii::app()->getBaseUrl();?>/images/huihui_bg.png"/>
		</div>
		<!-- 绘画史结束 -->
	<i class="c"></i>
	
	<!-- 艺术总汇 开始 -->
	<div id="zonghui">
		<h3>杨彦艺术总汇</h3>
		<p>
			<a href="">杨彦唐装系列</a>
			<a href="">铭壶系列</a>
			<a href="">绘瓷系列</a>
			<a href="">匾额系列</a>
			<a href="">对联系列</a>
		<a href="">金石系列</a>
		</p>
	<!-- 艺术总汇结束 -->
	</div>
	<!-- 新闻开始 -->
	<div id="xinwen">
		<h3>新闻动态</h3>
		<ul class="l">
			<?php foreach ($news as $k=> $v){?>
			<li>
				<a href="<?php echo $this->createAbsoluteUrl('news/neiRong',array('nid'=>$v->id))?>">
				<?php echo  mb_substr($v->title,'0',16,'UTF-8').'...';?>
					<span>
					<?php echo $v->createTime; ?>
					</span>		
				</a>
			</li>
			<?php if(($k+1)/5==1){
				echo "</ul><ul class='r'>";
			}?>
			<?php } ?>
		</ul>
	
	</div>
	<!-- 新闻结束 -->
	<div class="c"></div>
	<!-- 视频开始 -->
	<div class="video">
		<h3>视频</h3>
		<ul>
			<li class='l'><img src="<?php echo Yii::app()->getBaseUrl()?>/images/zanwei2.jpg" />
				<p>邱启明大跳骑马舞</p></li>
		
			<li class='l'><img src="<?php echo Yii::app()->getBaseUrl()?>/images/zanwei2.jpg" />
				<p>邱启明大跳骑马舞</p></li>
		
			<li class='l'><img src="<?php echo Yii::app()->getBaseUrl()?>/images/zanwei2.jpg" />
				<p>邱启明大跳骑马舞</p></li>
			
			<li class='l'><img src="<?php echo Yii::app()->getBaseUrl()?>/images/zanwei2.jpg" />
				<p>邱启明大跳骑马舞</p></li>
		
		</ul>
	
	</div>
	<!-- 视频结束 -->
	<div class="c"></div>
	<!-- 综合开始 -->
	<div id="zonghe" style='width:980px;'>
		
		<ul class='l qutan'>
			<h3>趣谈</h3>
			<li><a href="">新闻新闻新闻新闻新闻新闻新闻新闻</a><span><?php echo date("y-m-d h:i:s");?></span></li>
			<li><a href="">新闻新闻新闻新闻新闻新闻新闻新闻</a><span><?php echo date("y-m-d h:i:s");?></span></li>
			<li><a href="">新闻新闻新闻新闻新闻新闻新闻新闻</a><span><?php echo date("y-m-d h:i:s");?></span></li>
			<li><a href="">新闻新闻新闻新闻新闻新闻新闻新闻</a><span><?php echo date("y-m-d h:i:s");?></span></li>
			<li><a href="">新闻新闻新闻新闻新闻新闻新闻新闻</a><span><?php echo date("y-m-d h:i:s");?></span></li>
		</ul>
		<ul class='r xuetang'>
			<h3>度一学堂</h3>
			<li><a href="">新闻新闻新闻新闻新闻新闻新闻新闻</a><span><?php echo date("y-m-d h:i:s");?></span></li>
			<li><a href="">新闻新闻新闻新闻新闻新闻新闻新闻</a><span><?php echo date("y-m-d h:i:s");?></span></li>
			<li><a href="">新闻新闻新闻新闻新闻新闻新闻新闻</a><span><?php echo date("y-m-d h:i:s");?></span></li>
			<li><a href="">新闻新闻新闻新闻新闻新闻新闻新闻</a><span><?php echo date("y-m-d h:i:s");?></span></li>
			<li><a href="">新闻新闻新闻新闻新闻新闻新闻新闻</a><span><?php echo date("y-m-d h:i:s");?></span></li>
		</ul>
		
	</div>
	<!-- 综合结束 -->
	<div class="chuban video">
		<h3>出版著作</h3>
		<ul>
			<li class='l'><img src="<?php echo Yii::app()->getBaseUrl()?>/images/zanwei2.jpg" />
				<p>邱启明大跳骑马舞</p>
				<p>出版社：</p>
				<p>出版时间</p>	
				</li>
			<li class='l'><img src="<?php echo Yii::app()->getBaseUrl()?>/images/zanwei2.jpg" />
				<p>邱启明大跳骑马舞</p>
				<p>出版社：</p>
				<p>出版时间</p></li>
			<li class='l'><img src="<?php echo Yii::app()->getBaseUrl()?>/images/zanwei2.jpg" />
				<p>邱启明大跳骑马舞</p>
				<p>出版社：</p>
				<p>出版时间</p></li>
			<li class='l'><img src="<?php echo Yii::app()->getBaseUrl()?>/images/zanwei2.jpg" />
				<p>邱启明大跳骑马舞</p>
				<p>出版社：</p>
				<p>出版时间</p></li>
		 	<li class='l'><img src="<?php echo Yii::app()->getBaseUrl()?>/images/zanwei2.jpg" />
				<p>邱启明大跳骑马舞</p>
				<p>出版社：</p>
				<p>出版时间</p>
				</li>
		
			<li class='l'><img src="<?php echo Yii::app()->getBaseUrl()?>/images/zanwei2.jpg" />
				<p>邱启明大跳骑马舞</p>
				<p>出版社：</p>
				<p>出版时间</p>
				</li>
			<li class='l'><img src="<?php echo Yii::app()->getBaseUrl()?>/images/zanwei2.jpg" />
				<p>邱启明大跳骑马舞</p>
				<p>出版社：</p>
				<p>出版时间</p>
				</li>
			<li class='l'><img src="<?php echo Yii::app()->getBaseUrl()?>/images/zanwei2.jpg" />
				<p>邱启明大跳骑马舞</p>
				<p>出版社：</p>
				<p>出版时间</p>
				</li>
		</ul>
		
	
	</div>
	</div>
	
</div>
