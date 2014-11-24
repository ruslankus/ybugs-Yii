<?php /* @var $this MainController */ ?>
<?php /* @var $form CActiveForm */ ?>
<?php /* @var $model LoginForm */ ?>

<?php $form=$this->beginWidget('CActiveForm', array('id' =>'login-form','enableAjaxValidation'=>false,'htmlOptions'=>array('class'=>'clearfix'))); ?>

<?php echo $form->label($model,'username');?>
<?php echo $form->textField($model,'username',array('class'=>'form-control'));?>
<?php echo $form->error($model,'username'); ?>


<?php echo $form->label($model,'password');?>
<?php echo $form->passwordField($model, 'password', array('class' => 'form-control')); ?>
<?php echo $form->error($model,'password'); ?>

<input type="submit">

<?php $this->endWidget(); ?>