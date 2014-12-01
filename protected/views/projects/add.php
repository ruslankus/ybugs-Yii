    <div class="col-md-10 content-holder" id="add-project">
    	<div class="form-holder">
        	<h2>Add project</h2>
           <?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>false)); ?>
                <div class="form-group clearfix">
                    <?php echo $form->label($form_mdl,'name',array('class' => 'col-md-2'))?>
                    <div class="col-md-9">
                        <?php echo $form->textField($form_mdl,'name',array('class'=>'form-control'));?>
                        <?php echo $form->error($form_mdl,'name');?>
                    </div>
                </div>
                
                <div class="form-group clearfix">
                    <?php echo $form->label($form_mdl,'description',array('class' => 'col-md-2'))?>
                    <div class="col-md-9">
                        <?php echo $form->textArea($form_mdl,'description',array('class'=>'form-control'));?>
                         <?php echo $form->error($form_mdl,'description');?>
                    </div>
                </div>
                
    
                
                <div class="form-group clearfix">
                	<div class="col-md-offset-2 col-md-9 btn-holder">
                        <a href="/<?php echo $prefix_lng ?>" type="button" class="btn btn-info btn-sm pull-left" data-dismiss="modal">Close</a>
                    	<button class="btn btn-sm btn-success" type="submit"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Add project</button>
                    </div>
                </div>            
           <?php $this->endWidget(); ?>
        </div><!--/form-holde -->
    </div><!--/content-holder-->