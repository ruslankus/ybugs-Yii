<?php /* @var $issues array */ ?>
<?php /* @var $project Projects */ ?>

<?php /* @var $testers Users[] */ ?>
<?php /* @var $developers Users[] */ ?>

<?php if(!empty($project)): ?>
    <p>
        <?php echo Translations::getFor('Project'); ?>:<br>
        <?php echo $project->description; ?><br><br>
        <?php echo Translations::getFor('Developers of project'); ?>:<br>
    </p>
    <ul>
        <?php foreach($developers as $developer): ?>
            <li><?php echo $developer->name.' '.$developer->surname; ?></li>
        <?php endforeach; ?>
    </ul>

    <p>
        <?php echo Translations::getFor('Users/testers of project'); ?>:
    </p>
    <ul>
        <?php foreach($testers as $tester): ?>
            <li><?php echo $tester->name.' '.$tester->surname; ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p><?php echo Translations::getFor('All issues'); ?></p>
<?php endif; ?>


<hr>
<table border="1">
    <tr>
        <td><?php echo Translations::getFor("Id"); ?></td>
        <td><?php echo Translations::getFor("Description"); ?></td>
        <td><?php echo Translations::getFor("Date"); ?></td>
        <td><?php echo Translations::getFor("Picture"); ?></td>
        <td><?php echo Translations::getFor("Added by"); ?></td>
        <td><?php echo Translations::getFor("Status"); ?></td>
        <td><?php echo Translations::getFor("Resolutions"); ?></td>
    </tr>
    <?php foreach($issues as $nr => $issue): ?>
        <tr>
            <td><?php echo $issue['id']; ?></td>
            <td><?php echo $issue['description']; ?></td>
            <td><?php echo date('Y.m.d',$issue['date']); ?></td>
            <td>
                <?php if($issue['picture'] != ''): ?>
                    <a href="/images/uploaded/<?php echo $issue['picture']; ?>" target="_blank"><?php echo Translations::getFor('Show'); ?></a>
                <?php else: ?>
                    <?php echo Translations::getFor('No picture'); ?>
                <?php endif; ?>
            </td>
            <td><?php echo $issue['user_name']." ".$issue['user_surname']; ?></td>
            <td><?php echo Translations::getFor($issue['status_name']); ?></td>
            <td><a href="<?php echo $this->createUrl('/resolutions/list/',array('id' => $issue['id'])); ?>"><?php echo Translations::getFor('Show'); ?></a></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php if(!empty($project)): ?>
    <a href="<?php echo Yii::app()->createUrl('/issues/add',array('id' => $project->id)); ?>"><?php echo Translations::getFor('Add new issue'); ?></a>
<?php endif; ?>