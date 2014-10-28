<?php /* @var $content string */ ?>
<?php /* @var $this Controller */ ?>

<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="" />
    <link rel="apple-touch-icon-precomposed" type="image/png" href="" />

    <meta name="keywords" content="<?php echo $this->keywords; ?>">
    <meta name="description" content="<?php echo $this->description;?>">
    <title><?php echo $this->title;?></title>
</head>


<body>
<?php $this->widget('application.widgets.LngMenu');?>
<br>
<?php $this->widget('application.widgets.MainMenu');?>
<?php echo $content; ?>
</body>

</html>
