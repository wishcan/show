<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('iid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->iid), array('view', 'id'=>$data->iid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aid')); ?>:</b>
	<?php echo CHtml::encode($data->aid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createTime')); ?>:</b>
	<?php echo CHtml::encode($data->createTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('index')); ?>:</b>
	<?php echo CHtml::encode($data->index); ?>
	<br />


</div>