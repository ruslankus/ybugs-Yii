    
            <div class="modal-content">
            <form method="post" action="/<?php echo $lang_prefix ?>/languages/addMes" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo Trl::t()->getLabel('close')?></span></button>
                    <h4 class="modal-title"><?php echo Trl::t()->getLabel('add label')?></h4>
                </div><!--/modal-header -->
                
                <div class="modal-body clearfix">
                	<label class="col-md-4"><?php echo Trl::t()->getLabel('label name')?></label>
                    <div class="col-md-8">
                    	<input id="label-input" name="label_name" class="form-control" type="text" />
                        <div style="display: none;" class="errorMessage  duplicate"><?php echo Trl::t()->getMsg("Enter value");?></div>
                    </div>
                </div><!--/modal-body -->
            
                <div class="modal-footer">
                	<div class="btns-holder col-md-8 col-md-offset-4 clearfix">
                        <button type="button" class="btn btn-info btn-sm pull-left" data-dismiss="modal"><?php echo Trl::t()->getLabel('close')?></button>
                        <button type="submit" data-prefix="<?php echo $lang_prefix?>" class="submit btn btn-primary btn-sm pull-right"><?php echo Trl::t()->getLabel('add label')?></button>
                    </div><!--/btns-holder -->
                </div><!--/modasl-footer -->
             </form>   
            </div><!--/modal-content -->
   