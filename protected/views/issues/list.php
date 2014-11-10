            <div class="col-md-10 content-holder" id="project">
            	<h4><span>Project name:</span> <span><?php echo $arrPrj['name']; ?></span></h4>
                <div class="users">	
                	<p><span>Разработчики:</span> <span>Вася Пупкин, Лена Петрова, Жана Фриске, Жан Клод Вандамм</span></p>
                    
                    <p><span>Пользователи:</span> <span>Вася Пупкин, Лена Петрова, Жана Фриске, Жан Клод Вандамм, Вася Пупкин, Лена Петрова, </span></p>
                </div>    
                
                <div class="act-holder">
                    <div class="clearfix">
                        <div class="col-md-6"><h4>Last issues:</h4></div>
                        <div class="col-md-6">
                        	<a href="/issues/add/id/<?php echo  $arrPrj['id']; ?>" class="btn btn-success btn-sm">
                            	<span class="glyphicon glyphicon-plus-sign"></span>
                                Create issue
                            </a>
                        </div>
                    </div>
                        
                        
                        
                    <?php if(!empty($arrPrj['issues'])):?>
                    <?php foreach ($arrPrj['issues'] as $row):?>
                    
                    <div class="act">
                    	<div class="act-top clearfix">
                        	<div class="act-top-info">
                            	<p>#23456789777</p>
                                <p class="<?php echo $row['status_class'];?>"> <?php echo $row['status'];?> </p>
                            </div><!--/act-top-info -->
                            <div class="act-top-head">
                            	<div class="act-top-title clearfix">
                                	<div class="col-md-6">
                            			<h3><?php echo $row['title']?></h3>
                                    </div>
                                    <div class="act-top-time col-md-6">
                                        <p><span>Last uptades</span> <span>21.10.2014</span></p>
                                    </div><!--/act-top-time -->
                                </div>
                                
                                <p><?php echo $row['description']; ?></p>
                            </div><!--/act-top-head -->
                        </div><!--/act-top -->
                        <div class="act-bottom clearfix">
                        	<div class="act-link-holder">
                            	<a href="/<?php echo $prefix_lng ?>/issues/getissue/<?php echo $row['id']?>"><span class="glyphicon glyphicon-eye-open"></span></a>
                            	<a href="#"><span class="glyphicon glyphicon-warning-sign"></span></a>
                            	<a href="#"><span class="glyphicon glyphicon-star-empty"></span></a>
                            </div><!--/act-link-holder -->
                            <div class="act-bottom-assigned">
                            	<span>Created by:</span>
                                <span>
                                    <?php echo $row['fname'][0]; ?>.
                                    <?php echo $row['lname'];?>
                                </span>
                            </div><!--/act-bottom-asign -->
                            <div class="act-bottom-rised">
                            	<span>rised:</span>
                                <span>V.pupkin</span>
                            </div><!--/act-bottom-asign -->
                            <div class="act-bottom-prio">
                            	<span>prioryty:</span>
                                <span><strong><?php echo $row['prio']; ?></strong></span>
                            </div><!--/act-bottom-asign -->
                            <div class="act-bottom-cat">
                            	<span>Category:</span>
                                <span class="text-capitalize">Category support</span>
                            </div><!--/act-bottom-asign -->
                            <div class="act-bottom-due">
                            	<span>due in:</span>
                                <span>21 days</span>
                            </div><!--/act-bottom-asign -->
                        </div><!--/act-bottom -->
                    </div><!--/act -->
                	
                    <?php endforeach;?>
                    <?php endif;?>
                    
                	
                    
                </div><!--/act-holder -->
            </div><!--/project -->

