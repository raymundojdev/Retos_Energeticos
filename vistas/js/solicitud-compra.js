/* -------------------------------------------------------------------------- */
/*               Agregando campos de productos inputs dinamicos               */
/* -------------------------------------------------------------------------- */

function addInput(elem, type) {
  var inputs = $("." + type);

  console.log("inputs", inputs.length);

  if (type == "inputSummary") {
    $(elem).before(
      `

            <div class="table-responsive inputSummary">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col-3">Acciones</th>
                        <th style="width:13%;">Solicitante</th>
                        <th style="width: 50%;">Descripción</th>
                        <th style="width:10%;">Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Tasa</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody >
                    <tr>
                        <td scope="row"><button class="btn btn-danger quitarProducto"  title="Eliminar fila"><i class="lni lni-trash"></i></button></td>
                        <td>
                            <div class="col-md-12">
                            
                                <input type="text" class="form-control" name="solicitanteN_` +
        inputs.length +
        `" required>
                                
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                            
                                <input type="text" class="form-control" name="descripN_` +
        inputs.length +
        `"  required>
                                
                            </div>
                        </td>
                        <td>
                            <div class="col-md-10">
                                
                                <input type="text" class="form-control" name="cantN_` +
        inputs.length +
        `"  required>
                            
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                
                                <input type="text" class="form-control" name="precuniN_` +
        inputs.length +
        `"  required>
                                
                            </div>
                        </td>
                        <td>
                        <div class="col-md-12">
                            
                            <input type="text" class="form-control" name="tasaN_` +
        inputs.length +
        `" required>
                            
                        </div>
                    </td>
                        <td>
                            <div class="col-md-12">
                                
                                <input type="text" class="form-control" name="totalN_` +
        inputs.length +
        `" required>
                                
                            </div>
                        </td>

                    </tr>
                </tbody>
            </table>`
    );
  }

  $('[name="' + type + '"]').val(inputs.length + 1);
}

/* -------------------------------------------------------------------------- */
/*                 Remover filas al formulario de productos                   */
/* -------------------------------------------------------------------------- */

function removeInput(index, type) {
  var inputs = $("." + type);

  if (inputs.length > 1) {
    inputs.each(i => {
      if (i == index) {
        $(inputs[i]).remove();
        // var num;
        // num = inputs.length;
        // inputs.length ;
        // console.log(inputs);
        // console.log(index);
        // console.log(num);
      }
    });
    $('[name="' + type + '"]').val(inputs.length - 1);
  } //else{
  //      fncNotie(3,"At least one entry must exist");
  //  } index = numero de posicion,  inputs = toda la tabla que genera, type = inputSummary
}

/* -------------------------------------------------------------------------- */
/*                 VALIDACION DE ARCHIVOS CHECKBOX SOLICITUD DE COMPRA        */
/* -------------------------------------------------------------------------- */

document
  .getElementById("solicitante")
  .addEventListener("submit", function(event) {
    var checkbox1 = document.getElementById("novalido1");
    var checkbox2 = document.getElementById("novalido2");
    var checkbox3 = document.getElementById("novalido3");
    var inputfile1 = document.getElementById("cuadro_msoliN");
    var inputfile2 = document.getElementById("ofertaprovN");
    var inputfile3 = document.getElementById("especiftecN");

    if (inputfile1.files.length === 0 && !checkbox1.checked) {
      event.preventDefault(); // Evitar el envío del formulario si el checkbox no está marcado

      // Mostrar SweetAlert
      Swal.fire({
        icon: "warning",
        title: "Aviso",
        text:
          "Documento obligatorio, favor de marcar como no valido, para continuar proceso.",
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Aceptar"
      });
    }

    if (inputfile2.files.length === 0 && !checkbox2.checked) {
      event.preventDefault(); // Evitar el envío del formulario si el checkbox no está marcado

      // Mostrar SweetAlert
      Swal.fire({
        icon: "warning",
        title: "Aviso",
        text:
          "Documento obligatorio, favor de marcar como no valido, para continuar proceso.",
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Aceptar"
      });
    }

    if (inputfile3.files.length === 0 && !checkbox3.checked) {
      event.preventDefault(); // Evitar el envío del formulario si el checkbox no está marcado

      // Mostrar SweetAlert
      Swal.fire({
        icon: "warning",
        title: "Aviso",
        text:
          "Documento obligatorio, favor de marcar como no valido, para continuar proceso.",
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Aceptar"
      });
    }
  });

