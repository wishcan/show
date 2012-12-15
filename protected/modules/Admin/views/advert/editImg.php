<h2><?php echo $row[0]['title'];?></h2>
<?php
foreach($row as $v):
?>

<form id="form<?php echo $v['adid'];?>" class="editIMg">
<img src='<?php echo $v["thumb"]?>' width="100" height="100"	/>
<span class="s1">添加链接（URL）</span><input type='text' name='link' >
<span class="s1">标题(TITLE)</span><input type='text' name='title' value="<?php if(!empty($v['title'])) echo $v['title'];?>">
				<a class="btn btn-success edit" href="<?php Yii::app()->createUrl('advert/edit',array('adi'=>$v['adid']))?>">
					<i class="icon-zoom-in icon icon-white"></i>
					编辑
				</a>
				<a class="btn btn-danger delete" href="javascript:void(0)">
					<i class="icon-zoom-in icon icon-white"></i>
					删除
				</a>	
</form>



<?php endforeach;?>