<?php /* @var $this ProjectsController */ ?>
<?php /* @var $form CActiveForm */ ?>
<?php /* @var $form_mdl ProjectForm */ ?>
<?php /* @var $users Users[] */ ?>
<?php /* @var $developers Users[] */ ?>

<?php $form=$this->beginWidget('CActiveForm', array('id' =>'login-form','enableAjaxValidation'=>false,'htmlOptions'=>array('class'=>'clearfix'))); ?>

<?php echo $form->label($form_mdl,'name'); ?>:<br>
<?php echo $form->textField($form_mdl,'name');?>
<?php echo $form->error($form_mdl,'name'); ?>

<hr>

<?php echo $form->label($form_mdl,'description'); ?>:<br>
<?php echo $form->textArea($form_mdl,'description') ?>
<?php echo $form->error($form_mdl,'description'); ?>

<hr>

<?php echo $form->label($form_mdl,'developers') ?>:<br>
<?php foreach($developers as $developer): ?>
    <label><?php echo $developer->name.' '.$developer->surname; ?></label>
    <input type="checkbox" name="ProjectForm[developers][<?php echo $developer->id; ?>]"><br>
<?php endforeach; ?>
<?php echo $form->error($form_mdl,'developers'); ?>

<hr>

<?php echo $form->label($form_mdl,'users') ?>:<br>
<?php foreach($users as $user): ?>
    <label><?php echo $user->name.' '.$user->surname; ?></label>
    <input type="checkbox" name="ProjectForm[users][<?php echo $user->id; ?>]"><br>
<?php endforeach; ?>
<?php echo $form->error($form_mdl,'users'); ?>

<hr>

<input type="submit">

<?php $this->endWidget(); ?>