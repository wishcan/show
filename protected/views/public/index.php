<?php
$this->breadcrumbs=array(
	'公益互动',
);?>
<div class='top_title top_public'>
</div>

<div class='news pub'>
	<ul class='public_news'>
		<?php foreach($news as $v): ?>
			<li class='c'><?php echo "<a href='".Yii::app()->createUrl('public/content',array('nid'=>$v->id))."'>$v->title</a>"?>
				<span><?php echo substr($v->createTime,0,10);?></span>
								<p class='c desc'>
					<a href='<?php echo Yii::app()->createUrl('public/content',array('nid'=>$v->id)); ?>'>
					<?php if(empty($neirong->description))
						{	
							
													  
		  					echo trim(mb_substr(strip_tags($v->newsData->content),'0','120','UTF-8'),'\'').'...';
						}else
						{
							
							echo trim(strip_tags($v->decription,'\''));
						}	
					?>	

					</a>
				</p>
		</li>
		<?php endforeach;?>

	</ul>
	<div class='c'></div>
			<?php 	
				$this->widget('CLinkPager',array(
					'header'=>'',
					'firstPageLabel'=>'首页',
					'lastPageLabel'=>'末页',
					'prevPageLabel'=>'上一页',
					'nextPageLabel'=>'下一页',
					'pages'=>$pages,
					'maxButtonCount'=>13,
					'htmlOptions'=>array(
						'id'=>'pager'
							
							),
					));
				?>
		
	<!--公司概况介绍-->
<?php //echo trim($row->newsData->content,'\'');?>
<!--签名如果需要改则修改图片-->
</div>
<div class='log about_log l'>
<div class='tag' style='width:150px	'><s>●</s><b>爱心</b><span style='font-weight:700'>不是说的而是做的</span></div>
</div>