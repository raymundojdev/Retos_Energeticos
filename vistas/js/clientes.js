/* -------------------------------------------------------------------------- */
/*                               EDITAR CLIENTE                               */
/* -------------------------------------------------------------------------- */

$(".TB").on("click",".EditarCliente", function(){

    var idCliente = $(this).attr("idCliente");
    console.log(idCliente);
    var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({

        url:"ajax/clientesA.php",
        method:"POST",
        data:datos,
        cache:false,
        contentType:false,
        processData:false,
        dataType: "json",
        success:function(respuesta){
            console.log(respuesta);

            
            $("#idCliente").val(respuesta["id"]);
            $("#nombrecomercial_cliE").val(respuesta["nombrecomercial_cli"]);
            $("#pais_cliE").val(respuesta["pais_cli"]);
            $("#actividad_cliE").val(respuesta["actividad_cli"]);
            $("#servicios_cliE").val(respuesta["servicios_cli"]);
            $("#distribucion_cliE").val(respuesta["distribucion_cli"]);
            $("#capacitacion_cliE").val(respuesta["capacitacion_cli"]);
            $("#rfc_cliE").val(respuesta["rfc_cli"]);
            $("#direccion_cliE").val(respuesta["direccion_cli"]);
            $("#contacto_comprasE").val(respuesta["contacto_compras"]);
            $("#telefono_cliE").val(respuesta["telefono_cli"]);
            $("#correo_cliE").val(respuesta["correo_cli"]);
            $("#contacto_pagoE").val(respuesta["contacto_pago"]);
            $("#condiventa_cliE").val(respuesta["condiventa_cli"]);
            $("#credito_cliE").val(respuesta["credito_cli"]);
     

        }
    })
})

/* -------------------------------------------------------------------------- */
/*                              ELIMINAR CLIENTES                             */
/* -------------------------------------------------------------------------- */

$(".TB").on("click", ".BorrarClientes", function(){

    var idCliente = $(this).attr("idCliente");

    Swal.fire({
        title: '¿Estas realmente seguro?',
        text: "No podras revertir este proceso!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí!'
      }).then(function(result) {
        if (result.value) {
            window.location = "index.php?url=clientes&idCliente="+idCliente;
        
        }
      })
          
        

})