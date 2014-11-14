

    <div class="modal-content">
     <form method="post" action="/<?php echo $lang_prefix ?>/users/changestatus/<?php echo $userData['id'];?>">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Change user status</h4>
        </div><!--/modal-header -->

        <div class="modal-body clearfix">
            <label class="col-md-4">Select role</label>
            <div class="col-md-8">
                    <select name="status" class="form-control">
                    <?php foreach($userData['statuses'] as $row):?>
                    <?php if($userData['status'] == $row['id']):?>    
                        <option selected="true" value="<?php echo $row['id']?>">
                            <?php echo $row['status']?>
                        </option>
                    <?php else:?>
                         <option value="<?php echo $row['id']?>">
                            <?php echo $row['status']?>
                         </option>
                    <?php endif;?>    
                    <?php endforeach; ?>
                    </select>
            </div>
        </div><!--/modal-body -->

        <div class="modal-footer">
            <div class="btns-holder col-md-8 col-md-offset-4 clearfix">
                <button type="button" class="btn btn-info btn-sm pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm pull-right">Save changes</button>
            </div><!--/btns-holder -->
        </div><!--/modasl-footer -->
     </form>   
    </div><!--/modal-content -->
        


