	<style type="text/css">
 a{
		display: block;
		float: left;
		padding:5px 8px;
		margin:8px;
		background-color: #DDD;
		border-radius:2px;
		text-decoration:none;
		color:#666;
		min-width:100px;

	}
	a:hover{
		background-color: #999;
		color:#77F0FB;
		box-shadow: 0px 0px 5px rgba(186,188,182,1);

	}
	</style>
	<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
	<script type='text/javascript'>
	$(function(){
		var strTemp='';
		var i=0;
		var j=0;
		var len=$("a").length;
		for(i;i<len;i++)	
		{

			for(j;j<len-1;j++)
			{


				if(parseInt($("a").eq(j+1).text().length)<parseInt($("a").eq(j).text().length))
				{

					strTemp=$("a").eq(j).text();
					$("a").eq(j).text($("a").eq(j+1).text());
					$("a").eq(j+1).text(strTemp);
				}

			}
			j=0;
		}

	})
		
	</script>
	<div style='float:left;width:280px;'>
	<?php foreach($cate as $v):?>
		
	<a href='<?php echo $this->createAbsoluteUrl('gallery/show',array('cid'=>$v->id))?>' target="bank">
		<?php  echo $v->cname;?>
		
	 </a>
	 <?php endforeach;?>
	</div>