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
		<li><div><img src='<?php echo Yii::app()->baseUrl;?>/css/sangde/images/case.png' /></div></li>
		<li><div><img src='<?php echo Yii::app()->baseUrl;?>/css/sangde/images/case.png' /></div></li>
		<li><div><img src='<?php echo Yii::app()->baseUrl;?>/css/sangde/images/case.png' /></div></li>
		<li><div><img src='<?php echo Yii::app()->baseUrl;?>/css/sangde/images/case.png' /></div></li>
		<li><div><img src='<?php echo Yii::app()->baseUrl;?>/css/sangde/images/case.png' /></div></li>
		<li><div><img src='<?php echo Yii::app()->baseUrl;?>/css/sangde/images/case.png' /></div></li>
		<li><div><img src='<?php echo Yii::app()->baseUrl;?>/css/sangde/images/case.png' /></div></li>
		<li><div><img src='<?php echo Yii::app()->baseUrl;?>/css/sangde/images/case.png' /></div></li>
	</ul>
	<div class='li'>

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
