<?php /* @var $this ResolutionsController */ ?>
<?php /* @var $resolutions array */ ?>
<?php /* @var $issue Issues */ ?>


<?php if(!empty($issue)): ?>
    <p>
        <?php echo Trl::t()->getLabel('Project'); ?>:<br>
        <a href="<?php echo Yii::app()->createUrl('/issues/list',array('id' => $issue->project_id)); ?>"><?php echo $issue->getProjectName(); ?></a><br><br>
        <?php echo Trl::t()->getLabel('Problem'); ?>:<br>
        <?php echo $issue->description; ?>
    </p>
<?php else: ?>
    <p>
        <?php echo Trl::t()->getLabel('All resolutions'); ?>
    </p>
<?php endif; ?>

<hr>

<table border="1">
    <tr>
        <td><?php echo Trl::t()->getLabel('Id'); ?></td>
        <td><?php echo Trl::t()->getLabel('Message'); ?></td>
        <td><?php echo Trl::t()->getLabel('Date of issue'); ?></td>
        <td><?php echo Trl::t()->getLabel('Date of resolution'); ?></td>
        <td><?php echo Trl::t()->getLabel('Done by'); ?></td>
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
    <a href="<?php echo Yii::app()->createUrl('/resolutions/add',array('id' => $issue->id)); ?>"><?php echo Trl::t()->getLabel('Add new resolution'); ?></a>
<?php endif; ?>

