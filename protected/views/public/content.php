<?php
$this->breadcrumbs=array(

	'公益互动'=>Yii::app()->createUrl('public'),
	'内容',
);?>
<div class='top_title top_public'>
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
<div class='tag' style='width:150px	'><s>●</s><b>爱心</b><span style='font-weight:700'>不是说的而是做的</span></div>
</div>