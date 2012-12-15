

<style type="text/css">

</style>

<div class="table">
<table>
	<thead>
		<tr>
			<th>广告图</th>
			<th>页面</th>
			<th>广告位</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		<?php  foreach ($row as $k => $v):?>
		<tr class="<?php if($k%2==0) echo 'tr1';?>">
			<td>
				<a href="<?php echo $v['link'];?>">
					<img src="<?php echo $v['thumb']?>" />
				</a>

			</td>
			<td>1</td>
			<td>2</td>
			<td>
				<a class="btn btn-success edit" href="<?php Yii::app()->createUrl('advert/edit',array('adi'=>$v['adid']))?>">
					<i class="icon-zoom-in icon icon-white"></i>
					编辑
				</a>
				<a class="btn btn-danger delete" href="javascript:void(0)">
					<i class="icon-zoom-in icon icon-white"></i>
					删除
				</a>				
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>


</table>
</div>


