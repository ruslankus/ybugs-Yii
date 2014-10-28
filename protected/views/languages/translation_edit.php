<?php /* @var $this LanguagesController */ ?>
<?php /* @var $translation Translations */ ?>
<?php /* @var $languages Languages[] */ ?>


<form method="post" action="<?php echo Yii::app()->createUrl('/languages/updatetrans'); ?>">

    <?php if(!$translation->isNewRecord): ?>
        <input type="hidden" name="id" value="<?php echo $translation->id; ?>">
    <?php endif; ?>

    <?php echo Translations::getFor('Label');  ?>:<br>
        <input type="text" name="label" value="<?php echo $translation->label; ?>">
    <br><br>

    <?php foreach($languages as $language): ?>
        <?php echo $language->prefix." (".$language->name.")"; ?>:<br>
        <input type="text" name="translation[<?php echo $language->id; ?>]" value="<?php echo !$translation->isNewRecord ? $translation->getByLngId($language->id): ''; ?>">
        <br><br>
    <?php endforeach; ?>

    <input type="submit">
</form>


