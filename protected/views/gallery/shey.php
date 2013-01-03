<style type='text/css'>
.row{
	width:960px;
}

h3{
	border-bottom:solid 3px #84AB26;

}
.center img{
	width:160px;
}
</style>
<div class="center">
<div class='row'>

<?php
foreach($model as $v):
	$data['thumb']=Yii::app()->controller->getImgDir($v['thumb']).$v['thumb'];
	echo '<img src="'.$data['thumb'].'" />';
	endforeach;?>
</div>



</div>
