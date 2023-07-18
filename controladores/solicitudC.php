<?php

class SolicitudC
{


    /* -------------------------------------------------------------------------- */
    /*                                VISTA EMPLEADOS                                */
    /* -------------------------------------------------------------------------- */

    static public function VerSolicitudC($item, $valor)
    {


        //Creamos la variable de Bd

        $tablaBD = "vista_solicitud_general";

        //Solicitamos una respuesta a nuestro modelo y conocectamos una funcion con VerUsuariosM enviaremos los parametros $tablaBD
        $respuesta = SolicitudM::VerSolicitudM($tablaBD, $item, $valor);

        return $respuesta;
    }


    /* -------------------------------------------------------------------------- */
    /*                                VISTA MANAGER                                */
    /* -------------------------------------------------------------------------- */
  

    static public function VistaManagerC($item, $valor)

    {


        //Creamos la variable de Bd

        $tablaBD = "vista_solicitud_factura";

        //Solicitamos una respuesta a nuestro modelo y conocectamos una funcion con VerUsuariosM enviaremos los parametros $tablaBD
        $respuesta = SolicitudM::VistaManagerM($tablaBD, $item, $valor);

        return $respuesta;
    }

    /* -------------------------------------------------------------------------- */
    /*                                VISTA DIRECTOR                                */
    /* -------------------------------------------------------------------------- */
    static public function VistaSolicitudDC($item, $valor,)
    {


        //Creamos la variable de Bd

        $tablaBD = "vista_solicitud_director";

        //Solicitamos una respuesta a nuestro modelo y conocectamos una funcion con VerUsuariosM enviaremos los parametros $tablaBD
        $respuesta = SolicitudM::VerSolicitudDM($tablaBD, $item, $valor);

        return $respuesta;
    }


    /* -------------------------------------------------------------------------- */
    /*                         VISTA DE SOLICITUD MANAGER CONSULTA TRAER DATOS    */
    /* -------------------------------------------------------------------------- */
    static public function VistaSolicitudC($item2, $valor2)
    {
        //Creamos la variable de Bd

        $tablaBD = "vista_solicitud_general";


        //Solicitamos una respuesta a nuestro modelo y conocectamos una funcion con VerUsuariosM enviaremos los parametros $tablaBD
        $respuesta = SolicitudM::VistaSolicitudM($tablaBD, $item2, $valor2);

        return $respuesta;
    }

    /* -------------------------------------------------------------------------- */
    /*                         CONSULTA DATOS FACTURA    */
    /* -------------------------------------------------------------------------- */
    static public function VistaSolicitudFAC($item2, $valor2)
    {
        //Creamos la variable de Bd

        $tablaBD = "vista_solicitud_factura";

        //Solicitamos una respuesta a nuestro modelo y conocectamos una funcion con VerUsuariosM enviaremos los parametros $tablaBD
        $respuesta = SolicitudM::VistaSolicitudFACM($tablaBD, $item2, $valor2);

        return $respuesta;
    }


    /* -------------------------------------------------------------------------- */
    /*                         VISTA DE SOLICITUD MANAGER CONSULTA TRAER DATOS    */
    /* -------------------------------------------------------------------------- */
    static public function VistaSolicitudCOC($item2, $valor2)
    {
        //Creamos la variable de Bd

        $tablaBD = "vista_solicitud_general";


        //Solicitamos una respuesta a nuestro modelo y conocectamos una funcion con VerUsuariosM enviaremos los parametros $tablaBD
        $respuesta = SolicitudM::VistaSolicitudCOM($tablaBD, $item2, $valor2);

        return $respuesta;
    }




    /* -------------------------------------------------------------------------- */
    /*                        Traer datos Managers combobox                       */
    /* -------------------------------------------------------------------------- */
    static public function VersC($item, $valor)
    {
        $tablaBD = "provedores";

        $respuesta = ProveedoresM::EProveedoresM($tablaBD, $item, $valor);

        return $respuesta;
    }


