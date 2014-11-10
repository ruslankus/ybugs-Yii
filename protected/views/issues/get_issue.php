            <div class="col-md-10 content-holder" id="issues">
            	<h5><span>Project name:</span> <span><?php echo $arrIssue['project_name']; ?></span></h5>
                   
                <h4><span>Issues: </span><span><?php echo $arrIssue['title'];?> </span></h4>
                <h5><span>Created by : </span><span><?php echo $arrIssue['fname'][0]?>.<?php echo $arrIssue['lname']; ?></span></h5>
                <p class="condition"><span>Состояние :</span>&nbsp;
                    <span class="badge <?php echo $arrIssue['class_name']?>"><?php echo $arrIssue['status']?></span>
                </p>
                
                <p class="descrition"><span>Описание проблемы :</span>
                	<span>
                    <?php echo $arrIssue['description'];?>    
                    </span>
                </p>
                
                
                <div class="res-holder">
                	<div class="clearfix">
                            <div class="col-md-6"><h4><?php echo Trl::t()->getLabel('resolutions'); ?>:</h4></div>
                        <div class="col-md-6">
                        	<a href="/<?php echo $prefix_lng ?>/resolutions/add/<?php echo $arrIssue['id']?>" class="btn btn-success btn-sm">
                            	<span class="glyphicon glyphicon-plus-sign"></span>
                                Create resolution
                            </a>
                        </div>
                    </div>
                    <?php if(!empty($arrIssue['reslt'])):?>
                    <?php foreach ($arrIssue['reslt'] as $row):?>
                	<div class="resolitions">
                    	<div class="res-top clearfix">
                        	<div class="col-md-6">
                                <p>#1356418613541  <a href="#" title="edit">
                                        <span class="glyphicon glyphicon-cog"></span>
                                    </a>&nbsp;
                                    <a href="#" title="delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </p>
                            </div>
                            
                        	<div class="col-md-6">
                            <p>
                                <span>Created: 21.10.2014</span>&nbsp;&nbsp;
                                <span>By: <?php echo $row['name'] ?> <?php echo $row['surname'] ?></span>
                            </p>
                            </div>
                        </div><!--/top-head -->
                        <div class="res-bottom">
                       		<p><?php echo $row['remark'];?> </p> 
                        </div><!--/res-bottom -->
                    </div><!--/resoliutions -->
                    <?php endforeach;?>
                    <?php else:?>
                    <p>No records</p>
                    <?php endif;?>    
                    
                </div><!--/act-holder -->
            </div><!--/issues -->
