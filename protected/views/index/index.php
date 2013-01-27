<script type="text/javascript">
$(function(){
	imgJquery('#huandeng ul li',2,3000);
})
</script>
<style type='text/css'>
	ul li{
		list-style:none;
		margin:0px;
		padding:0px;
		list-style-position:outside;
		}
	ul{

		margin:0px;
		padding:0px;
		list-style:none;
	}	

</style>
	<!-- 幻灯片开始 -->
<style type='text/css'>
</style>
	<div id="huandeng">
	<div class="center">
		<ul class="center">	
			<?php foreach ($advert as $v):?>
			<li><a href="<?php echo $v['link'];?>"><img title='<?php echo $v['title']?>' src="<?php echo Yii::app()->controller->getImgDir($v['thumb']).$v['thumb'];?>" /></a></li>		
			<?php endforeach;?>
		</ul>

		<div class="c"></div>
	</div>
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
			echo '</ul> <ul class="u'.$u.'">';}
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
	<div class="video shipin">
		<h3>视频</h3>
		<ul>
			<?php foreach($video as $v){
		
			echo '<li class="l"> <a href="'.Yii::app()->createUrl('video/kankan').'">'.'<img src="'.$v->thumb.'"/><p>'.mb_substr($v->title,0,12,'UTF-8').'</p></a>';
		}
		?>
		</ul>
	
	</div>
	<!-- 视频结束 -->
	<div class="c"></div>
	<!-- 综合开始 -->
	<div id="zonghe" style='width:980px;'>
		
		<ul class='l qutan'>
			<h3>诸家评论</h3>
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