    /* -------------------------------------------------------------------------- */
    /*                               CREAR SOLICITUD                              */
    /* -------------------------------------------------------------------------- */
    static public function CrearSolicitudC()
    {

        if (isset($_POST["proveedorN"])) {


            //declaracion de arreglos inputs


            if (isset($_POST["solicitanteN"]) || isset($_POST["descripN"]) || isset($_POST["cantN"])) {
                $solicitante = $_POST['solicitanteN'];
                $descripcion = $_POST['descripN'];
                $cantidad = $_POST['cantN'];
                $precuni = $_POST['precuniN'];
                $tasa = $_POST['tasaN'];
                $totales = $_POST['totalesN'];

            }

            //declaracion de variable string de ruta
            $rutacuadro = "";
            $rutaofertaprov = "";
            $rutaespeciftec = "";
            if ($_FILES["cuadro_msoliN"]["type"] == "application/pdf") {
                $nombrecuadro = mt_rand(10, 999);
                $rutacuadro = "vistas/img/cmando/Cuadro-mando_" . $nombrecuadro . ".pdf";
                move_uploaded_file($_FILES["cuadro_msoliN"]["tmp_name"], $rutacuadro);
            }


            if ($_FILES["ofertaprovN"]["type"] == "application/pdf") {
                $nombreofertaprov = mt_rand(10, 999);
                $rutaofertaprov = "vistas/img/ofertaprov/Oferta-prov_" . $nombreofertaprov . ".pdf";
                move_uploaded_file($_FILES["ofertaprovN"]["tmp_name"], $rutaofertaprov);
            }


            if ($_FILES["especiftecN"]["type"] == "application/pdf") {
                $nombreespeciftec = mt_rand(10, 999);
                $rutaespeciftec = "vistas/img/especiftec/Especif-tec_" . $nombreespeciftec . ".pdf";
                move_uploaded_file($_FILES["especiftecN"]["tmp_name"], $rutaespeciftec);
            }


            $tablaBD = "solicitud_compra";

            $datosC = array(
                "id_provedor" => $_POST["proveedorN"],
                "codigo" => $_POST["codigoN"],
                "atnproveedor_soli" => $_POST["atnSN"],
                "lugarentr_solicitud" => $_POST["entregaLN"],
                "atn_lentrega" => $_POST["atnLN"],
                "cp_lentrega" => $_POST["cpLN"],
                "direccion_lentrega" => $_POST["direccionLN"],
                "telefono_lentrega" => $_POST["telefonoLN"],
                "firma_superv" => $_POST["firmasupN"],
                "forma_env" => $_POST["formaenvN"],
                "incoterms" => $_POST["incotermsN"],
                "plazo_entr" => $_POST["plazoentregaN"],
                "id_cliente" => $_POST["clienteN"],
                "proyecto_soli" => $_POST["proyectoN"],
                "seguro_inclu" => $_POST["seguroincluN"],
                "oferta_suminis" => $_POST["ofertasumN"],
                "condicion_especial" => $_POST["condicionesespN"],
                "ref_suministrador" => json_encode($solicitante),
                "descripcion" => json_encode($descripcion),
                "cantidad" => json_encode($cantidad),
                "precio_unitario" => json_encode($precuni),
                "tasa" => json_encode($tasa),
                "total" => json_encode($totales),
                "subtotal_soli" => $_POST["subtotalN"],
                "taxes" => $_POST["taxesN"],
                "pago_envio_soli" => $_POST["shippinglN"],
                "otros_soli" => $_POST["otrosN"],
                "total_soli" => $_POST["totalN"],
                "moneda" => $_POST["monedaN"],
                "cuadro_msoli" => $rutacuadro,
                "ofertaprove_soli" => $rutaofertaprov,
                "especificacion_tecsoli" => $rutaespeciftec
            );



            $respuesta = SolicitudM::AgregarSolicitudM($tablaBD, $datosC);

            if ($respuesta) {
                echo '<script>
            window.location = "solicitud-compras";
            </script>';
            }
        }


    }


