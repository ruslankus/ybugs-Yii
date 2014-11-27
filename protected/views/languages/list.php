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
                        	<form method="post" action="#">
                                <select id="lng_sel">
                                <?php foreach($arrSelect as $key => $value):?>
                                    <?php if($key == $lang_prefix):?>    
                                        <option selected="true" value="<?php echo $key?>"><?php echo $value?></option>
                                    <?php else:?>
                                        <option value="<?php echo $key?>"><?php echo $value?></option> 
                                    <?php endif;?>
                                <?php endforeach;?>  
                                
                                </select>
                                
                                <a href="#" class="btn btn-sm btn-info">Add Label </a>
                        	
                            
                            	<input type="text" placeholder="serch label" />
                                <button class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span>Search</button>
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
                            <tbody>
                                <?php $n = 1;  foreach($arrLabel as $row):?>
                            	<form>
                            	<tr>
                                	<td><?php echo $n; ?></td>
                                    <td><?php echo $row['label'];?></td>
                                    <td><input type="text" value="<?php echo $row['value']?>" /></td>
                                    <td>
                                    	<a href="#"><span class="glyphicon glyphicon-floppy-disk"></span></a> 
                                        <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                                </form>
                                <?php endforeach;?>
                            	
                            </tbody>
                    	</table>
                    </div><!--/table-holder -->
             </div>       	
            </div><!--/content-holder-->

