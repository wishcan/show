<style type='text/css'>
.row{
	width:960px;
}
.row img{
	width:160px;
	height:200px;
	cursor:pointer;
}
h3{
	border-bottom:solid 3px #84AB26;
}
</style>
<div class="center">
<?php
foreach($model as $v):
?>

<div class='row'>
<h3><?php echo $v->title;?></h3>
<?php foreach (Gallery::model()->getData($v->gid) as $data){
	
	$data['thumb']=Yii::app()->controller->getImgDir($data['thumb']).$data['thumb'];
	echo '<img src="'.$data['thumb'].'" />';
}?>

</div>

<?php endforeach;?>
</div>
