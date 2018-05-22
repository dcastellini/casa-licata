function validarCreacion(){
    var nombre     = $('#nombre').val();
    var cantidad   = $('#cantidad').val();
    var stock      = $('#stock_minimo').val();
    var precio     = $('#precio').val();
    var porcentaje = $('#porcentaje').val();
    var ganancia   = $('#ganancia').val();

    if(nombre == ''){
        alert('El nombre del material no puede ser nulo.');
    }
    else if(cantidad == ''){
        alert('La cantidad no puede ser nula.');
    }
    else if(stock == ''){
        alert('El stock mínimo no puede ser nulo.');
    }
    else if(precio == ''){
        alert('El precio no puede ser nulo');
    }
    else if(porcentaje == ''){
        alert('El porcentaje no puede ser nulo.');
    }
    else if(ganancia == ''){
            alert('La ganancia no puede ser nula.');
    }
    else{
        var data = { }
        $.ajax({
            url: 'crearMaterial',
            type: "POST",
            data: data,
            dataType: "html",
            cache: false,
            success: function (response) {


    }
}


function generarDropdown(value){
    var dropDownListUnidad = "<div class='form-group' id='unidadContainer'>" +
                             "<label for='unidad' class='col-sm-2 control-label'>Unidad de medida</label>" +
                             "<select class='form-control' id='unidad'>";
    $('#unidadContainer').remove();
    if(value == 2){
        dropDownListUnidad = dropDownListUnidad + "<option value='1'>Metro Cuadrado</option><option value='2'>Metro Cubico</option>";
    }
    if(value == 3){
        dropDownListUnidad = dropDownListUnidad + "<option value='1'>Kilogramos</option><option value='2'>Toneladas</option>";
    }
    if(value == 4){
        dropDownListUnidad = dropDownListUnidad + "<option value='1'>Gramos</option><option value='2'>Kilogramos</option><option value='3'>Toneladas</option>";
    }
    if(value != 1){
        dropDownListUnidad = dropDownListUnidad + "</select></div><br>";
        $(dropDownListUnidad).insertAfter('#unidad_material');
    }
}


function crearMaterial(){
	var codigo;
    $('#mainContainer').html("");
    var material = "<div class='form-group'>" +
                   "<label for='nombre' class='col-sm-2 control-label'>Material</label>" +
                   "<input type='text' class='form-control' placeholder='Material' id='nombre' /></div>";
    $('#mainContainer').append(material);
    $.ajax({
        url: 'ObtenerTipoMaterial',
        type: "POST",
        dataType: "html",
        cache: false,
        success: function (response) {
            var materiales = JSON.parse(response);
            var dropDownList = "<div class='form-group'>" +
                               "<label for='selectMaterial' class='col-sm-2 control-label'>Tipo de Material</label>" +
                               "<select class='form-control' id='tipo_material'>";
            for (i = 0; i < materiales.length; i++) {
                dropDownList = dropDownList + "<option value = '"+materiales[i]['tipo_material']+"'>"+ materiales[i]["descripcion"] + "</option>";
            };
            dropDownList = dropDownList + "</select></div>";
            $('#mainContainer').append(dropDownList);

            var tipo_unidad = "<div class='form-group' id='unidad_material'>" +
                              "<label for='unidadMaterial' class='col-sm-2 control-label'>Unidad de medida</label>" +
                              "<select class='form-control' id='unidadMaterial' onchange='generarDropdown(this.value)'>" +
                              "<option value='1'>Unidad</option><option value='2'>Superficie</option><option value='3'>Linga</option><option value='4'>Peso</option></div>";

            var cantidad   = "<div class='form-group'>" +
                             "<label for='cantidad' class='col-sm-2 control-label'>Cantidad</label>" +
                             "<div class='input-group'><input type='text' class='form-control' placeholder='Cantidad' id='cantidad'/><div class='input-group-addon'>00</div></div>";

            var stockMin   = "<div class='form-group'>" +
                             "<label for='stockMinimo' class='col-sm-2 control-label'>Stock Mínimo</label>" +
                             "<div class='input-group'><input type='text' class='form-control' placeholder='Stock Minimo' id='stock_minimo'/><div class='input-group-addon'>00</div></div>";

            var precio     = "<div class='form-group'>" +
                             "<label for='precio' class='col-sm-2 control-label'>Precio de Lista</label>" +
                             "<div class='input-group'><div class='input-group-addon'>$</div><input type='text' class='form-control' placeholder='Precio' id='precio'/><div class='input-group-addon'>.00</div></div></div>";

            var porcentaje = "<div class='form-group'>" +
                             "<label for='porcentaje' class='col-sm-2 control-label'>Porcentaje de Ganancia</label>" +
                             "<div class='input-group'><div class='input-group-addon'>%</div><input type='text' class='form-control' placeholder='Porcentaje' id='porcentaje'/><div class='input-group-addon'>00</div></div></div>";

            var ganancia   = "<div class='form-group'>" +
                             "<label for='ganancia' class='col-sm-2 control-label'>Ganancia</label>" +
                             "<div class='input-group'><div class='input-group-addon'>$</div><input type='text' class='form-control' placeholder='Ganancia $' id='ganancia'/><div class='input-group-addon'>00</div></div></div>";

            var confirmar  = "<button class='btn btn-primary' onclick='validarCreacion()' >Crear</button>";

            $('#mainContainer').append(tipo_unidad);
            $('#mainContainer').append(cantidad);
            $('#mainContainer').append(stockMin);
            $('#mainContainer').append(precio);
            $('#mainContainer').append(porcentaje);
            $('#mainContainer').append(ganancia);
            $('#mainContainer').append(confirmar);
        }
    });
}