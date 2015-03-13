<div class="filters">
	<form method="post" action="/<?php echo $lang_prefix?>/languages/searchMes">
        <select name="sel_lng" data-prefix="<?php echo $lang_prefix?>" id="lng_sel_mes">
        <?php foreach($arrSelect as $key => $value):?>
            <?php if($key == $select_lng):?>     
                <option selected="true" value="<?php echo $key?>"><?php echo $value?></option>
            <?php else:?>
                <option value="<?php echo $key?>"><?php echo $value?></option> 
            <?php endif;?>
        <?php endforeach;?>  
        
        </select>
        
       <a href="#" data-prefix="<?php echo $lang_prefix?>" class="add-mes btn btn-sm btn-info">Add Label </a>
	
    
    	<input id="search_label" type="text" name="serch_label" placeholder="serch message" value="<?php echo $search_val;?>" />
        <button type="submit" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span>Search</button>
    </form>
</div>

<table class="table">
	<thead>
     	<tr>
        	<th>#</th>
        	<th><?php echo Trl::t()->getLabel('labels')?></th>
        	<th><?php echo Trl::t()->getLabel('translations')?></th>
        	<th><?php echo Trl::t()->getLabel('actions')?></th>
        </tr>
    </thead>
 </table>   
    
<div class="div-table">
    <?php $n = 1;  foreach($arrLabel as $row):?> 
	<form class="tr" method="post" action="/<?php echo $lang_prefix ?>/languages/saveMes/<?php echo $row['id']?>">
    	<span class="td"><?php echo $n; ?></span>
        <span class="td">
            <?php echo $row['text'];?>
            <input type="hidden" name="curr_lng" value="<?php echo $select_lng; ?>" />
        </span>
        <span class="td"><input type="text" name="translation" value="<?php echo $row['translation']?>" /></span>
        <span class="td">
             <button class="btn-save-lbl" type="submit">
                <span class="glyphicon glyphicon-floppy-disk"></span>
            </button>  
            <a class="mes-delete" data-id="<?php echo $row['message_id']?>" data-prefix="<?php echo $lang_prefix ?>" data-label="<?php echo $row['translation']?>" href="#">
                <span class="glyphicon glyphicon-trash"></span>
            </a>
        </span>
    </form>
     <?php $n++; endforeach;?>
</div>