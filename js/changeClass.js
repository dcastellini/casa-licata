function changeClass(value){
    
	var array = [];
	var flag  = 0;
	
	/*
	**
	*/	
	if($('#'+value+'').hasClass("active")){
		flag = 1;
	}
    /*
	**
	*/
	for(var i=1;i<=20;i++){
		if(i>= 1 && i<=5){
			$('#'+i+'').removeClass('active');
        }
        else{
			$('#'+i+'').remove().slideUp( 300 ).delay( 800 ).fadeIn( 400 );
        }
    }
	/*
	**
	*/
	if(flag == 0){
		$('#'+value+'').addClass("active");       
		if(value == 1){
			$("<li onclick='crearMaterial()' id='6' value='6'><a href='#'>Crear Material</a></li>").insertAfter('#1').slideUp( 300 ).delay( 200 ).fadeIn( 400 );
			$("<li id='7' value='7'><a href='#'>Modificar Material</a></li>").insertAfter('#1').slideUp( 300 ).delay( 200 ).fadeIn( 400 );
			$("<li id='8' value='8'><a href='#'>Modificar Stock</a></li>").insertAfter('#1').slideUp( 300 ).delay( 200 ).fadeIn( 400 );
			$("<li id='9' value='9'><a href='#'>Consultar Stock</a></li>").insertAfter('#1').slideUp( 300 ).delay( 200 ).fadeIn( 400 );
			$("<li id='10' value='10'><a href='#'>Eliminar Material</a></li>").insertAfter('#1').slideUp( 300 ).delay( 200 ).fadeIn( 400 );
		}
		if(value == 2){
			$("<li id='11' value='11'><a href='#'>Crear Cliente</a></li>").insertAfter('#2').slideUp( 300 ).delay( 800 ).fadeIn( 400 );
			$("<li id='12' value='12'><a href='#'>Consultar Cliente</a></li>").insertAfter('#2').slideUp( 300 ).delay( 800 ).fadeIn( 400 );
			$("<li id='13' value='13'><a href='#'>Modificar Cliente</a></li>").insertAfter('#2').slideUp( 300 ).delay( 800 ).fadeIn( 400 );
			$("<li id='14' value='14'><a href='#'>Eliminar Cliente</a></li>").insertAfter('#2').slideUp( 300 ).delay( 800 ).fadeIn( 400 );
		}
		if(value == 3){
			$("<li id='15' value='15'><a href='#'>Crear Proveedor</a></li>").insertAfter('#3').slideUp( 300 ).delay( 800 ).fadeIn( 400 );
			$("<li id='16' value='16'><a href='#'>Consultar Proveedor</a></li>").insertAfter('#3').slideUp( 300 ).delay( 800 ).fadeIn( 400 );
			$("<li id='17' value='17'><a href='#'>Modificar Proveedor</a></li>").insertAfter('#3').slideUp( 300 ).delay( 800 ).fadeIn( 400 );
			$("<li id='18' value='18'><a href='#'>Eliminar Proveedor</a></li>").insertAfter('#3').slideUp( 300 ).delay( 800 ).fadeIn( 400 );
		}
		if(value == 4){
			$("<li id='19' value='19'><a href='#'>Consultar Facturar</a></li>").insertAfter('#4').slideUp( 300 ).delay( 800 ).fadeIn( 400 );
			$("<li id='20' value='20'><a href='#'>Anular Factura</a></li>").insertAfter('#4').slideUp( 300 ).delay( 800 ).fadeIn( 400 );
		}
	}
}
