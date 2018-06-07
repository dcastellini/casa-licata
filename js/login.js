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
    else if(validarEmail(email)){
        $('#modal-t').html("").append('¡El email no es válido!');
        $('#myModal').modal('show');
    }
    else if(mensaje == "" || mensaje == null) {
        $('#modal-t').html("").append('¡El mensaje no puede ser nulo!');
        $('#myModal').modal('show');
    }
    else{
        var data = {'nombre':nombre, 'apellido':apellido,'email':email,'mensaje':mensaje };
        $.ajax({
				url: 'envioEmail',
                type: "POST",
                data: data,
                dataType: "html",
                cache: false,
                success: function (response){
                    alert(response);
                    if(response == 'error'){
                        alert('Error al loguear');
                    }
                    else{
                        alert("do something");
                    }
                }
            });
        }
    }