/* -------------------------------------------------------------------------- */
/*                                 TRAER DATOS                                */
/* -------------------------------------------------------------------------- */

$(".TB").on("click", ".btnVistaSolicitud", function() {
  var idSolicitud = $(this).attr("idSolicitud");
  console.log(idSolicitud);
  var datos = new FormData();

  datos.append("idSolicitud", idSolicitud);

  $.ajax({
    url: "ajax/solicitudA.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      $provedor = $("#proveedorNS").html(respuesta["nombre_prov"]);
      console.log("respuesta", respuesta);
      console.log($provedor);

      /* -------------------------------------------------------------------------- */
      /*                        IMPRESION DE DATOS GENERALES                        */
      /* -------------------------------------------------------------------------- */

      $("#idSolicitud2").val(respuesta["id"]);
      $("#proveedorNS").html(respuesta["nombre_prov"]);
      $("#proveedorNS").val(respuesta["nombre_prov"]);
      $("#atnSN").val(respuesta["atnproveedor_soli"]);
      $("#entregaLN").val(respuesta["lugarentr_solicitud"]);
      $("#atnLN").val(respuesta["atn_lentrega"]);
      $("#cpLN").val(respuesta["cp_lentrega"]);
      $("#direccionLN").val(respuesta["direccion_lentrega"]);
      $("#telefonoLN").val(respuesta["telefono_lentrega"]);
      $("#solicitanteLN").val(respuesta["solicitante_lentrega"]);
      $("#emailLN").val(respuesta["email_solicitante"]);
      $("#solicitanteSN").val(respuesta["solicitante_soli"]);
      $("#firmasupN").html(respuesta["nombre"]);
      $("#firmasupN").val(respuesta["nombre"]);
      $("#formaenvN").val(respuesta["forma_env"]);
      $("#incotermsN").val(respuesta["incoterms"]);
      $("#plazoentregaN").val(respuesta["plazo_entr"]);
      $("#clienteeN").html(respuesta["nombrecomercial_cli"]);
      $("#clienteeN").val(respuesta["nombrecomercial_cli"]);
      $("#proyectoN").val(respuesta["proyecto_soli"]);
      $("#seguroincluN").html(respuesta["seguro_inclu"]);
      $("#seguroincluN").val(respuesta["seguro_inclu"]);
      $("#ofertasumN").val(respuesta["oferta_suminis"]);
      $("#condicionesespN").val(respuesta["condicion_especial"]);
      $("#subtotallN").val(respuesta["subtotal_soli"]);
      $("#taxessN").val(respuesta["taxes"]);
      $("#shippingglN").val(respuesta["pago_envio_soli"]);
      $("#otrossN").val(respuesta["otros_soli"]);
      $("#totalsoliN").val(respuesta["total_soli"]);
      $("#monedaaN").val(respuesta["moneda"]);
      $("#cuadroM").attr("download", respuesta["cuadro_msoli"]);
      $("#cuadroM").attr("href", respuesta["cuadro_msoli"]);
      $("#ofertaP").attr("download", respuesta["ofertaprove_soli"]);
      $("#ofertaP").attr("href", respuesta["ofertaprove_soli"]);
      $("#especifiT").attr("download", respuesta["especificacion_tecsoli"]);
      $("#especifiT").attr("href", respuesta["especificacion_tecsoli"]);

      if (respuesta.estado == 4) {
        $("#comentarioenespera").val(respuesta.comentarioenespera);
        $("#Benespera").show();
      } else if (respuesta.estado == 3) {
        $("#comentarioRechazo").val(respuesta.comentarioRechazo);
        $("#Brechazar").show();
      }

      /* -------------------------------------------------------------------------- */
      /*      IMPRESION DE DATOS REFERENCIA, DESCRIPCION,CANTIDAD,TASA,SUBTOTAL     */
      /* -------------------------------------------------------------------------- */
      var texto1 = respuesta["ref_suministrador"];
      var textoSinCaracteres = texto1.replace(/\\/g, "");
      var arreglo = JSON.parse(textoSinCaracteres);

      for (var i = 0; i < arreglo.length; i++) {
        var elemento = arreglo[i];
        console.log(texto1);
        $("#solicitanteN_" + i).val(elemento);
      }

      var texto2 = respuesta["descripcion"];
      var textoSinCaracteres = texto2.replace(/\\/g, "");
      var arreglo = JSON.parse(textoSinCaracteres);

      for (var i = 0; i < arreglo.length; i++) {
        var elemento = arreglo[i];
        console.log(texto2);
        $("#descripN_" + i).val(elemento);
      }

      var texto3 = respuesta["cantidad"];
      var arreglo3 = JSON.parse(texto3);

      for (var i = 0; i < arreglo3.length; i++) {
        var elemento3 = arreglo3[i];
        console.log(elemento3);
        $("#cantN_" + i).val(elemento3);
      }

      var texto4 = respuesta["precio_unitario"];
      var arreglo4 = JSON.parse(texto4);

      for (var i = 0; i < arreglo4.length; i++) {
        var elemento4 = arreglo4[i];
        console.log(elemento4);
        $("#precuniN_" + i).val(elemento4);
      }

      var texto5 = respuesta["tasa"];
      var arreglo5 = JSON.parse(texto5);

      for (var i = 0; i < arreglo5.length; i++) {
        var elemento5 = arreglo5[i];
        console.log(elemento5);
        $("#tasaN_" + i).val(elemento5);
      }

      var texto6 = respuesta["total"];
      var arreglo6 = JSON.parse(texto6);

      for (var i = 0; i < arreglo6.length; i++) {
        var elemento6 = arreglo6[i];
        console.log(elemento6);
        $("#totalesN_" + i).val(elemento6);
      }
    }
  });
});

