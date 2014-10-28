<?php /* @var $this ResolutionsController */ ?>
<?php /* @var $resolutions array */ ?>
<?php /* @var $issue Issues */ ?>


<?php if(!empty($issue)): ?>
    <p>
        <?php echo Translations::getFor('Project'); ?>:<br>
        <a href="<?php echo Yii::app()->createUrl('/issues/list',array('id' => $issue->project_id)); ?>"><?php echo $issue->getProjectName(); ?></a><br><br>
        <?php echo Translations::getFor('Problem'); ?>:<br>
        <?php echo $issue->description; ?>
    </p>
<?php else: ?>
    <p>
        <?php echo Translations::getFor('All resolutions'); ?>
    </p>
<?php endif; ?>

<hr>

<table border="1">
    <tr>
        <td><?php echo Translations::getFor('Id'); ?></td>
        <td><?php echo Translations::getFor('Message'); ?></td>
        <td><?php echo Translations::getFor('Date of issue'); ?></td>
        <td><?php echo Translations::getFor('Date of resolution'); ?></td>
        <td><?php echo Translations::getFor('Done by'); ?></td>
    </tr>

    <?php foreach($resolutions as $resolution): ?>
        <tr>
            <td><?php echo $resolution['id']; ?></td>
            <td><?php echo $resolution['resolution_remark']; ?></td>
            <td><?php echo date('Y.m.d',$resolution['resolution_date']); ?></td>
            <td><?php echo date('Y.m.d',$resolution['resolution_date']); ?></td>
            <td><?php echo $resolution['dev_user_name']." ".$resolution['dev_user_surname']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php if(!empty($issue) && Yii::app()->user->getState('role') == 2): ?>
    <a href="<?php echo Yii::app()->createUrl('/resolutions/add',array('id' => $issue->id)); ?>"><?php echo Translations::getFor('Add new resolution'); ?></a>
<?php endif; ?>

