<li class="dropdown">
    <a href="#" class="dropdown-toggle" id="user-status" data-toggle="dropdown">
        <span class="glyphicon glyphicon-user">&nbsp;</span>
        Hello <?php echo $arrData['name'];?>
        <span class="caret"></span>
    </a>

    <ul class="dropdown-menu" role="menu">
        <li><a href="/<?php echo $prefix_lng?>/main/logout">Logout</a></li>
        <li class="divider"></li>
        <li><a href="/<?php echo $prefix_lng?>/users/edit/<?php echo $arrData['id']?>">Setinngs</a></li>
    </ul><!--/dropdown-menu -->
</li><!--/dropdown -->
