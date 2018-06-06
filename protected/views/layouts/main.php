<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS -->
        <!-- FAVICON -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <title>Casa Licata</title>
        <style>
            body {
                font-family: 'Roboto' !important;
            }

        </style>
    </head>
    <body>
        <?php echo $content; ?>
    </body>
</html>
