function generarDropdown(value){
    var dropDownListUnidad = "<select id='unidad'>";
    $('#unidad').remove();
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
        dropDownListUnidad = dropDownListUnidad + "</select>";
        $('#mainContainer').append(dropDownListUnidad);
    }
}




function crearMaterial(){
	var codigo;
    $('#mainContainer').html("");
    var material ="<input type='text' placeholder='Material' id='nombre' /><br><br>";
    $('#mainContainer').append(material);
    $.ajax({
        url: 'site/ObtenerTipoMaterial',
        type: "POST",
        dataType: "html",
        cache: false,
        success: function (response) {
            var materiales = JSON.parse(response);
            var dropDownList = "<select id='tipo_material'>";
            for (i = 0; i < materiales.length; i++) {
                dropDownList = dropDownList + "<option value = '"+materiales[i]['tipo_material']+"'>"+ materiales[i]["descripcion"] + "</option>";
            };
            dropDownList = dropDownList + "</select><br>";
            $('#mainContainer').append(dropDownList);
        }
    });
    var tipo_unidad = "<select id='tipo_unidad' onchange='generarDropdown(this.value)'><option value='1'>Unidad</option><option value='2'>Superficie</option><option value='3'>Linga</option><option value='4'>Peso</option>";
    $('#mainContainer').append(tipo_unidad);
    var cantidad = "<br><input type='text' placeholder='Cantidad' id='cantidad'/>";
    var stockMin = "<br><input type='text' placeholder='Stock Minimo' id='stock_minimo'/>";
    var precio = "<br><input type='text' placeholder='Precio $' id='precio'/><p>$</p>";
    var porcentaje = "<br><input type='text' placeholder='Porcentaje' id='porcentaje'/><p>%</p>";
    var ganancia = "<br><input type='text' placeholder='Ganancia $' id='ganancia'/><p>$</p>";
    $('#mainContainer').append(cantidad);
    $('#mainContainer').append(stockMin);
    $('#mainContainer').append(precio);
    $('#mainContainer').append(porcentaje);
    $('#mainContainer').append(ganancia);

}