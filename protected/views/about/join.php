<?php
$this->breadcrumbs=array(
	'加入我们',
);?>
<div class='top_title top_join'>
</div>

<div class='news'>
	<!---->
<?php echo trim($row->newsData->content,'\'');?>
<!--签名如果需要改则修改图片-->
<div class='view_position'></div>
</div>
<!-- <div class='c'></div> -->

<div class='log about_log l'>
<div class='tag'><s>●</s><b>如果</b><span>您有年轻人的激情和自信请带上目标与理想加入我们</span></div>
</div> 	
<div class='zezhao'></div>
<div class='positions'>
	<b class='close'></b>
<img src='<?php echo Yii::app()->baseUrl?>/css/sangde/images/positions.jpg' />

</div>
<script type="text/javascript">
		$(function(){
			$(".view_position").click(function()
			{
				resize($(".positions"));
				$(".zezhao").show();
				$(".positions").show();
			})
			$(".close").click(function(){
				$(".zezhao").hide();
				$(".positions").hide();
			})
			function resize(element)
			{
						 dw=parseInt($(document).width());
						 dh=parseInt($(document).height());
						 ww=parseInt($(window).width());
						 wh=parseInt($(window).height());
						 pw=parseInt($(element).width());
						 ph=parseInt($(element).height());
						 bw=parseInt($(element).width());
						 bh=parseInt($(element).height());
						 sh=parseInt($(window).scrollTop());
						  $('.zezhao').css({
										"width":dw,
										'height':dh,
										
						})

						 $(element).css({
					 			"top":(wh-bh)/2+sh,
								"left":(ww-bw)/2,
						});
			
			}
			resize(".positions")
			$(window).resize(function(){
				resize(".positions");
			})

		})



</script>
