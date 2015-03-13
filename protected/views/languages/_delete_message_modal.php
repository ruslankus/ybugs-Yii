    <div class="modal-content">
        <form method="post" action="/<?php echo $lang_prefix ?>/languages/delMes/<?php echo $id ?>" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo Trl::t()->getLabel('close')?></span></button>
                <h4 class="modal-title"><?php echo Trl::t()->getLabel('delete label')?></h4>
            </div><!--/modal-header -->
            
            <div class="modal-body clearfix">
            	<?php echo Trl::t()->getLabel('delete label confirm')?> : <?php echo $label_name?>?
            </div><!--/modal-body -->
        
            <div class="modal-footer">
            	<div class="btns-holder col-md-8 col-md-offset-4 clearfix">
                    <button type="button" class="btn btn-info btn-sm pull-left" data-dismiss="modal"><?php echo Trl::t()->getLabel('close')?></button>
                    <button type="submit" class="btn btn-primary btn-sm pull-right"><?php echo Trl::t()->getLabel('delete label')?></button>
                </div><!--/btns-holder -->
            </div><!--/modasl-footer -->
         </form>   
    </div><!--/modal-content -->