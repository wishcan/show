<meta charset='UTF-8' />
<link  rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl();?>/css/gallery.css" />

<!-- 现在位置 -->
<div id="weizhi">
	<div class="center">
	<b>现在位置:</b> <a href="<?php echo Yii::app()->getBaseUrl();?>">首页</a> -><a href="<?php $this->createAbsoluteUrl('gallery/index')?>">作品欣赏</a>
	</div>
</div>
<!-- 动态图开始 -->
<div id="zuopin">
	<div class="center">
		<!-- 图 -->
		<div class="donghua">
			<ul class="tu l">
				<li><a href=""><img src="/show/images/zanwei_5.jpg" /></a></li>
				<li><a href=""><img src="/show/images/zanwei_5.jpg" /></a></li>
				<li><a href=""><img src="/show/images/zanwei_5.jpg" /></a></li>
				<li><a href=""><img src="/show/images/zanwei_5.jpg" /></a></li>
				<li><a href=""><img src="/show/images/zanwei_5.jpg" /></a></li>
			</ul>
			<ul class="jieshao r">
				<li>
					<p class="zuopin">山水画作</p>
					<p class="xinxi">
						<span class="s1 l">度一系列</span>
						<span class="s2 r">2012</span>
					</p>
				</li>
				<li>
					<p class="zuopin">山水画作</p>
					<p class="xinxi">
						<span class="s1 l">度一系列</span>
						<span class="s2 r">2012</span>
					</p>
				</li>
				<li>
					<p class="zuopin">山水画作</p>
					<p class="xinxi">
						<span class="s1 l">度一系列</span>
						<span class="s2 r">2012</span>
					</p>
				</li>
				<li>
					<p class="zuopin">山水画作</p>
					<p class="xinxi">
						<span class="s1 l">度一系列</span>
						<span class="s2 r">2012</span>
					</p>
				</li>
								<li>
					<p class="zuopin">山水画作</p>
					<p class="xinxi">
						<span class="s1 l">度一系列</span>
						<span class="s2 r">2012</span>
					</p>
				</li>

			
			</ul>
		
		</div>
		<div class="c"></div>
		<!-- 作品缩略图 -->
		<div class="duotu">
			<ul>
			<?php foreach ( $row as $k=>$v ):?>
				
				<li>
					<a href="<?php echo $this->createAbsoluteUrl('gallery/showImg',array("gdid"=>$v['gdid']));?>"><img src="<?php echo Yii::app()->controller->getImgDir($v['thumb']).$v['thumb'];?>" /></a>
						<?php if($k%5==0){echo "</li><li>";}endforeach;?>
							<?php foreach ( $row as $k=>$v ):?>	
				<li>
					<a href=""><img src="<?php echo Yii::app()->controller->getImgDir($v['thumb']).$v['thumb'];?>" /></a>
						<?php if($k%5==0){echo "</li><li>";}endforeach;?>

			</ul>
		</div>
	</div>
</div>