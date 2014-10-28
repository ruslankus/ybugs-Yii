<?php /* @var $this IssuesController */ ?>
<?php /* @var $form CActiveForm */ ?>
<?php /* @var $form_mdl IssueForm */ ?>
<?php /* @var $project Projects */ ?>

<?php $form=$this->beginWidget('CActiveForm', array('id' =>'login-form','enableAjaxValidation'=>false,'htmlOptions'=>array('enctype' => 'multipart/form-data'))); ?>

<?php echo $form->label($form_mdl,'description'); ?>:<br>
<?php echo $form->textArea($form_mdl,'description') ?>
<?php echo $form->error($form_mdl,'description'); ?>

<hr>

<?php echo $form->label($form_mdl,'files'); ?>:<br>
    <input type="file" name="IssueForm[files][0]" class="form-control file-sel">
<?php echo $form->error($form_mdl,'files'); ?>

<hr>

<input type="submit">

<?php $this->endWidget(); ?>