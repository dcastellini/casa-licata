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
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">¡Hola <?php echo Yii::app()->session['usuario']; ?>! ¿Qué deseas hacer? </h1>
            <div class="row placeholders">
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                    <h4>Label</h4>
                    <span class="text-muted">Something else</span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                    <h4>Label</h4>
                    <span class="text-muted">Something else</span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                    <h4>Label</h4>
                    <span class="text-muted">Something else</span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                    <h4>Label</h4>
                    <span class="text-muted">Something else</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function changeClass(value){
        debugger;
        var array = [];
        for(var i=1;i<=20;i++){
            if(i>= 1 && i<=5){
                $('#'+i+'').removeClass('active');
            }
            else{
                $('#'+i+'').remove();
            }
        }
        $('#'+value+'').addClass("active");

        if(value == 1){
            $("<li onclick='crearMaterial()' id='6' value='6'><a href='#'>Crear Material</a></li>").insertAfter('#1');
            $("<li id='7' value='7'><a href='#'>Modificar Material</a></li>").insertAfter('#1');
            $("<li id='8' value='8'><a href='#'>Modificar Stock</a></li>").insertAfter('#1');
            $("<li id='9' value='9'><a href='#'>Consultar Stock</a></li>").insertAfter('#1');
            $("<li id='10' value='10'><a href='#'>Eliminar Material</a></li>").insertAfter('#1');
        }
        if(value == 2){
            $("<li id='11' value='11'><a href='#'>Crear Cliente</a></li>").insertAfter('#2');
            $("<li id='12' value='12'><a href='#'>Consultar Cliente</a></li>").insertAfter('#2');
            $("<li id='13' value='13'><a href='#'>Modificar Cliente</a></li>").insertAfter('#2');
            $("<li id='14' value='14'><a href='#'>Eliminar Cliente</a></li>").insertAfter('#2');
        }
        if(value == 3){
            $("<li id='15' value='15'><a href='#'>Crear Proveedor</a></li>").insertAfter('#3');
            $("<li id='16' value='16'><a href='#'>Consultar Proveedor</a></li>").insertAfter('#3');
            $("<li id='17' value='17'><a href='#'>Modificar Proveedor</a></li>").insertAfter('#3');
            $("<li id='18' value='18'><a href='#'>Eliminar Proveedor</a></li>").insertAfter('#3');
        }
        if(value == 4){
            $("<li id='19' value='19'><a href='#'>Consultar Facturar</a></li>").insertAfter('#4');
            $("<li id='20' value='20'><a href='#'>Anular Factura</a></li>").insertAfter('#4');
        }

    }


</script>

<script type="text/javascript">
    function crearMaterial(){
        
    }

</script>
