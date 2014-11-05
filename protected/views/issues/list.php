            <div class="col-md-10 content-holder" id="project">
            	<h4><span>Project name:</span> <span><?php echo $arrPrj['name']; ?></span></h4>
                <div class="users">	
                	<p><span>Разработчики:</span> <span>Вася Пупкин, Лена Петрова, Жана Фриске, Жан Клод Вандамм</span></p>
                    
                    <p><span>Пользователи:</span> <span>Вася Пупкин, Лена Петрова, Жана Фриске, Жан Клод Вандамм, Вася Пупкин, Лена Петрова, </span></p>
                </div>    
                
                <div class="act-holder">
                	<h4>Последние события:</h4>
                        <?php if(!empty($arrPrj['issues'])):?>
                        <?php foreach ($arrPrj['issues'] as $row):?>
                	<div class="act">
                    	<div class="act-top clearfix">
                        	<div class="act-top-info">
                            	<p>#23456789777</p>
                                <p class="new"> <?php echo $row['status'];?> </p>
                            </div><!--/act-top-info -->
                            <div class="act-top-head">
                            	<h3><?php echo $row['title']; ?></h3>
                                <p><?php echo $row['description']; ?> </p>
                            </div><!--/act-top-head -->
                            <div class="act-top-time">
                            	<p><span>Last uptades</span> <span>21.10.2014</span></p>
                            </div><!--/act-top-time -->
                        </div><!--/act-top -->
                        <div class="act-bottom clearfix">
                        	<div class="act-link-holder">
                            	<a href="/<?php echo $prefix_lng ?>/issues/getissue/<?php echo $row['id']?>"><span class="glyphicon glyphicon-eye-open"></span></a>
                            	<a href="#"><span class="glyphicon glyphicon-warning-sign"></span></a>
                            	<a href="#"><span class="glyphicon glyphicon-star-empty"></span></a>
                            </div><!--/act-link-holder -->
                            <div class="act-bottom-div">
                            	<span>assigned:</span>
                                <span>V.pupkin</span>
                            </div><!--/act-bottom-asign -->
                            <div class="act-bottom-div">
                            	<span>created:</span>
                                <span>
                                    <?php echo $row['fname'][0].".".$row['lname'];?>
                                </span>
                            </div><!--/act-bottom-asign -->
                            <div class="act-bottom-div">
                            	<span>prioryty:</span>
                                <span><strong>hight</strong></span>
                            </div><!--/act-bottom-asign -->
                            <div class="act-bottom-cat">
                            	<span>Category:</span>
                                <span class="text-capitalize">Category support</span>
                            </div><!--/act-bottom-asign -->
                            <div class="act-bottom-div">
                            	<span>due in:</span>
                                <span>21 days</span>
                            </div><!--/act-bottom-asign -->
                            <div class="act-bottom-div">
                            	<span class="glyphicon glyphicon-asterisk"></span>
                            </div><!--/act-bottom-asign -->
                        </div><!--/act-bottom -->
                    </div><!--/act -->
                    <?php endforeach;?>
                    <?php endif;?>
                    
                	
                    
                </div><!--/act-holder -->
            </div><!--/project -->

