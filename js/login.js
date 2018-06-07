function validarEmail(valor) {
    if(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)){
        return true;
    }
    else {
        return false;
    }
}

function login(){
    var nombre   = $('#nombre').val();
    var apellido = $('#apellido').val();
    var email    = $('#email').val();
    var mensaje  = $('#mensaje').val();
	if(nombre == "" || nombre == null){
        $('#modal-t').html("").append('¡El nombre no puede ser nulo!');
	    $('#myModal').modal('show');
    }
    else if(apellido == "" || apellido == null){
        $('#modal-t').html("").append('¡El apellido no puede ser nulo!');
        $('#myModal').modal('show');
    }
    else if(email == "" || email == null){
        $('#modal-t').html("").append('¡El email no puede ser nulo!');
        $('#myModal').modal('show');
    }
   /* else if(validarEmail(email)){
        $('#modal-t').html("").append('¡El email no es válido!');
        $('#myModal').modal('show');
    } */
    else if(mensaje == "" || mensaje == null) {
        $('#modal-t').html("").append('¡El mensaje no puede ser nulo!');
        $('#myModal').modal('show');
    }
    else{
        var data = {'nombre':nombre, 'apellido':apellido,'email':email,'mensaje':mensaje };
        $.ajax({
				url: 'site/EnvioEmail',
                type: "POST",
                data: data,
                dataType: "html",
                cache: false,
                success: function (response){
                    alert(response);
                    if(response == 'Send_ok'){
                        $('#modal-t').html("").append('¡Tu mensaje fue enviado! Te responderemos a la brevedad.');
                        $('#myModal').modal('show');
                    }
                    else{
                        $('#modal-t').html("").append('¡Ups! El mensaje no pudo ser enviado');
                        $('#myModal').modal('show');
                    }
                }
            });
        }
    }