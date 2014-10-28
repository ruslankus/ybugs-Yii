<?php /* @var $menu array */ ?>
<?php /* @var $controller_id int */ ?>

<ul>
    <?php foreach($menu as $item): ?>
        <?php if(in_array(Yii::app()->user->getState('role'),$item['roles'])): ?>
            <li><a href="<?php echo Yii::app()->createUrl('/'.$item['controller'].'/'.$item['action']); ?>"><?php echo Translations::getFor($item['name']); ?></a></li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>