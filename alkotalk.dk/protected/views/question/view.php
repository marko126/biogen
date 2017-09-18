<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Questions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Question', 'url'=>array('index')),
	array('label'=>'Create Question', 'url'=>array('create')),
	array('label'=>'Update Question', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Question', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Question', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->text; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'text',
	),
)); ?>

<br>
<br>
<h3 style="margin-bottom: 0px;">Answers</h3>

<?php $answer = new Answer(); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'answer-grid',
                'dataProvider'=>$answer->getByQuestion($model->id),
                'filter'=>$answer,
                'htmlOptions'=>array('style'=>'width: 600px;padding-bottom:0px;'),
                'summaryText'=>'',
                'columns'=>array(
                        array (
                                'name'=>'text',
                                'header'=>'Text',
                        ),
                        array (
                                'name'=>'points',
                                'header'=>'Points',
                        ),
                        array (
                                'name'=>'extra_points_min',
                                'header'=>'Extra Points Min',
                        ),
                        array (
                                'name'=>'extra_points_max',
                                'header'=>'Extra Points Max',
                        ),
                        array(
				'class'=>'CButtonColumn',
				'template'=>'{delete1}',
				'buttons'=>
					array(
                                                'delete1'=>
							array(
								'label'=>'Delete',
								'url'=>'Yii::app()->createUrl("question/removeAnswer",array("question_id"=>$data->question_id,"id"=>$data->id))',
								'imageUrl'=>Yii::app()->request->baseUrl . "/assets/17f7c510/gridview/delete.png",
								'options'=>array('class'=>'delete-answer'),
                                                                'linkOptions'=>array('target'=>'_blank'),
								//'click'=>'alert("brisi");',
							),
					)
			),
                ),
)); 

?>

<div class="row buttons">
    <?php echo CHtml::button(Yii::t('messages','Add answer'), array(
           'onclick'=>'$("#answer-create").dialog("open"); return false;',
    ));?>
</div>

<?php 
        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id'=>'answer-create',
            'options'=>array(
                'title'=>'Add answer',
                'autoOpen'=>false,
            ),
        ));

        $form1  = $this->beginWidget('CActiveForm', array(
                'id'=>'answer-form',
                'enableAjaxValidation'=>false,
        )); 
?>

        <?php echo $form1->errorSummary($answer); ?>
        
        <div class="row" style="margin-bottom: 20px">
                <?php echo $form1->labelEx($answer,'text').'<br>'; ?>
                <?php echo $form1->textArea($answer,'text', array('style'=>'width: 300px')); ?>
                <?php echo $form1->error($answer,'text'); ?>
        </div>

        <div class="row" style="margin-bottom: 20px">
                <?php echo $form1->labelEx($answer,'points').'<br>'; ?>
                <?php echo $form1->textField($answer,'points'); ?>
                <?php echo $form1->error($answer,'points'); ?>
        </div>

        <div class="row" style="margin-bottom: 20px">
                <?php echo $form1->labelEx($answer,'extra_points_min').'<br>'; ?>
                <?php echo $form1->textField($answer,'extra_points_min'); ?>
                <?php echo $form1->error($answer,'extra_points_min'); ?>
        </div>

        <div class="row" style="margin-bottom: 20px">
                <?php echo $form1->labelEx($answer,'extra_points_max').'<br>'; ?>
                <?php echo $form1->textField($answer,'extra_points_max'); ?>
                <?php echo $form1->error($answer,'extra_points_max'); ?>
        </div>

        <?php $this->endWidget(); ?>

        <br>
        <div class="row buttons">
                <?php echo CHtml::ajaxButton(
                        Yii::t('messages','Add answer'),
                        CHtml::normalizeUrl(array('question/addAnswer', 'id'=>$model->id)),
                        array(
                                'type'=>'POST',
                                'data'=>'js: 
                                        {
                                                \'text\':$("#Answer_text").val(),
                                                \'points\':$("#Answer_points").val(),
                                                \'extra_points_min\':$("#Answer_extra_points_min").val(),
                                                \'extra_points_max\':$("#Answer_extra_points_max").val(),
                                        }',
                                'success'=>'js: 
                                        function(data){
                                                $("#answer-create").dialog("close"); 
                                                $("#Answer_text").val("");
                                                $("#Answer_points").val("");
                                                $("#Answer_extra_points_min").val("");
                                                $("#Answer_extra_points_max").val("");
                                                $.fn.yiiGridView.update("answer-grid");
                                        }'
                        ),
                        array('id'=>'select-submit-button-answer')); 
                ?>
        </div>
        
        <?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>