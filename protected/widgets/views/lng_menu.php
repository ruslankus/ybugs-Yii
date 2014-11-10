
<li class="dropdown">
    <a href="#" class="dropdown-toggle" id="lang-selector" data-toggle="dropdown"><?php echo $current ?><span class="caret"></span></a>

    <ul class="dropdown-menu" role="menu">
        
    <?php foreach ($arrLngs as $lng):?> 
        <?php $params['language'] = $lng['prefix'];?>   
        <li><a href="<?php echo Yii::app()->createUrl('/'.$controller.'/'.$action , $params) ?>"><?php echo $lng['prefix']; ?></a></li>
    <?php endforeach; ?>    
    </ul><!--/dropdown-menu -->
</li><!--/dropdown -->
