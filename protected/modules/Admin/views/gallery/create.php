<?php
$this->breadcrumbs=array(
	'Galleries'=>array('index'),
	'Create',
);

?>

<?php $url=Yii::app()->request->baseUrl;?>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<div class="content" style='margin-left:0px;'>
        
        <div class="header">
            
            <h1 class="page-title">添加图片信息</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">后台</a> <span class="divider">/</span></li>
            <li class="active">图片信息</li>
        </ul>
<div class="c"></div>

<?php echo $this->renderPartial('_form', array('model'=>$model,'cate'=>$cate)); ?>