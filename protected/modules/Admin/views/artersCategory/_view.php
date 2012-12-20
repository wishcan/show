<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cateid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cateid), array('view', 'id'=>$data->cateid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cname')); ?>:</b>
	<?php echo CHtml::encode($data->cname); ?>
	<br />


</div>