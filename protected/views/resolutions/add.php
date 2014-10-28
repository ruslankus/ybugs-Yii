<?php /* @var $this ResolutionsController */ ?>
<?php /* @var $form_mdl ResolutionForm */ ?>
<?php /* @var $form CActiveForm */ ?>
<?php /* @var $statuses array */ ?>

<?php $form=$this->beginWidget('CActiveForm', array('id' =>'login-form','enableAjaxValidation'=>false,'htmlOptions'=>array('class'=>'clearfix'))); ?>

<?php echo $form->label($form_mdl,'description'); ?>:<br>
<?php echo $form->textArea($form_mdl,'description');?>
<?php echo $form->error($form_mdl,'description'); ?>

<br>

<?php echo $form->label($form_mdl,'issue_status');?>:<br>
<?php echo $form->dropDownList($form_mdl,'issue_status',$statuses);?>
<?php echo $form->error($form_mdl,'issue_status'); ?>

<br><br>

<input type="submit">

<?php $this->endWidget(); ?>