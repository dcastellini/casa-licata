<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css" media="screen, projection">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'LoginForm',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true,),)); ?>

<div class="container">
    <div class="form-signin">
        <h2 class="form-signing-heading">Login</h2>
        <label for="inputUsuario" class="sr-only">
            Usuario
        </label>
        <?php echo $form->textField($model,'username',array('class'=>"form-control",'placeholder'=>"Usuario",'id'=>"usuario")); ?>
        <label for="inputPassword" class="sr-only">
            Password
        </label>
        <?php echo $form->passwordField($model,'password',array('class'=>"form-control",'placeholder'=>"Password",'id'=>"password")); ?>
        <br>
        <?php echo CHtml::Button('Entrar',array("class"=>"btn btn-lg btn-primary btn-block","onclick"=>"login()")); ?>
        <?php $this->endWidget(); ;?>
    </div>
</div>

<script>
    function login(){
        var usuario  = $('#usuario').val();
        var password = $('#password').val();
        if(usuario == "" || usuario == null || password == "" || password == null){
            alert('Ingrese los datos');
        }
        else{
            var data = {'usuario':usuario, 'password':password};
            $.ajax({
                url: 'login',
                type: "POST",
                data: data,
                dataType:'html',
                cache: false,
                success: function (response){
                    if(response == "nologin"){
                        alert('Error al loguear');
                    }
                    else{
                        window.location.replace(response);
                    }
                }
            });
        }
    }
</script>