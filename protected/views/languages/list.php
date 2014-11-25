            <div class="col-md-10 content-holder" id="translation">
            	<div class="form-holder">
                	<div> <a>Messages</a> / <a> Labels</a> </div>
                    <div class="table-holder">
                    
                     	<select>
                            <?php foreach($arrSelect as $key => $value):?>
                                <?php if($key == $lang_prefix):?>    
                        	<option selected="true" value="<?php echo $key?>"><?php echo $value?></option>
                                <?php else:?>
                        	<option value="<?php echo $key?>"><?php echo $value?></option> 
                                <?php endif;?>
                            <?php endforeach;?>  
                        	
                        </select>
                        
                        
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
                            	<tr>
                                	<td><?php echo $n;?></td>
                                    <td><?php echo $row['label'];?></td>
                                    <td><input type="text" value="<?php echo $row['value']?>"></td>
                                    <td>
                                    	<a href="#">Edit</a>
                                    </td>
                                </tr>
                            <?php $n++; endforeach;?>                            
                            </tbody>
                    	</table>
                    </div>
                </div><!--/form-holde -->
            </div><!--/content-holder-->
