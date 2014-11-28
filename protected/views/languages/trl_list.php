 <?php
$cs = Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl.'/js/trans.js',CClientScript::POS_END);
?> 
 
            <div class="col-md-10 content-holder" id="translation">
            <div class="inner-holder">
            	<div class="tr-header clearfix">
                	<div class="col-md-6"><h2>Header</h2></div>
                	<div class="col-md-6 btns-holder">
                    	<a class="btn btn-sm btn-success passive">Messages</a>&nbsp;
                        <a class="btn btn-sm btn-success "> Labels</a>
                    </div>
                </div><!--tr-header  -->
                    <div class="table-holder">
                    	<div class="filters">
                        	<form method="post" action="/<?echo $lang_prefix?>/languages/search">
                                <select name="sel_lng" data-prefix="<?php echo $lang_prefix?>" id="lng_sel">
                                <?php foreach($arrSelect as $key => $value):?>
                                    <?php if($key == $select_lng):?>     
                                        <option selected="true" value="<?php echo $key?>"><?php echo $value?></option>
                                    <?php else:?>
                                        <option value="<?php echo $key?>"><?php echo $value?></option> 
                                    <?php endif;?>
                                <?php endforeach;?>  
                                
                                </select>
                                
                                <a href="#" class="btn btn-sm btn-info">Add Label </a>
                        	
                            
                            	<input type="text" name="serch_label" placeholder="serch label" />
                                <button type="submit" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span>Search</button>
                            </form>
                        </div>
                        <table class="table">
                        	<thead>
                             	<tr>
                                	<th>#</th>
                                	<th>labels</th>
                                	<th>translation</th>
                                	<th>action</th>
                                </tr>
                            </thead>
                         </table>   
                            
                        <div class="div-table">
                            <?php $n = 1;  foreach($arrLabel as $row):?> 
                        	<form class="tr" method="post" action="/<?echo $lang_prefix ?>/languages/save/<?php echo $row['id']?>">
                            	<span class="td"><?php echo $n; ?></span>
                                <span class="td">
                                    <?php echo $row['label'];?>
                                    <input type="hidden" name="curr_lng" value="<?php echo $select_lng; ?>" />
                                </span>
                                <span class="td"><input type="text" name="value" value="<?php echo $row['value']?>" /></span>
                                <span class="td">
                                    <button type="submin"><span class="glyphicon glyphicon-floppy-disk"></span></button> 
                                    <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
	                            </span>
                            </form>
                             <?php $n++; endforeach;?>
                        </div>
                            
                            
                    </div><!--/table-holder -->
             </div>       	
            </div><!--/content-holder-->