    /* -------------------------------------------------------------------------- */
    /*                               CREAR ORDEN COMPRA DIRECTOR                   */
    /* -------------------------------------------------------------------------- */
    static public function CrearSolicitudDC()
    {

        if (isset($_POST["proveedorN"])) {


            //declaracion de arreglos inputs


            if (isset($_POST["solicitanteN"]) || isset($_POST["descripN"]) || isset($_POST["cantN"])) {
                $solicitante = $_POST['solicitanteN'];
                $descripcion = $_POST['descripN'];
                $cantidad = $_POST['cantN'];
                $precuni = $_POST['precuniN'];
                $tasa = $_POST['tasaN'];
                $totales = $_POST['totalesN'];

            }

            //declaracion de variable string de ruta
            $rutacuadro = "";
            $rutaofertaprov = "";
            $rutaespeciftec = "";
            if ($_FILES["cuadro_msoliN"]["type"] == "application/pdf") {
                $nombrecuadro = mt_rand(10, 999);
                $rutacuadro = "vistas/img/cmando/Cuadro-mando_" . $nombrecuadro . ".pdf";
                move_uploaded_file($_FILES["cuadro_msoliN"]["tmp_name"], $rutacuadro);
            }


            if ($_FILES["ofertaprovN"]["type"] == "application/pdf") {
                $nombreofertaprov = mt_rand(10, 999);
                $rutaofertaprov = "vistas/img/ofertaprov/Oferta-prov_" . $nombreofertaprov . ".pdf";
                move_uploaded_file($_FILES["ofertaprovN"]["tmp_name"], $rutaofertaprov);
            }


            if ($_FILES["especiftecN"]["type"] == "application/pdf") {
                $nombreespeciftec = mt_rand(10, 999);
                $rutaespeciftec = "vistas/img/especiftec/Especif-tec_" . $nombreespeciftec . ".pdf";
                move_uploaded_file($_FILES["especiftecN"]["tmp_name"], $rutaespeciftec);
            }


            $tablaBD = "solicitud_compra";

            $datosC = array(
                "id_provedor" => $_POST["proveedorN"],
                "codigo" => $_POST["codigoN"],
                "atnproveedor_soli" => $_POST["atnSN"],
                "lugarentr_solicitud" => $_POST["entregaLN"],
                "atn_lentrega" => $_POST["atnLN"],
                "cp_lentrega" => $_POST["cpLN"],
                "direccion_lentrega" => $_POST["direccionLN"],
                "telefono_lentrega" => $_POST["telefonoLN"],
                "firma_superv" => $_POST["firmasupN"],
                "forma_env" => $_POST["formaenvN"],
                "incoterms" => $_POST["incotermsN"],
                "plazo_entr" => $_POST["plazoentregaN"],
                "id_cliente" => $_POST["clienteN"],
                "proyecto_soli" => $_POST["proyectoN"],
                "seguro_inclu" => $_POST["seguroincluN"],
                "oferta_suminis" => $_POST["ofertasumN"],
                "condicion_especial" => $_POST["condicionesespN"],
                "ref_suministrador" => json_encode($solicitante),
                "descripcion" => json_encode($descripcion),
                "cantidad" => json_encode($cantidad),
                "precio_unitario" => json_encode($precuni),
                "tasa" => json_encode($tasa),
                "total" => json_encode($totales),
                "subtotal_soli" => $_POST["subtotalN"],
                "taxes" => $_POST["taxesN"],
                "pago_envio_soli" => $_POST["shippinglN"],
                "otros_soli" => $_POST["otrosN"],
                "total_soli" => $_POST["totalN"],
                "moneda" => $_POST["monedaN"],
                "cuadro_msoli" => $rutacuadro,
                "ofertaprove_soli" => $rutaofertaprov,
                "especificacion_tecsoli" => $rutaespeciftec
            );



            $respuesta = SolicitudM::AgregarSolicitudDM($tablaBD, $datosC);

            if ($respuesta) {
                echo '<script>
            window.location = "solicitud-compras";
            </script>';
            }
        }


    }


