<?php
/* @var $this ResultController */
/* @var $data Result */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('test_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->test_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score_min')); ?>:</b>
	<?php echo CHtml::encode($data->score_min); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score_max')); ?>:</b>
	<?php echo CHtml::encode($data->score_max); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text')); ?>:</b>
	<?php echo CHtml::encode($data->text); ?>
	<br />


</div>