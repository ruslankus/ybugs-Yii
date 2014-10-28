<?php /* @var $this UsersController */ ?>
<?php /* @var $form_mdl UserForm */ ?>
<?php /* @var $form CActiveForm */ ?>
<?php /* @var $roles UserRoles */ ?>

<?php $form=$this->beginWidget('CActiveForm', array('id' =>'login-form','enableAjaxValidation'=>false,'htmlOptions'=>array())); ?>

<?php echo $form->label($form_mdl,'login'); ?>:<br>
<?php echo $form->textField($form_mdl,'login');?>
<?php echo $form->error($form_mdl,'login'); ?>

<hr>

<?php echo $form->label($form_mdl,'password'); ?>:<br>
<?php echo $form->textField($form_mdl,'password');?>
<?php echo $form->error($form_mdl,'password'); ?>

<hr>

<?php echo $form->label($form_mdl,'name'); ?>:<br>
<?php echo $form->textField($form_mdl,'name');?>
<?php echo $form->error($form_mdl,'name'); ?>

<hr>

<?php echo $form->label($form_mdl,'surname'); ?>:<br>
<?php echo $form->textField($form_mdl,'surname');?>
<?php echo $form->error($form_mdl,'surname'); ?>

<hr>

<?php echo $form->label($form_mdl,'email'); ?>:<br>
<?php echo $form->textField($form_mdl,'email');?>
<?php echo $form->error($form_mdl,'email'); ?>

<hr>

<?php echo $form->label($form_mdl,'role');?>:<br>
<?php echo $form->dropDownList($form_mdl,'role',$roles);?>
<?php echo $form->error($form_mdl,'role'); ?>

<hr>

<input type="submit">

<?php $this->endWidget(); ?>