    /* -------------------------------------------------------------------------- */
    /*                               CREAR ORDEN COMPRA MANAGER                   */
    /* -------------------------------------------------------------------------- */
    static public function CrearSolicitudMC()
    {

        if (isset($_POST["proveedorN"])) {


            //declaracion de arreglos inputs


            if (isset($_POST["solicitanteN"]) || isset($_POST["descripN"]) || isset($_POST["cantN"])) {
                $solicitante = $_POST['solicitanteN'];
                $descripcion = $_POST['descripN'];
                $cantidad = $_POST['cantN'];
                $precuni = $_POST['precuniN'];
                $tasa = $_POST['tasaN'];
                $totales = $_POST['totalesN'];

            }

            //declaracion de variable string de ruta
            $rutacuadro = "";
            $rutaofertaprov = "";
            $rutaespeciftec = "";
            if ($_FILES["cuadro_msoliN"]["type"] == "application/pdf") {
                $nombrecuadro = mt_rand(10, 999);
                $rutacuadro = "vistas/img/cmando/Cuadro-mando_" . $nombrecuadro . ".pdf";
                move_uploaded_file($_FILES["cuadro_msoliN"]["tmp_name"], $rutacuadro);
            }


            if ($_FILES["ofertaprovN"]["type"] == "application/pdf") {
                $nombreofertaprov = mt_rand(10, 999);
                $rutaofertaprov = "vistas/img/ofertaprov/Oferta-prov_" . $nombreofertaprov . ".pdf";
                move_uploaded_file($_FILES["ofertaprovN"]["tmp_name"], $rutaofertaprov);
            }


            if ($_FILES["especiftecN"]["type"] == "application/pdf") {
                $nombreespeciftec = mt_rand(10, 999);
                $rutaespeciftec = "vistas/img/especiftec/Especif-tec_" . $nombreespeciftec . ".pdf";
                move_uploaded_file($_FILES["especiftecN"]["tmp_name"], $rutaespeciftec);
            }


            $tablaBD = "solicitud_compra";

            $datosC = array(
                "id_provedor" => $_POST["proveedorN"],
                "codigo" => $_POST["codigoN"],
                "atnproveedor_soli" => $_POST["atnSN"],
                "lugarentr_solicitud" => $_POST["entregaLN"],
                "atn_lentrega" => $_POST["atnLN"],
                "cp_lentrega" => $_POST["cpLN"],
                "direccion_lentrega" => $_POST["direccionLN"],
                "telefono_lentrega" => $_POST["telefonoLN"],
                "firma_superv" => $_POST["firmasupN"],
                "forma_env" => $_POST["formaenvN"],
                "incoterms" => $_POST["incotermsN"],
                "plazo_entr" => $_POST["plazoentregaN"],
                "id_cliente" => $_POST["clienteN"],
                "proyecto_soli" => $_POST["proyectoN"],
                "seguro_inclu" => $_POST["seguroincluN"],
                "oferta_suminis" => $_POST["ofertasumN"],
                "condicion_especial" => $_POST["condicionesespN"],
                "ref_suministrador" => json_decode($solicitante),
                "descripcion" => json_decode($descripcion),
                "cantidad" => json_decode($cantidad),
                "precio_unitario" => json_decode($precuni),
                "tasa" => json_decode($tasa),
                "total" => json_decode($totales),
                "subtotal_soli" => $_POST["subtotalN"],
                "taxes" => $_POST["taxesN"],
                "pago_envio_soli" => $_POST["shippinglN"],
                "otros_soli" => $_POST["otrosN"],
                "total_soli" => $_POST["totalN"],
                "moneda" => $_POST["monedaN"],
                "cuadro_msoli" => $rutacuadro,
                "ofertaprove_soli" => $rutaofertaprov,
                "especificacion_tecsoli" => $rutaespeciftec
            );



            $respuesta = SolicitudM::AgregarSolicitudMANM($tablaBD, $datosC);

            if ($respuesta) {
                echo '<script>
            window.location = "solicitud-compras";
            </script>';
            }
        }


    }

    public function ActualizarARSolicitudC()
	{
       
		if (isset($_POST["comentarioRechazo"])) {		
            $comentario = $_POST["comentarioRechazo"];
			$tablaBD = "solicitud_compra";

			$datosC = array(
				"id" => $_POST["idSolicitud"], "comentarios" => $_POST["comentarioRechazo"]
                
			);

			$respuesta = SolicitudM::ActualizarARSolicitudM($tablaBD, $datosC,$comentario);


			if ($respuesta == true) {

				echo '
				<div class="alert alert-dismissible fade show py-2 bg-success">
                <div class="d-flex align-items-center">
                  <div class="fs-3 text-white"><ion-icon name="checkmark-circle-sharp" role="img" class="md hydrated" aria-label="checkmark circle sharp"></ion-icon>
                  </div>
                  <div class="ms-3">
                    <div class="text-white">Usuario actualizado con exito!</div>
                  </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
				<script>
						window.location ="manager";
						</script>';
			} else {

				echo '<div class="alert alert-dismissible fade show py-2 bg-danger">
					<div class="d-flex align-items-center">
					  <div class="fs-3 text-white"><ion-icon name="checkmark-circle-sharp" role="img" class="md hydrated" aria-label="checkmark circle sharp"></ion-icon>
					  </div>
					  <div class="ms-3">
						<div class="text-white">Error al actualizar proveedor!</div>
					  </div>
					</div>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  </div>';
			}
		}
	}




