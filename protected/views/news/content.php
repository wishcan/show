<?php
$this->breadcrumbs=array(

	'新闻视点'=>Yii::app()->createUrl('news'),
	'内容',
);?>
<div class='top_title top_news'>
</div>

<div class='news'>
	<h3 class='title'><?php echo $row->title?></h3>
	<div class='neirong'>
		
			<?php
					$this->beginWidget('CHtmlPurifier');	
					echo trim($row->newsData->content,'\''); 
					$this->endWidget();
				?>	
	</div>
		
		
	<!--公司概况介绍-->
<?php //echo trim($row->newsData->content,'\'');?>
<!--签名如果需要改则修改图片-->
</div>
<div class='log about_log l'>
<div class='tag' style='width:130px	'><s>●</s><b>舆论</b><span style='font-weight:700'>可以保护现在，也可以改变未来</span></div>
</div>