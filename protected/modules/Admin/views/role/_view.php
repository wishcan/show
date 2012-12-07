<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rid), array('view', 'id'=>$data->rid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rname')); ?>:</b>
	<?php echo CHtml::encode($data->rname); ?>
	<br />


</div>