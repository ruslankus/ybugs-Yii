            <div class="col-md-10 content-holder" id="add-res">
            	<h5><span>Project name:</span> <span><?php echo $arrIssue['project']; ?></span></h5>
                <h4><span>Issues: </span><span><?php echo $arrIssue['title']; ?></span></h4>
            	
                <p class="descrition"><span>Описание проблемы :</span>
                	<span>
                    <?php echo $arrIssue['description']; ?>
                    </span>
                </p>
            
            	<div class="form-holder">
                	<h2>Создание и описение решения</h2>
                    <?php $form=$this->beginWidget('CActiveForm', array( 'enableAjaxValidation'=>false)); ?>
                       
                        <div class="form-group clearfix">
                           
                            <?php echo $form->label($form_mdl,'description',array('class' => 'col-md-2')); ?>
                            <div class="col-md-9">
                                <?php echo $form->textArea($form_mdl,'description',array('class' => 'form-control'))?>
                                <?php echo $form->error($form_mdl,'description');?>
                            </div>
                        </div> 
                       
                        <div class="form-group clearfix">
                        	<div class="col-md-offset-2 col-md-9 btn-holder">
                            	<button class="btn btn-sm btn-success" type="submit">
                                    <span class="glyphicon glyphicon-plus-sign">&nbsp;</span>
                                    <?php echo Trl::t()->getLabel('Create resolution');?>
                                </button>
                            </div>
                        </div>            
                    <?php $this->endWidget();?>
                </div><!--/form-holde -->
            </div><!--/content-holder-->
