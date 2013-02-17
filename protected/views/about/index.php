<?php
$this->breadcrumbs=array(
	'关于我们',
);?>

<div class='top_title top_about	'>
</div>

<div class='news'>
	<!--公司概况介绍-->
<?php echo trim($row->newsData->content,'\'');?>
<!--签名如果需要改则修改图片-->
<p class='qianm'><img src='./css/sangde/images/qianm.png' /><p>
</div>
<div class='log about_log l'>
<div class='tag'><s>●</s><b>价值</b><span>体现是我们孜孜不倦的追求</span></div>
</div>
