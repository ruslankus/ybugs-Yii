    
    <div class="modal-content">
        <form method="post" action="/<?php echo $prefix_lng ?>/issues/delres/<?php echo $res_id; ?>" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Delete resolution</h4>
            </div><!--/modal-header -->
            
            <div class="modal-body clearfix">
            	A you sure to delete resolution ?
                <input type="hidden" name="issue" value="<?php echo $issue; ?>" />
            </div><!--/modal-body -->
        
            <div class="modal-footer">
            	<div class="btns-holder col-md-8 col-md-offset-4 clearfix">
                    <button type="button" class="btn btn-info btn-sm pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm pull-right">Delete resol...</button>
                </div><!--/btns-holder -->
            </div><!--/modasl-footer -->
         </form>   
    </div><!--/modal-content -->