
<div class="container">
        <div class="form-label-group">
            <input type="text" id="usuario" class="form-control" name="usuario" placeholder="Usuario" required autofocus>
            <label for="usuario">Usuario</label>
        </div>
        <div class="form-label-group">
            <input type="password" id="password"  name="password" class="form-control" placeholder="Password" required>
            <label for="password">Password</label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" onclick="login()">Logueate!</button>
</div>
<div class="modal" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">¡Ups! Ocurrió un problema</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="modal-t"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" >
    function login(){
        var usuario  = $('#usuario').val();
        var password = $('#password').val();
        if(usuario == "" || usuario == null){
            $('#modal-t').html("").append('¡El usuario no puede ser nulo!');
            $('#myModal').modal('show');
        }
        else if(password == "" || password == null){
            $('#modal-t').html("").append('¡El password no puede ser nulo!');
            $('#myModal').modal('show');
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
                    if(response == "error_login"){
                        $('#modal-t').html("").append('¡Usuario o contraseña incorrectos!');
                        $('#myModal').modal('show');
                    }
                    else{
                        window.location.replace(response);
                    }
                }
            });
        }
    }
</script>