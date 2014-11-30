    
            <div class="modal-content">
            <form method="post" action="/<?php echo $lang_prefix ?>/languages/addlabel" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Add label</h4>
                </div><!--/modal-header -->
                
                <div class="modal-body clearfix">
                	<label class="col-md-4">Label name</label>
                    <div class="col-md-8">
                    	<input id="label-input" name="label_name" class="form-control" type="text" />
                        <div style="display: none;" class="errorMessage"><?php echo Trl::t()->getMsg("Enter value");?></div>
                    </div>
                </div><!--/modal-body -->
            
                <div class="modal-footer">
                	<div class="btns-holder col-md-8 col-md-offset-4 clearfix">
                        <button type="button" class="btn btn-info btn-sm pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="submit btn btn-primary btn-sm pull-right">Add label</button>
                    </div><!--/btns-holder -->
                </div><!--/modasl-footer -->
             </form>   
            </div><!--/modal-content -->
   