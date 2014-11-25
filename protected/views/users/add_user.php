            <div class="col-md-10 content-holder" id="add-user">
            	<div class="form-holder">
                	<h2>Add user</h2>
                   <?php $form=$this->beginWidget('CActiveForm'); ?>
                        <div class="form-group clearfix">
                        
                            <?php echo $form->label($form_mdl,'login',array('class' => 'col-md-2'))?>
                            <div class="col-md-9">                                
                                <?php echo $form->textField($form_mdl,'login',array('class'=>'form-control'));?>
                                <?php echo $form->error($form_mdl,'login');?>
                            </div>
                        </div>
                        
                        <div class="form-group clearfix">
                             <?php echo $form->label($form_mdl,'name',array('class' => 'col-md-2'))?>
                            <div class="col-md-9">
                                 <?php echo $form->textField($form_mdl,'name',array('class'=>'form-control'));?>
                                <?php echo $form->error($form_mdl,'name');?>
                            </div>
                        </div>
                        
                        <div class="form-group clearfix">
                            <?php echo $form->label($form_mdl,'surname',array('class' => 'col-md-2'))?>
                            <div class="col-md-9">
                                 <?php echo $form->textField($form_mdl,'surname',array('class'=>'form-control'));?>
                                 <?php echo $form->error($form_mdl,'surname');?>
                            </div>
                        </div>
                        
                        <div class="form-group clearfix">
                             <?php echo $form->label($form_mdl,'email',array('class' => 'col-md-2'))?>
                            <div class="col-md-9">
                                <?php echo $form->textField($form_mdl,'email',array('class'=>'form-control'));?>
                                 <?php echo $form->error($form_mdl,'email');?>
                            </div>
                        </div>
                        
                        <div class="form-group clearfix">
                            
                            <?php echo $form->label($form_mdl,'role',array('class' => 'col-md-2'))?>
                            <div class="col-md-9">
                            
                            <?php echo $form->dropDownList($form_mdl,'role',$roles,
                                    array('class' => 'form-control','id' => 'select'));?>
                            <?php echo $form->error($form_mdl,'role')?>
                            </div>
                        </div>
                        
                        <div class="form-group clearfix">
                        	<div class="col-md-offset-2 col-md-9 btn-holder">
                                <a href="/<?php echo $lang_prefix ?>/users" type="button" class="btn btn-info btn-sm pull-left" data-dismiss="modal">
                                    <?php echo Trl::t()->getLabel('close');?>
                                </a>
                            	<button class="btn btn-sm btn-success" type="submit"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Add user</button>
                            </div>
                        </div>            
                    <?php $this->endWidget();?>
                </div><!--/form-holde -->
            </div><!--/content-holder-->
