<div class="content" style='margin-left:0px;'>
        
        <div class="header">
            
            <h1 class="page-title">公司信息</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">后台</a> <span class="divider">/</span></li>
            <li class="active">公司信息</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">

  <div class="btn-group">
  </div>    
</div>
<?php
$this->breadcrumbs=array(
    'Abouts'=>array('index'),
    $model->id,
);

$this->menu=array(
    array('label'=>'List About', 'url'=>array('index')),
    array('label'=>'Create About', 'url'=>array('create')),
    array('label'=>'Update About', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Delete About', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage About', 'url'=>array('admin')),
);
?>

<h1>View About #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'address',
        'keywords',
        'content',
        'telephone',
        'putNum',
        'id',
    ),
)); ?>

<a href='<?php echo Yii::app()->createUrl('Admin/About/update',array('id'=>$model->id));?>'>修改信息</a>