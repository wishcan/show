<meta charset='UTF-8' />
<link  rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl();?>/css/gallery.css" />
<script type="text/javascript">
$(function(){

imgJquery(".tu li");
$(".jieshao li").hover(function(){
	imgPlay1(".tu li",$(this).index(),500);
	$(".on").removeClass("on");
	$(this).addClass("on");
})

})

</script>
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
				<?php foreach ($advert as $k => $v)
				{
					if($k>5) break;
			    	echo '<li><a href="'.$v['link'].'"><img src="'.Yii::app()->controller->	getImgDir($v['thumb']).$v['thumb'].'"/>'.'</a></li>';
				}
				?>

			</ul>
			<ul class="jieshao r">
				<?php foreach ($advert as $k => $v){
					if($k>5) break;
					if($v['title']==''){
						$title='作品';
					}else{
						$title=$v['title'];
					}
				echo '<li><p class="zuopin"><a href="'.$v['link'].'">'.$title.'</a></p>';
				}
				?>
			
			</ul>
		
		</div>
		<div class="c"></div>
		<!-- 作品缩略图 -->
		<style type="text/css">
		</style>
		<div class="duotu">
			<ul>
				<li>
			<?php $n=1;foreach ( $row as $v ): $n++;?>
				
						
					<a href="<?php echo $this->createAbsoluteUrl('gallery/showImg',array("gdid"=>$v['gdid']));?>">
						<img src="<?php echo Yii::app()->controller->getImgDir($v['thumb']).$v['thumb'];?>" /></a>
			
						<?php if($v%5==0){echo "<span>".$k."</li><li>";}endforeach;?>

			</ul>
		</div>
	</div>
</div>