/* -------------------------------------------------------------------------- */
/*          CONDICION QUE MUESTRA ALERTA SI EL DOCUMENTO VIENE VACIO          */
/* -------------------------------------------------------------------------- */
$("#especifiT").on("click", function(event) {
  var rutaDownload = $(this).attr("download");
  var rutaHref = $(this).attr("href");

  if (!rutaDownload && !rutaHref) {
    event.preventDefault(); // Evita que se siga el enlace

    Swal.fire({
      icon: "warning",
      title: "Archivo vacio.",
      text: "Fue declarado como no valido."
    });
  }
});

$("#ofertaP").on("click", function(event) {
  var rutaDownload2 = $(this).attr("download");
  var rutaHref2 = $(this).attr("href");

  if (!rutaDownload2 && !rutaHref2) {
    event.preventDefault(); // Evita que se siga el enlace

    Swal.fire({
      icon: "warning",
      title: "Archivo vacio.",
      text: "Fue declarado como no valido."
    });
  }
});

$("#cuadroM").on("click", function(event) {
  var rutaDownload3 = $(this).attr("download");
  var rutaHref3 = $(this).attr("href");

  if (!rutaDownload3 && !rutaHref3) {
    event.preventDefault(); // Evita que se siga el enlace

    Swal.fire({
      icon: "warning",
      title: "Archivo vacio.",
      text: "Fue declarado como no valido."
    });
  }
});

/* -------------------------------------------------------------------------- */
/*          /FIN CONDICION QUE MUESTRA ALERTA SI EL DOCUMENTO VIENE VACIO     */
/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                  MOSTRAR Y OCULTAR COMENTARIOS CHECK BOX                   */
/* -------------------------------------------------------------------------- */

$(document).ready(function() {
  $("#aprobarCheckbox").change(function() {
    if ($(this).is(":checked")) {
      $("#Baprobar").show();
      $("#rechazarCheckbox").prop("checked", false);
      $("#enesperaCheckbox").prop("checked", false);
      $("#inputContainer").hide();
      $("#inputContainer2").hide();
      $("#Benespera").hide();
      $("#Brechazar").hide();
    } else {
      $("#Baprobar").hide();
    }
  });

  $("#rechazarCheckbox").change(function() {
    if ($(this).is(":checked")) {
      $("#inputContainer").show();
      $("#inputContainer2").hide();
      $("#Baprobar").hide();
      $("#enesperaCheckbox").prop("checked", false);
      $("#Benespera").hide();
      $("#Brechazar").show();
    } else {
      $("#inputContainer").hide();
      $("#inputContainer2").hide();
      $("#Brechazar").hide();
    }
  });

  $("#enesperaCheckbox").change(function() {
    if ($(this).is(":checked")) {
      $("#inputContainer2").show();
      $("#Baprobar").hide();
      $("#rechazarCheckbox").prop("checked", false);
      $("#Benespera").show();
      $("#Brechazar").hide();
    } else {
      $("#inputContainer2").hide();
      $("#Benespera").hide();
    }
  });
});

