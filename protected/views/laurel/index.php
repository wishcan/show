
<?php
$this->breadcrumbs=array(
	'尚德殊荣',
);
$this->pageTitle=Yii::app()->name . ' - 公司殊荣';?>


<div class='top_title top_laurel'>
</div>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/css/sangde/js/jquery.roundabout.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/css/sangde/js/roundshow.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/css/sangde/js/li.js"></script>
<!--[if lt IE 8 ]><link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/css/i8.css"><![endif]-->
<div class='imgs laurel'>
		<div class='prev'></div>
		<div class='next'></div>
	<ul class='round'>
	<?php foreach ($cid as $v):?>
	<?php  $thumb = GalleryData::getThumb($v);if(!$thumb)break;?>
		<li>
			<div class='img'>
			<img  src='<?php  echo  MYS::getDir($thumb->thumb)."small/".$thumb->thumb;?>' thumb= <?php echo $thumb->thumb;?> />
			<p class='p1'><b><?php 
							if($thumb->description){echo $thumb->description;}else{ echo '尚德殊荣';}?></b></p>
			<p class='p2'>The company award </p>
			</div>
		</li>
		<?php endforeach;?>
	</ul>
<style type="text/css">

	</style>
	<div class='big'>
		<?php foreach($cid as $n) :?>
		<ul>
			<?php foreach (GalleryData::getData($n) as  $m) :?>
				<li>
					<img src='<?php if(!($m->thumb)) break; echo  MYS::getDir($m->thumb).$m->thumb;?> ' thumb= <?php echo $m->thumb;?> />
				</li>
			<?php endforeach;?>
		
		</ul>
	<?php endforeach;?>
	
	</div>
<script type="text/javascript">
	
	$(function(){
			$(".round").roundabout({btnNext:".next",btnPrev:'.prev',minOpacity:0.3,shape: "waterWheel"});

	})
</script>

</div>
<div class='li'>

</div>
<!-- <div class='c'></div> --> 
<div class='log about_log r'>
<div class='tag'><s>●</s><b>价值</b><span>体现是我们孜孜不倦的追求</span></div>
</div> 	
<div class='zezhao'></div>


