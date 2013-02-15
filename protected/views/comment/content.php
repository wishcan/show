<?php
$this->breadcrumbs=array(
	'观点评论'=>Yii::app()->createUrl('comment'),
	'内容'
);?>
<div class='top_title top_comment'>
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
		
		
</div>
<div class='log about_log l'>
<div class='tag' style='width:150px	'><s>●</s><b>理论</b><span style='font-weight:700'>非比实践，观点在于讨论</span></div>
</div>