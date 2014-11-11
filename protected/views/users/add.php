            <div class="col-md-10 content-holder" id="add-issue">
            	<div class="form-holder">
                	<h2>Add user</h2>
                    <form method="post" action="#">
                    <?php $form=$this->beginWidget('CActiveForm'); ?>
                        <div class="form-group clearfix">
                            <label class="col-md-2">User login </label>
                            <div class="col-md-9">
                                <input id="title" type="text" class="form-control" name="title">
                                <div class="errorMessage"> This is error</div>
                            </div>
                        </div>
                        
                        <div class="form-group clearfix">
                            <label class="col-md-2">User name </label>
                            <div class="col-md-9">
                                <input id="title" type="text" class="form-control" name="title">
                                <div class="errorMessage"> This is error</div>
                            </div>
                        </div>
                        
                        <div class="form-group clearfix">
                            <label class="col-md-2">User surname </label>
                            <div class="col-md-9">
                                <input id="title" type="text" class="form-control" name="title">
                                <div class="errorMessage"> This is error</div>
                            </div>
                        </div>
                        
                        <div class="form-group clearfix">
                            <label class="col-md-2">User mail </label>
                            <div class="col-md-9">
                                <input id="title" type="text" class="form-control" name="title">
                                <div class="errorMessage"> This is error</div>
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
                            	<button class="btn btn-sm btn-success" type="submit"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Add user</button>
                            </div>
                        </div>            
                    <?php $this->endWidget();?>
                </div><!--/form-holde -->
            </div><!--/content-holder-->
