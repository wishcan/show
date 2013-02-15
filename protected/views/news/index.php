<?php
$this->breadcrumbs=array(
	'新闻视点',
);?>
<div class='top_title top_news'>
</div>

<div class='news'>
	<ul>
		<?php foreach($news as $v): ?>
			<li class='c'><?php echo "<a href='".Yii::app()->createUrl('news/content',array('nid'=>$v->id))."'>$v->title</a>"?>
				<span><?php echo substr($v->createTime,0,10);?></span>
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
<div class='tag' style='width:130px	'><s>●</s><b>舆论</b><span style='font-weight:700'>可以改变现在，也可以改变未来</span></div>
</div>