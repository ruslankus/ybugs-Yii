 <?php
$cs = Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl.'/js/trans.js',CClientScript::POS_END);
?> 
<div class="col-md-10 content-holder" id="translation">
    <div class="inner-holder">
    	<div class="tr-header clearfix">
        	<div class="col-md-6"><h2><?php echo Trl::t()->getLabel('Languages')?></h2></div>
        	<div class="col-md-6 btns-holder">
                <a class="btn btn-sm btn-success passive"><?php echo Trl::t()->getLabel('languages')?></a>&nbsp;
            	<a class="btn btn-sm btn-success " href="/<?php echo $lang_prefix;?>/languages/messages"><?php echo Trl::t()->getLabel('messages')?></a>&nbsp;
                <a class="btn btn-sm btn-success " href="/<?php echo $lang_prefix;?>/languages"> <?php echo Trl::t()->getLabel('labels')?></a>
            </div>
        </div><!--tr-header  -->
        <div class="table-holder">
            <table class="table">
            	<thead>
                 	<tr>
                    	<th><?php echo Trl::t()->getLabel('id')?></th>
                    	<th><?php echo Trl::t()->getLabel('name')?></th>
                    	<th><?php echo Trl::t()->getLabel('prefix')?></th>
                    	<th><?php echo Trl::t()->getLabel('flag')?></th>
                    	<th><?php echo Trl::t()->getLabel('status')?></th>
                    </tr>
                </thead>
                <tbody>
					<?php foreach($langs as $row):?>
						<tr>
							<td>
								<?php echo $row['id']?>
							</td>
							<td>
								<?php echo $row['name']?>
							</td>
							<td>
								<?php echo $row['prefix']?>
							</td>
							<td>
								<?php echo $row['flag_image']?>
							</td>
							<td>
								<?php echo $row['status']?>
							</td>
						</tr>
					<?php endforeach;?>

                </tbody>
             </table>   
        </div>
	</div>
</div>