    public function ActualizarDSolicitudC()
	{
       
		if (isset($_POST["comentarioRechazo"])) {		
            $comentario = $_POST["comentarioRechazo"];
			$tablaBD = "solicitud_compra";

			$datosC = array(
				"id" => $_POST["idSolicitud"], "comentarios" => $_POST["comentarioRechazo"]
                
			);

			$respuesta = SolicitudM::ActualizarSolicitudDM($tablaBD, $datosC,$comentario);


			if ($respuesta == true) {

				echo '
				<div class="alert alert-dismissible fade show py-2 bg-success">
                <div class="d-flex align-items-center">
                  <div class="fs-3 text-white"><ion-icon name="checkmark-circle-sharp" role="img" class="md hydrated" aria-label="checkmark circle sharp"></ion-icon>
                  </div>
                  <div class="ms-3">
                    <div class="text-white">Usuario actualizado con exito!</div>
                  </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
				<script>
						window.location ="manager";
						</script>';
			} else {

				echo '<div class="alert alert-dismissible fade show py-2 bg-danger">
					<div class="d-flex align-items-center">
					  <div class="fs-3 text-white"><ion-icon name="checkmark-circle-sharp" role="img" class="md hydrated" aria-label="checkmark circle sharp"></ion-icon>
					  </div>
					  <div class="ms-3">
						<div class="text-white">Error al actualizar proveedor!</div>
					  </div>
					</div>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  </div>';
			}
		}
	}

    /* -------------------------------------------------------------------------- */
    /*                       ACTUALIZAR ESTADO DE SOLICITUD MANAGER                       */
    /* -------------------------------------------------------------------------- */

    //  public function ActualizarDSolicitudC()
	//  {

	//  	if ($_POST['ace'] || $_POST['R']) {
    //          $comentario = $_POST["comentarioRechazo"];
    //          $comentario2 = $_POST["aceptar"];
	// 		$tablaBD = "solicitud_compra";

	// 		$datosC = array(
	//  			"id" => $_POST["idSolicitud"], "comentarios" => $_POST["comentarioRechazos"]

	//  		);

    //          if($_POST['comentarioenace']){
    //              $respuesta = SolicitudM::ActualizarSolicitudDM($tablaBD, $datosC,$comentario);
    //          }else if ($_POST['comentarioR']) {
    //             $respuesta = SolicitudM::ActualizarSolicitudDM($tablaBD, $datosC,$comentario);
    //          }

	//  		if ($respuesta == true) {

	//  			echo '
	//  			<div class="alert alert-dismissible fade show py-2 bg-success">
    //              <div class="d-flex align-items-center">
    //                <div class="fs-3 text-white"><ion-icon name="checkmark-circle-sharp" role="img" class="md hydrated" aria-label="checkmark circle sharp"></ion-icon>
    //                </div>
    //                <div class="ms-3">
    //                  <div class="text-white">Usuario actualizado con exito!</div>
    //                </div>
    //              </div>
    //              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //            </div>
	//  			<script>
	//  					window.location ="manager";
	//  					</script>';
	//  		} else {

	//  			echo '<div class="alert alert-dismissible fade show py-2 bg-danger">
	//  				<div class="d-flex align-items-center">
	//  				  <div class="fs-3 text-white"><ion-icon name="checkmark-circle-sharp" role="img" class="md hydrated" aria-label="checkmark circle sharp"></ion-icon>
	//  				  </div>
	//  				  <div class="ms-3">
	//  					<div class="text-white">Error al actualizar !</div>
	//  				  </div>
	//  				</div>
	//  				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	//  			  </div>';
	//  		}
	//  	}
	// }


    


     /* -------------------------------------------------------------------------- */
    /*                       ACTUALIZAR ESTADO DE SOLICITUD                       */
    /* -------------------------------------------------------------------------- */

    // public function ActualizarDIRECSolicitudDC()
	// {

	// 	if ($_POST['comentarioenace']) {
    //         // $comentario = $_POST["comentarioRechazo"];
    //         // $comentario2 = $_POST["aceptar"];
	// 		$tablaBD = "solicitud_compra";

