
<li class="dropdown" id="lng-list">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $current ?><span class="caret"></span></a>

    <ul class="dropdown-menu" role="menu">
    <?php foreach ($arrLngs as $lng):?>    
        <li><a href="/<?php echo $lng['prefix']; ?>/<?php echo $controller;?>/<?php echo $action?>/"><?php echo $lng['prefix']; ?></a></li>
    <?php endforeach; ?>    
    </ul><!--/dropdown-menu -->
</li><!--/dropdown -->
