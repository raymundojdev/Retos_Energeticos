/* -------------------------------------------------------------------------- */
/*                               Borrar Usuarios                              */
/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                Cuando se haga click en lo que tiene la clase               
				  BorrarU que esta en el boton de							  */
/* -------------------------------------------------------------------------- */
 
/* -------------------------------------------------------------------------- */
/*               eliminar cuando eso pase se ejecute una funcion              */
/* -------------------------------------------------------------------------- */
$(".TB").on("click", ".BorrarP", function(){

	/* -------------------------------------------------------------------------- */
	/*     creamos las variables Pid que sera igual a lo que estemos haciendo     
	       click en su atribbuto que esta en el atributo 						  */
	/* -------------------------------------------------------------------------- */
	
	/* -------------------------------------------------------------------------- */
	/*                              del boton borrar                              */
	/* -------------------------------------------------------------------------- */
	var Pid = $(this).attr("Pid");

	/* -------------------------------------------------------------------------- */
	/*                           Abrimos window location                          */
	/* -------------------------------------------------------------------------- */
	window.location = "index.php?url=proveedores&Pid="+Pid;
})


/* -------------------------------------------------------------------------- */
/*                          Llamar datos para editar                          */
/* -------------------------------------------------------------------------- */

$(".TB").on("click", ".EditarP", function(){

	var Pid = $(this).attr("Pid");
	var datos = new FormData();

	datos.append("Pid", Pid);

	$.ajax({

		url: "ajax/proveedoresA.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#nombreE").val(respuesta["nombre"]);
			$("#Pid").val(respuesta["id"]);
			$("#rfcE").val(respuesta["rfc"]);
			$("#direccionE").val(respuesta["direccion"]);
			$("#telefonoE").val(respuesta["telefono"]);
			$("#atnE").val(respuesta["atn"]);
            $("#emailE").val(respuesta["email"]);
	
			
			
		}

	})

})