/* -------------------------------------------------------------------------- */
/*                             FUNCION DE AUTOSUMA                            */
/* -------------------------------------------------------------------------- */

function formatInputValue(element) {
  var value = element.value;
  var numericValue = value.replace(/[^0-9.]/g, "");
  element.value = "";

  if (numericValue !== "") {
    var parts = numericValue.split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    var formattedValue = "$" + parts.join(".");
    element.value = formattedValue;
  }
}

function calcularS() {
  var totalesN = document.getElementsByName("totalesN[]");
  var taxesN = document.getElementsByName("tasaporN[]");
  var subtotalN = 0;
  var taxes = 0;

  for (var i = 0; i < 13; i++) {
    var a = parseFloat(document.getElementsByName("cantN[]")[i].value) || 0;

    var precuniElement = document.getElementsByName("precuniN[]")[i];
    formatInputValue(precuniElement); // Dar formato en tiempo real
    var b = parseFloat(precuniElement.value.replace(/[^0-9.]/g, "")) || 0;

    var c = parseFloat(document.getElementsByName("tasaN[]")[i].value) || 0;

    var resultado = a * b * c / 100;
    var total = a * b + resultado;
    var resultadoFormateado =
      resultado !== 0
        ? "$" +
          resultado.toLocaleString("en-US", {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
          })
        : "";
    var resultadototal =
      total !== 0
        ? "$" +
          total.toLocaleString("en-US", {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
          })
        : "";

    document.getElementsByName("tasaporN[]")[i].value = resultadoFormateado;
    document.getElementsByName("totalesN[]")[i].value = resultadototal;
  }

  for (var i = 0; i < totalesN.length; i++) {
    var value =
      parseFloat(totalesN[i].value.replace("$", "").replace(",", "")) || 0;
    subtotalN += value;
  }
  document.getElementById("subtotalN").value =
    "$" +
    subtotalN.toLocaleString("en-US", {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2
    });

  for (var i = 0; i < taxesN.length; i++) {
    var value =
      parseFloat(taxesN[i].value.replace("$", "").replace(",", "")) || 0;
    taxes += value;
  }

  document.getElementById("taxesN").value =
    "$" +
    taxes.toLocaleString("en-US", {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2
    });

  var s =
    parseFloat(
      document
        .getElementById("subtotalN")
        .value.replace("$", "")
        .replace(",", "")
    ) || 0;
  var t =
    parseFloat(
      document.getElementById("taxesN").value.replace("$", "").replace(",", "")
    ) || 0;

  var shippinglNElement = document.getElementById("shippinglN");
  formatInputValue(shippinglNElement); // Dar formato en tiempo real
  var sh = parseFloat(shippinglNElement.value.replace(/[^0-9.]/g, "")) || 0;

  var otrosNElement = document.getElementById("otrosN");
  formatInputValue(otrosNElement); // Dar formato en tiempo real
  var o = parseFloat(otrosNElement.value.replace(/[^0-9.]/g, "")) || 0;

  var totalfin = s + t + sh + o;

  document.getElementById("totalN").value =
    "$" +
    totalfin.toLocaleString("en-US", {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2
    });
}

/* -------------------------------------------------------------------------- */
/*                              IMPRIMIR ORDEN DE COMPRA                      */
/* -------------------------------------------------------------------------- */

$(".TB").on("click", ".btnImprimirFactura", function() {
  var idSolicitudFac = $(this).attr("idSolicitudFac");

  window.open(
    "plugins/TCPDF/examples/orden_compra.php?id=" + idSolicitudFac,
    "_blank"
  );
});

/* -------------------------------------------------------------------------- */
/*                              IMPRIMIR SOLICITUD DE COMPRA                  */
/* -------------------------------------------------------------------------- */

$(".TB").on("click", ".btnImprimirSolicitud", function() {
  var idSolicitudFac = $(this).attr("idSolicitudFac");

  window.open(
    "plugins/TCPDF/examples/solicitud-compras_pdf.php?id=" + idSolicitudFac,
    "_blank"
  );
});


/* -------------------------------------------------------------------------- */
/*                       FUNCION LETRAS MAYUSCULAS INPUT                      */
/* -------------------------------------------------------------------------- */
$(".TB").on("click", ".BorrarM", function(){

  var Mid = $(this).attr("Mid");

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
          window.location = "index.php?url=manager&Mid="+Mid;
      
      }
    })
        
      

})