	// 		$datosC = array(
	// 			"id" => $_POST["idSolicitud"], "comentarios" => $_POST["comentarioRechazos"]

	// 		);

    //         if($_POST['comentarioenace']){
    //             $respuesta = SolicitudM::ActualizarARSolicitudM($tablaBD, $datosC);
    //         }else if ($_POST['comentarioR']) {
    //            $respuesta = SolicitudM::ActualizarARSolicitudM($tablaBD, $datosC);
    //         }

	// 		if ($respuesta == true) {

	// 			echo '
	// 			<div class="alert alert-dismissible fade show py-2 bg-success">
    //             <div class="d-flex align-items-center">
    //               <div class="fs-3 text-white"><ion-icon name="checkmark-circle-sharp" role="img" class="md hydrated" aria-label="checkmark circle sharp"></ion-icon>
    //               </div>
    //               <div class="ms-3">
    //                 <div class="text-white">Usuario actualizado con exito!</div>
    //               </div>
    //             </div>
    //             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //           </div>
	// 			<script>
	// 					window.location ="manager";
	// 					</script>';
	// 		} else {

	// 			echo '<div class="alert alert-dismissible fade show py-2 bg-danger">
	// 				<div class="d-flex align-items-center">
	// 				  <div class="fs-3 text-white"><ion-icon name="checkmark-circle-sharp" role="img" class="md hydrated" aria-label="checkmark circle sharp"></ion-icon>
	// 				  </div>
	// 				  <div class="ms-3">
	// 					<div class="text-white">Error al actualizar !</div>
	// 				  </div>
	// 				</div>
	// 				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	// 			  </div>';
	// 		}
	// 	}
	// }


    /* -------------------------------------------------------------------------- */
    /*                             ELIMINAR SOLICITUD                             */
    /* -------------------------------------------------------------------------- */    
    
    public function EliminarSolicitudC(){
		
		  
		if (isset($_GET["Mid"])) {

			$tablaBD = "solicitud_compra";
			
			$datosC  = $_GET["Mid"];

			$respuesta = SolicitudM::BorrarSolicitudM($tablaBD, $datosC);

			if ($respuesta == true) {
				echo '
				<script>
						window.location ="manager";
						</script>';
			} else {
				echo 'Error al eliminar solicitud de compra';
			}
		}
    }


     /* -------------------------------------------------------------------------- */
    /*                             ELIMINAR SOLICITUD COMPRAS                      */
    /* -------------------------------------------------------------------------- */ 
    public function EliminarSolicitudCO(){
		
		  
		if (isset($_GET["COid"])) {

			$tablaBD = "solicitud_compra";
			
			$datosC  = $_GET["COid"];

			$respuesta = SolicitudM::BorrarSolicitudM($tablaBD, $datosC);

			if ($respuesta == true) {
				echo '
				<script>
						window.location ="solicitud-compraCO";
						</script>';
			} else {
				echo 'Error al eliminar solicitud de compra';
			}
		}
    }

    /* -------------------------------------------------------------------------- */
    /*                             ELIMINAR SOLICITUD DIRECTOR                      */
    /* -------------------------------------------------------------------------- */ 
    public function EliminarSolicitudCD(){
		
		  
		if (isset($_GET["Did"])) {

			$tablaBD = "solicitud_compra";
			
			$datosC  = $_GET["Did"];

			$respuesta = SolicitudM::BorrarSolicitudM($tablaBD, $datosC);

			if ($respuesta == true) {
				echo '
				<script>
						window.location ="orden-compraD";
						</script>';
			} else {
				echo 'Error al eliminar solicitud de compra';
			}
		}
    }

    /* -------------------------------------------------------------------------- */
    /*                             ELIMINAR SOLICITUD MANAGER                      */
    /* -------------------------------------------------------------------------- */ 
    public function EliminarSolicitudCMA(){
		
		  
		if (isset($_GET["MAid"])) {

			$tablaBD = "solicitud_compra";
			
			$datosC  = $_GET["MAid"];

			$respuesta = SolicitudM::BorrarSolicitudM($tablaBD, $datosC);

			if ($respuesta == true) {
				echo '
				<script>
						window.location ="manager";
						</script>';
			} else {
				echo 'Error al eliminar solicitud de compra';
			}
		}
    }

}
