<div class="content" style='margin-left:0px;'>
        
        <div class="header">
            
            <h1 class="page-title">公司信息</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">后台</a> <span class="divider">/</span></li>
            <li class="active">公司信息</li>
        </ul>
<a href='<?php echo $this->createAbsoluteUrl('about/update',array('id'=>$model->id));?>'><button class="btn btn-primary"><i class="icon-plus"></i>修改信息</button></a>  
        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
  <div class="btn-group">
  </div>    
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'address',
		'keywords',
		'content',
		'telephone',
		'putNum',
		'id',
		'mobile',
	),
)); ?>
