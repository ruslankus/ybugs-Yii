<?php /* @var $languages Languages[] */ ?>
<?php /* @var $controller string */ ?>
<?php /* @var $action string */ ?>
<?php /* @var $current string */ ?>
<?php /* @var $params array */ ?>

<ul>
    <?php foreach($languages as $lng): ?>
        <li>
            <?php $params['language'] = $lng->prefix; ?>
            <?php if($current == $lng->prefix): ?><b><?php endif; ?>
            <a href="<?php echo Yii::app()->createUrl('/'.$controller.'/'.$action,$params); ?>"><?php echo $lng->prefix; ?></a>
            <?php if($current == $lng->prefix): ?></b><?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>