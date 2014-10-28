<?php /* @var $this ProjectsController */ ?>
<?php /* @var $projects Projects[] */ ?>

<p><?php echo Translations::getFor('Available projects'); ?></p>
<table border="1">
    <tr>
        <td>#</td>
        <td><?php echo Translations::getFor("Name"); ?></td>
        <td><?php echo Translations::getFor("Description"); ?></td>
        <td><?php echo Translations::getFor("Users"); ?></td>
        <td><?php echo Translations::getFor("Developers"); ?></td>
        <td><?php echo Translations::getFor("Actions"); ?></td>
    </tr>
<?php foreach($projects as $nr => $project): ?>
    <tr>
        <td><?php echo $nr; ?></td>
        <td><a href="<?php echo $this->createUrl('/issues/list/',array('id' => $project->id)); ?>"><?php echo $project->name; ?></a></td>
        <td><?php echo $project->description; ?></td>
        <td><?php echo count($project->getMembers(1)); ?></td>
        <td><?php echo count($project->getMembers(2)); ?></td>
        <td>
            <?php if(Yii::app()->user->getState('role') != 1): ?>
                <a href="<?php echo Yii::app()->createUrl('/projects/del',array('id' => $project->id)); ?>"><?php echo Translations::getFor('Delete'); ?></a>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; ?>
</table>


<?php if(Yii::app()->user->getState('role') == 3): ?>
    <a href="<?php echo Yii::app()->createUrl('/projects/add'); ?>"><?php echo Translations::getFor('Add project'); ?></a>
<?php endif; ?>