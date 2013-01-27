<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('oid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->oid), array('view', 'id'=>$data->oid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thumb')); ?>:</b>
	<?php echo CHtml::encode($data->thumb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('opuName')); ?>:</b>
	<?php echo CHtml::encode($data->opuName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creatTime')); ?>:</b>
	<?php echo CHtml::encode($data->creatTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pubName')); ?>:</b>
	<?php echo CHtml::encode($data->pubName); ?>
	<br />


</div>