<?php /* @var $users array */ ?>
<?php /* @var $this UsersController */ ?>

<table border="1">
    <tr>
        <td><?php echo Trl::t()->getLabel('Id'); ?></td>
        <td><?php echo Trl::t()->getLabel('Login'); ?></td>
        <td><?php echo Trl::t()->getLabel('Email'); ?></td>
        <td><?php echo Trl::t()->getLabel('Name'); ?></td>
        <td><?php echo Trl::t()->getLabel('Role'); ?></td>
        <td><?php echo Trl::t()->getLabel('Status');  ?></td>
        <td><?php echo Trl::t()->getLabel('Actions'); ?></td>
    </tr>
    <?php foreach($users as $user): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['login']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['name'].' '.$user['surname']; ?></td>
            <td><?php echo Trl::t()->getLabel($user['role_name']); ?></td>
            <td><?php echo Trl::t()->getLabel($user['status_name']); ?></td>
            <td>
                <a href="<?php echo Yii::app()->createUrl('/users/edit',array('id' => $user['id'])); ?>"><?php echo Trl::t()->getLabel('Edit'); ?></a><br>
                <?php if($user['status'] != 4): ?>
                    <a href="<?php echo Yii::app()->createUrl('/users/delete',array('id' => $user['id'])); ?>"><?php echo Trl::t()->getLabel('Suspend'); ?></a>
                <?php else: ?>
                    <a href="<?php echo Yii::app()->createUrl('/users/restore',array('id' => $user['id'])); ?>"><?php echo Trl::t()->getLabel('Restore'); ?></a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<a href="<?php echo Yii::app()->createUrl('/users/add'); ?>"><?php echo Trl::t()->getLabel('Add new user'); ?></a>