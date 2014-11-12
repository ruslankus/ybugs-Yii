            <div class="col-md-10 content-holder" id="user-list">
            	<div class="user-setting-holder">
                    <div class="clearfix">
                        <div class="col-md-6">
                            <h2>User list</h2>
                        </div>
                        <div class="col-md-6">
                            <a href="/<?php echo $lang_prefix?>/users/add" class="btn btn-success btn-sm">
                                Add User
                            </a>
                        </div>
                    </div><!--/clearfix -->
                    <table class="table table-striped table-hover">
                    	<thead>
                        	<tr>
                            	<th>#</th>
                            	<th>Login</th>
                                <th>Name </th>
                            	<th>Email</th>
                            	<th>Role</th>
                            	<th>Status</th>
                            	<th>Actions</th>
                            </tr>
                    	</thead>
                        <tbody>
                        <?php $n = 1; foreach($users as $user):?>
                        	<tr>
                            	<td><?php echo $n?></td>
                            	<td><?php echo $user['login']; ?></td>
                                <td><?php echo $user['name']?>&nbsp;<?php echo $user['surname']?></td>
                            	<td><?php echo $user['email'];?></td>
                                <?php if($user['role'] == 3):?>
                            	<td class="role admin"><span><?php echo $user['role']?></span><a href="#" data-toggle="modal" data-target="#changeRole"><span class="glyphicon glyphicon-edit"></span></a></td>
                                <?php else:?>
                                <td class="role"><span><?php echo $user['role']?></span><a href="#" data-toggle="modal" data-target="#changeRole"><span class="glyphicon glyphicon-edit"></span></a></td>
                                <?php endif;?>
                            	<td class="status"><span><?php echo $user['status']?></span> <a href="#" data-toggle="modal" data-target="#changeStatus"><span class="glyphicon glyphicon-edit"></span></a></td>
                            	<td>
									<a href="#" class="btn-edit" title="edit"><span class="glyphicon glyphicon-cog"></span></a>
									<a href="#" class="btn-delete" title="delete"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        <?php $n++; endforeach; ?>
                        </tbody>
                    </table>

                    <div class="modal-holder">

                        <!-- Modal -->
                        <div class="modal fade" id="changeRole" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title">Change user role</h4>
                                    </div><!--/modal-header -->
                                    
                                    <div class="modal-body clearfix">
                                    	<label class="col-md-3">Select role</label>
                                        <div class="col-md-9">
                                        	<select class="form-control">
                                            	<option>Admin</option>
                                                <option>Developer</option>
                                                <option>User</option>
                                            </select>
                                        </div>
                                    </div><!--/modal-body -->
                                
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div><!--/modasl-footer -->
                                    
                                </div><!--/modal-content -->
                            </div><!--/modal-dialog -->
                        </div><!-- /changeRole -->
                        
                        
                        <div class="modal fade" id="changeStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title">Change user status</h4>
                                    </div><!--/modal-header -->
                                    
                                    <div class="modal-body clearfix">
                                    	<label class="col-md-3">Select role</label>
                                        <div class="col-md-9">
                                        	<select class="form-control">
                                            	<option>Admin</option>
                                                <option>Developer</option>
                                                <option>User</option>
                                            </select>
                                        </div>
                                    </div><!--/modal-body -->
                                
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div><!--/modasl-footer -->
                                    
                                </div><!--/modal-content -->
                            </div><!--/modal-dialog -->
                        </div><!-- /changeRole -->
                        
                    
                    </div>
                </div><!--/user-setting-holder -->
            </div><!--/content-holder / user-list -->
