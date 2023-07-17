/* -------------------------------------------------------------------------- */
/*                               Borrar Usuarios                              */
/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                    Cuando se haga click en el atributo que tiene                    
					  la clase BorrarU que esta en el boton de				  */
/* -------------------------------------------------------------------------- */
 
/* -------------------------------------------------------------------------- */
/*               eliminar cuando eso pase se ejecute una funcion              */
/* -------------------------------------------------------------------------- */
$(".TB").on("click", ".BorrarU", function(){

	/* -------------------------------------------------------------------------- */
	/*          creamos las variables Uid que sera igual a lo que estemos         
				haciendo click en su atribbuto que esta en el atributo            */
	/* -------------------------------------------------------------------------- */
	 
	/* -------------------------------------------------------------------------- */
	/*                              del boton borrar                              */
	/* -------------------------------------------------------------------------- */
	var Uid = $(this).attr("Uid");

	/* -------------------------------------------------------------------------- */
	/*          otra variable Ufoto es el atributo Ufoto del boton borrar         */
	/* -------------------------------------------------------------------------- */
	var Ufoto = $(this).attr("Ufoto");

	var Ufirma = $(this).attr("Ufirma");

	/* -------------------------------------------------------------------------- */
	/*                         Abrimos window location qu                         */
	/* -------------------------------------------------------------------------- */
	window.location = "index.php?url=usuarios&Uid="+Uid+"&Ufoto="+Ufoto+"&Ufirma="+Ufirma;
})




/* -------------------------------------------------------------------------- */
/*                          Llamar datos para editar                          */
/* -------------------------------------------------------------------------- */

$(".TB").on("click", ".EditarU", function(){

	var Uid = $(this).attr("Uid");
	var datos = new FormData();

	datos.append("Uid", Uid);

	$.ajax({

		url: "ajax/usuariosA.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log(respuesta);
			$("#usuarioE").val(respuesta["usuario"]);
			$("#Uid").val(respuesta["id"]);
			$("#nombreE").val(respuesta["nombre"]);
			$("#cargoE").val(respuesta["cargo"]);
			$("#correoE").val(respuesta["correo"]);
			$("#claveE").val(respuesta["clave"]);
			$("#iniciales_firmaE").val(respuesta["iniciales_firma"]);
			
			$("#FotoActual").val(respuesta["foto"]);

			if(respuesta["foto"] != ""){
				$(".visor").attr("src",respuesta["foto"]);
			}else{
				$(".visor").attr("src", "vistas/img/usuarios/defecto.png" );
			}

			$("#FirmaActual").val(respuesta["firma"]);

			if(respuesta["firma"] != ""){
				$(".visor2").attr("src",respuesta["firma"]);
			}else{
				$(".visor2").attr("src", "vistas/img/usuarios/defecto.png" );
			}

			$("#rolE").html(respuesta["rol"]);
			$("#rolE").val(respuesta["rol"]);
			$("#claveE").val(respuesta["clave"]);
			
			
		}

	})

})