<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dashboard.css" media="screen, projection">

<?php
    if(!isset(Yii::app()->session['usuario'])){
        $this->redirect(array('/site/login'));
    }
?>


<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Casa Licata</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Bienvenido <?php echo Yii::app()->session['usuario']; ?></a></li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Configuración<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="Logout">Desconectarse</a></li>
                </ul>
            </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li onclick="changeClass(this.value)" id="1" value="1"><a href="#">Materiales</a></li>
                <li onclick="changeClass(this.value)" id="2" value="2"><a href="#">Clientes</a></li>
                <li onclick="changeClass(this.value)" id="3" value="3"><a href="#">Proveedores</a></li>
                <li onclick="changeClass(this.value)" id="4" value="4"><a href="#">Facturación</a></li>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" >
            <h1 class="page-header">¡Hola <?php echo Yii::app()->session['usuario']; ?>! ¿Qué deseas hacer? </h1>
            <div id="mainContainer">

            </div>
        </div>
    </div>
</div>


<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/changeClass.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/crearMaterial.js"></script>


