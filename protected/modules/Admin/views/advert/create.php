<?php
$this->breadcrumbs=array(
	'Adverts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Advert', 'url'=>array('index')),
	array('label'=>'Manage Advert', 'url'=>array('admin')),
);
?>

<div class="content" style='margin-left:0px;'>
        
        <div class="header">
            
            <h1 class="page-title">

				<?php 
					if(empty($_GET['aid'])){
							echo	'广告位添加';
						}else{
							echo '上传广告图片';
						}
				?>
			</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">后台</a> <span class="divider">/</span></li>
            <li class="active">广告</li>
        </ul>

<div class="c"></div>


<?php if(empty($_GET['aid'])){
	 echo $this->renderPartial('_form', array('model'=>$model)); 
	}else{
		echo $this->renderPartial('_form2');

	}	
	
?>