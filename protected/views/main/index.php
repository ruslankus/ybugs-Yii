            <div class="col-md-10 content-holder" id="index">
                <?php if($role == 3):?>
                <div class="clearfix">
                    <div class="create-prj-btn-holder  col-md-push-6  col-md-6">
                        <a href="/<?php echo $prefix_lng;?>/projects/add" class=" pull-right btn btn-success btn-sm">
                            <span class="glyphicon glyphicon-plus-sign"></span>
                            Create Project
                        </a>
                    </div>
                </div>
                <?php endif;?>
                <div class="projects-holder">                    
                   
                    <?php foreach($arrData as $row):?>
                    <div class="project">
                    	<div class="project-top clearfix">
                        	<div class="col-md-8">
                            	<h3><a href="/<?php echo $prefix_lng;?>/issues/list/<?php echo $row['id'];?>"><?php echo $row['name'];?></a></h3>
                                <p>Дата созaдания: 05.10.2014</p>
                            </div>
                            <div class="col-md-4">
								<a href="#" title="edit"><span class="glyphicon glyphicon-cog"></span></a>                            
								<a href="#" title="delete"><span class="glyphicon glyphicon-trash"></span></a>                            
                            </div>
                        </div><!--/act-top -->
                        <div class="project-bottom clearfix">
                        	<div class="proj-prio">Приоритет<span>высокий </span></div>
                        	<div class="proj-develop">Разработчики: 4  </div>
                        	<div class="proj-user">Пользователи: 10</div>
                        	<div class="proj-issues">Проблемы: 3 </div>
                        	<div>Решенные проблемы: 2</div>
                        </div><!--/act-bottom -->
                    </div><!--/project -->
                    <?php endforeach;?>
            	</div><!--/act-holder -->
        </div> <!--/content -holder -->  
