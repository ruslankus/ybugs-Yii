<?php /* @var $users array */ ?>
<?php /* @var $this UsersController */ ?>

<table border="1">
    <tr>
        <td><?php echo Translations::getFor('Id'); ?></td>
        <td><?php echo Translations::getFor('Login'); ?></td>
        <td><?php echo Translations::getFor('Email'); ?></td>
        <td><?php echo Translations::getFor('Name'); ?></td>
        <td><?php echo Translations::getFor('Role'); ?></td>
        <td><?php echo Translations::getFor('Status');  ?></td>
        <td><?php echo Translations::getFor('Actions'); ?></td>
    </tr>
    <?php foreach($users as $user): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['login']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['name'].' '.$user['surname']; ?></td>
            <td><?php echo Translations::getFor($user['role_name']); ?></td>
            <td><?php echo Translations::getFor($user['status_name']); ?></td>
            <td>
                <a href="<?php echo Yii::app()->createUrl('/users/edit',array('id' => $user['id'])); ?>"><?php echo Translations::getFor('Edit'); ?></a><br>
                <?php if($user['status'] != 4): ?>
                    <a href="<?php echo Yii::app()->createUrl('/users/delete',array('id' => $user['id'])); ?>"><?php echo Translations::getFor('Suspend'); ?></a>
                <?php else: ?>
                    <a href="<?php echo Yii::app()->createUrl('/users/restore',array('id' => $user['id'])); ?>"><?php echo Translations::getFor('Restore'); ?></a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<a href="<?php echo Yii::app()->createUrl('/users/add'); ?>"><?php echo Translations::getFor('Add new user'); ?></a>