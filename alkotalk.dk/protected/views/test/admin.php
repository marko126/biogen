<?php
/* @var $this TestController */
/* @var $model Test */

$this->breadcrumbs=array(
	'Tests'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#test-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tests</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php echo CHtml::link('Export data',array('test/export')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'test-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'date_created',
                array(
			'name' => 'gender',
			'header' => 'Gender',
			'htmlOptions'=>array('style'=>'text-align: center;')
		),
		array(
			'name' => 'age',
			'header' => 'Age',
			'htmlOptions'=>array('style'=>'text-align: center;')
		),
		'school',
                array(
			'name' => 'points',
			'header' => 'Points',
			'htmlOptions'=>array('style'=>'text-align: center;')
		),
                'email_phone',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
