<?php /* @var $this LanguagesController */ ?>
<?php /* @var $languages Languages[] */ ?>
<?php /* @var $translations Translations[] */ ?>

<table border="1">
    <tr>
        <td><?php echo Translations::getFor('Id'); ?></td>
        <td><?php echo Translations::getFor('Name'); ?></td>
        <td><?php echo Translations::getFor('Prefix'); ?></td>
        <td><?php echo Translations::getFor('Actions'); ?></td>
    </tr>

    <?php foreach($languages as $language): ?>
    <tr>
        <td><?php echo $language->id; ?></td>
        <td><?php echo $language->name; ?></td>
        <td><?php echo $language->prefix; ?></td>
        <td>
            <a href="<?php echo Yii::app()->createUrl('/languages/editlanguage',array('id' => $language->id)); ?>"><?php echo Translations::getFor('Edit');?></a><br>
            <a href="<?php echo Yii::app()->createUrl('/languages/deletelanguage',array('id' => $language->id)); ?>"><?php echo Translations::getFor('Delete'); ?></a><br>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="<?php echo Yii::app()->createUrl('/languages/addlanguage'); ?>"><?php echo Translations::getFor('Add new language'); ?></a>

<br>
<hr>
<br>
<table border="1">
    <tr>
        <td><?php echo Translations::getFor('Label'); ?></td>
        <?php foreach($languages as $language): ?>
            <td><?php echo $language->prefix." (".$language->name.")"; ?></td>
        <?php endforeach; ?>
        <td><?php echo Translations::getFor('Actions'); ?></td>
    </tr>
    <?php foreach($translations as $translation): ?>
        <tr>
            <td><?php echo $translation->label; ?></td>
            <?php foreach($languages as $language): ?>
            <td><?php echo $translation->getByLngId($language->id); ?></td>
            <?php endforeach; ?>
            <td>
                <a href="<?php echo Yii::app()->createUrl('/languages/edittrans',array('id' => $translation->id)); ?>"><?php echo Translations::getFor('Edit'); ?></a><br>
                <a href="<?php echo Yii::app()->createUrl('/languages/deletetrans',array('id' => $translation->id)); ?>"><?php echo Translations::getFor('Delete'); ?></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="<?php echo Yii::app()->createUrl('/languages/addtrans'); ?>"><?php echo Translations::getFor('Add new translation'); ?></a>