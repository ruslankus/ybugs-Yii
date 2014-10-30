<ul>
<?php foreach ($arrData as $row):?>
    <li><a href="/<?php echo $prefix_lng;?>/issues/list/<?php echo $row['id'];?>"><?php echo $row['name'];?></a></li>
<?php endforeach;?>
    
 </ul>
