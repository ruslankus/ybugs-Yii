<?php /* @var $this LanguagesController */ ?>
<?php /* @var $form_mdl LanguageForm */ ?>
<?php /* @var $form CActiveForm */ ?>
<?php /* @var $statuses array */ ?>

<?php $form=$this->beginWidget('CActiveForm', array('id' =>'login-form','enableAjaxValidation'=>false,'htmlOptions'=>array('class'=>'clearfix'))); ?>

<?php echo $form->label($form_mdl,'name'); ?>:<br>
<?php echo $form->textField($form_mdl,'name');?>
<?php echo $form->error($form_mdl,'name'); ?>

<br>

<?php echo $form->label($form_mdl,'prefix'); ?>:<br>
<?php echo $form->textField($form_mdl,'prefix');?>
<?php echo $form->error($form_mdl,'prefix'); ?>

<br>

<?php echo $form->label($form_mdl,'status');?>:<br>
<?php echo $form->dropDownList($form_mdl,'status',$statuses);?>
<?php echo $form->error($form_mdl,'status'); ?>

<br><br>

<input type="submit">

<?php $this->endWidget(); ?>