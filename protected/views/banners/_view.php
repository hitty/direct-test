<?php
/* @var $this BannersController */
/* @var $data Banners */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text')); ?>:</b>
	<?php echo CHtml::encode($data->text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status==1 ? 'On':'Off'); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('views_count')); ?>:</b>
	<?php echo CHtml::encode($data->views_count>0?$data->views_count:0); ?>
	<br />


</div>