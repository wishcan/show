<?php
$this->breadcrumbs=array(
	'案例展示',
);?>

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/css/sangde/js/jquery.roundabout.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/css/sangde/js/roundshow.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/css/sangde/js/li.js"></script>
<div class='top_title top_case'>
</div>

	<div class='case'>
		<div class='prev'></div>
		<div class='next'></div>
	<ul class='round'>

		<?php foreach ($cid as $v):?>
		<?php  $thumb = GalleryData::getThumb($v);if(!$thumb)break;?>
		<li>
				
			<div>
				<img  src='<?php echo  MYS::getDir($thumb->thumb)."small/".$thumb->thumb;?> '  thumb= <?php echo $thumb->thumb;?>  />
			<p class='p1'>
				<b><?php 
							if($thumb->description)
								{
									echo $thumb->description;
								}else{
									$cateName=GalleryCategory::getCate($v,1);
									$cateName=$cateName->cname;
									if($cateName)
										{
											echo $cateName;
										}else
										{
											echo '案例展示';
										}
									}
								?>
				</b></p>
			<p class='p2'><b>Graphic Display</b></p>
			</div>
		</li>
	<?php endforeach;?>
	</ul>
	<div class='li'>

	</div>

	<div class='big'>
		<?php foreach($cid as $n) :?>
		<ul>
			<?php foreach (GalleryData::getData($n) as  $m) :?>
				<li>
				
					<img src='<?php echo  MYS::getDir($m->thumb).$m->thumb;?> ' thumb= <?php echo $m->thumb;?> />
				</li>
			<?php endforeach;?>
		</ul>

	<?php endforeach;?>
	</div>
</div>

</div>

<!--}图片展示结束-->
<script type="text/javascript">
$(function(){
	$(".round").roundabout({btnNext:".next",btnPrev:'.prev'});
})
</script>
</script>

</div>
</body>
