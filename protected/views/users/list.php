<?php
    $cs = Yii::app()->clientScript;
    $cs->registerScriptFile(Yii::app()->baseUrl.'/js/users.js',CClientScript::POS_END);
?> 
  

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
                                
                            	<td class="role action admin">
                                    <span><?php echo $user['role']?></span>
                                    <a href="#" class="user-act" data-action="role"  data-user="<?php echo $user['id']?>"">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                </td>
                                <?php else:?>
                                <td class="role action change-status">
                                    <span><?php echo $user['role']?></span>
                                    <a href="#" class="user-act" data-action="role" data-user="<?php echo $user['id']?>">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                </td>
                                <?php endif;?>
                                
                            	<td class="role action status">
                                    <span><?php echo $user['status']?></span> 
                                    <a href="#" class="user-act" data-toggle="modal" data-action="status" data-user="<?php echo $user['id']?>">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                </td>
                            	<td class="action">
                                    <a href="/<?php echo $lang_prefix?>/users/addprj/<?php echo $user['id']?>" class="btn-edit" title="edit"><span class="glyphicon glyphicon-cog"></span></a>&nbsp;
                                    <a href="#" class="btn-delete user-act" title="delete"  data-toggle="modal" data-action="delete" data-user="<?php echo $user['id']?>" >
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php $n++; endforeach; ?>
                        </tbody>
                    </table>

                    <div class="modal-holder">
                        <div class="modal fade" id="changeStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <!-- Modal  goes here -->
                                
                            </div><!--/modal-dialog -->
                        </div><!-- /changeRole -->

                    </div>
                </div><!--/user-setting-holder -->
            </div><!--/content-holder / user-list -->
