 <?php
$cs = Yii::app()->clientScript;
$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/lightbox.css');
$cs->registerScriptFile(Yii::app()->baseUrl.'/js/lightbox.js',CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->baseUrl.'/js/issues.js',CClientScript::POS_END);
?>              
            <div class="col-md-10 content-holder" id="issues">
            	<h5><span>Project name:</span> <span><?php echo $arrIssue['project_name']; ?></span></h5>
                   
                <h4><span>Issues: </span><span><?php echo $arrIssue['title'];?> </span></h4>
                <h5><span>Created by : </span><span><?php echo $arrIssue['fname'][0]?>.<?php echo $arrIssue['lname']; ?></span></h5>
                <p class="condition"><span>Состояние :</span>&nbsp;
                    <span class="badge <?php echo $arrIssue['class_name']?>"><?php echo $arrIssue['status']?></span>
                </p>
                <?php if($arrIssue['picture']):?>
                 <p class="photo">
                    <span><?php echo Trl::t()->getLabel('Screenshoot');?>: </span>
                    <a href="/images/uploaded/<?php echo $arrIssue['picture'];?>" data-lightbox="image"><?php echo $arrIssue['picture'];?></a>
                </p>
                <?php endif;?>
                <p class="descrition"><span>Описание проблемы :</span>
                	<span>
                    <?php echo $arrIssue['description'];?>    
                    </span>
                </p>
                
                
                <div class="res-holder">
                    <div class="clearfix">
                        <div class="col-md-6"><h4 class="text-left"><?php echo Trl::t()->getLabel('resolutions'); ?>:</h4></div>
                         <?php if($userData['role_id'] == 3): ?>   
                        <div class="col-md-6">
                            <a href="/<?php echo $prefix_lng ?>/resolutions/add/<?php echo $arrIssue['id']?>" class="btn btn-success btn-sm">
                                <span class="glyphicon glyphicon-plus-sign"></span>
                                Create resolution
                            </a>
                        </div>
                        <?php endif;?>
                    </div>
                    <?php if(!empty($arrIssue['reslt'])):?>
                    <?php foreach ($arrIssue['reslt'] as $row):?>
                	<div class="resolitions">
                    	<div class="res-top clearfix">
                        	<div class="col-md-6">
                                <p>#1356418613541  <a href="#" title="edit">
                                        <span class="glyphicon glyphicon-cog"></span>
                                    </a>&nbsp;
                                    <a href="#" class="del-res" data-lng="<?php echo $prefix_lng;?>" data-issue="<?php echo $arrIssue['id']?>" data-res="<?php echo $row['id'] ?>"  title="delete">
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
                
                <div class="modal-holder">
                    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            
                            <!-- Modal  goes here -->

                        </div><!--/modal-dialog -->
                    </div><!-- /modal -->
                </div><!--/modal-holder -->

            </div><!--/issues -->
