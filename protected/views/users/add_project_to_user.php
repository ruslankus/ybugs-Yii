<?php
    $cs = Yii::app()->clientScript;
    $cs->registerScriptFile(Yii::app()->baseUrl.'/js/users.js',CClientScript::POS_END);
?> 
            <div class="col-md-10 content-holder" id="project-to-user">
                <div class="inner-holder clearfix">
                
                    <h4>Add projects to user: <strong><?php echo $userData['name']?> <?php echo $userData['surname']?></strong> </h4>
                    
                    <div class="filter-holder clearfix">
                        <div class="col-md-6">
                            <form action="#" method="post" class="clearfix">
                                <div class="col-md-9 input-holder"><input  type="text" placeholder="search project by name" /></div>
                                <div class="col-md-3 btn-hld"><button class="btn btn-info btn-sm">search</button></div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="tables-holder clearfix">
                        <div class="col-md-6 l-t-holder">
                        	<table>
                            	<thead>
                                	<tr>
                                    	<th>#</th>
                                        <th>Projecct namw</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>                                
                        	</table>
                            
                            <div class="table">
                            <?php $n = 1; foreach($arrAllPrj as $prj):?>
								<form class="tr" action="/<?php echo $lang_prefix?>/users/addprj/<?php echo $user_id?>" method="post">
                                	<span class="td">
                                        <?php echo $n;?>
                                    </span><!--/td -->
                                    <span class="td">
                                        <?php echo $prj['name'];?>
                                        <input type="hidden" value="<?php echo $prj['id']?>" name="prj_id" />
                                    </span><!--/td -->
                                    <span class="td">
                                        <button data-prj="<?php echo $prj['id']?>" class="btn-add-prj btn btn-success btn-xs">
                                            <span class="glyphicon glyphicon-arrow-right"></span>
                                        </button>
                                    </span><!--/td -->
                                </form>
                            <?php $n++; endforeach; ?>                        
						   </div><!--/table -->
                            
                        </div><!--/ l-t-holder -->
                        <div class="col-md-6 r-t-holder">
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Projecct namw</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $n = 1; foreach($arrUsrPrj as $prj):?>    
                                    <tr id="pr_<?php echo $prj['id']?>">
                                        <td><?php echo $n?></td>
                                        <td><?php echo $prj['name'];?></td>
                                        <td>
                                            <a href="/<?php echo $lang_prefix?>/users/remprj/<?php echo $prj['rel_id']?>" class="btn btn-danger btn-xs">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php $n++; endforeach;?>    
                                </tbody>
                            </table>
                        </div><!--/ r-t-holder -->
                    </div><!-- /tables-holder -->
                    <div class="btn-back-holder">
                    	<a href="/<?php echo $lang_prefix?>/users/list" class="btn btn-info btn-sm">Back</a>
                    </div><!--/ btn-back-holder -->
                </div><!--/inner-holder -->
        	</div><!--/content-holder / project-to-user -->        
