 <div class="content-holder" id="login">
            	
     			<div class="form-holder">
                	<h2>Вход в систему</h2>
                    <form action="#" method="post" class="clearfix">
                    <?php $form=$this->beginWidget('CActiveForm',array('enableAjaxValidation'=>false,'htmlOptions'=>array('class'=>'clearfix'))); ?>
                        <div class="control-holder clearfix"> 
                            <?php echo $form->label($model,'username');?>
                            <div>
                            	<?php echo $form->textField($model,'username');?>
                            	<?php echo $form->error($model,'username'); ?>
                            </div>
                        </div><!--/form-holder --> 
                        
                        <div class="control-holder clearfix"> 
                            <?php echo $form->label($model,'password');?>
                            <div>
                                <?php echo $form->passwordField($model, 'password', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model,'password'); ?>  
                            </div>
                        </div><!--/pas-holder -->
                        
                        <div class="control-holder clearfix">
                        	<div class="btn-holder">
                            	<button type="submit" class="btn btn-success btn-sm"> Enter</button>&nbsp;
                                <a href="#">Forget password</a>
                            </div>
                        </div> 
                    <?php $this->endWidget();?>
            	</div><!--/form-holder -->
            </div><!--/content-holder-->