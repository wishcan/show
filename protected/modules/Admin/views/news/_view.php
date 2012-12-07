<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cid')); ?>:</b>
	<?php echo CHtml::encode($data->cid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('decription')); ?>:</b>
	<?php echo CHtml::encode($data->decription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createTime')); ?>:</b>
	<?php echo CHtml::encode($data->createTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('source')); ?>:</b>
	<?php echo CHtml::encode($data->source); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bl_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->bl_user_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('click')); ?>:</b>
	<?php echo CHtml::encode($data->click); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recomendation')); ?>:</b>
	<?php echo CHtml::encode($data->recomendation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tag')); ?>:</b>
	<?php echo CHtml::encode($data->tag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updateTime')); ?>:</b>
	<?php echo CHtml::encode($data->updateTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_id')); ?>:</b>
	<?php echo CHtml::encode($data->type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('home_cate')); ?>:</b>
	<?php echo CHtml::encode($data->home_cate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('home_top')); ?>:</b>
	<?php echo CHtml::encode($data->home_top); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('children_top')); ?>:</b>
	<?php echo CHtml::encode($data->children_top); ?>
	<br />

	*/ ?>

</div>