<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/css/bootstrap.css" media="screen, projection">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <?php echo $content; ?>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-3.3.1.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/js/bootstrap.js"></script>
    </body>
</html>