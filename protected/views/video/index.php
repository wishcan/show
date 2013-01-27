<style type='text/css'>
.video li{
	float:left;
	padding:5px;
	width:200px;
	height:170px;
	margin:10px;
	overflow:hidden;
	text-align:bottom;
	background:#fff;
	position:relative;
	z-index:5;

}
.video li img{
	width:200px;
	height:150px;
}
.video li a{
	font-size:14px;
	display:block;
}
.von{
	z-index:999;
}
.video li a span{
	font-size:12px;
}
</style>


<div class='center'>
	<ul class='video'> 
	<?php foreach ($data as $v): 
	?>
		<li>
		<a href='<?php echo Yii::app()->createUrl('video/kankan',array('vid'=>$v->id));?>'>
			<img src='<?php echo $v->thumb;?>' />
			<p><?php echo $v->title;?></p>
		</a>
		</li>
		<?php endforeach;?>
	</ul>
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

</div>
