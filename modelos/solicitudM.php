<?php

require_once "ConexionBD.php";

class SolicitudM extends ConexionBD
{

    /* -------------------------------------------------------------------------- */
    /*                               VISTA EMPLEADOS                               */
    /* -------------------------------------------------------------------------- */
    static public function VerSolicitudM($tablaBD, $item, $valor)
    {
        $idsuario = $_SESSION["id"];

        if ($item != null) {


            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $item = :$item AND status =1 ");

            $pdo->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $pdo->execute();

            return $pdo->fetchAll();
        } else {


            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE status = 1 AND id_usuario = $idsuario ");


            $pdo->execute();

            return $pdo->fetchAll();
        }
        $pdo->close();
        $pdo = null;
    }

    /* -------------------------------------------------------------------------- */
    /*                               VISTA FACTURA                               */
    /* -------------------------------------------------------------------------- */
    static public function VistaSolicitudFACM($tablaBD, $itemFac, $valorFac)
    {
        if ($itemFac != null) {

            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE UPPER($itemFac = :$itemFac) AND status = 1 ");

            $pdo->bindParam(":" . $itemFac, $valorFac, PDO::PARAM_STR);

            $pdo->execute();

            return $pdo->fetch();
        } else {
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE status = 1 ");

            $pdo->execute();

            return $pdo->fetchAll();
        }

        $pdo->close();
        $pdo = null;
    }



    /* -------------------------------------------------------------------------- */
    /*                                VISTA MANAGER                                */
    /* -------------------------------------------------------------------------- */
    static public function VistaManagerM($tablaBD, $item, $valor)
    {
        $idsuario = $_SESSION["id"];

        if ($item != null) {


            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $item = :$item AND status = 1 ");

            $pdo->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $pdo->execute();

            return $pdo->fetchAll();
        } else {


            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE status = 1  AND firma_superv = $idsuario");



            $pdo->execute();

            return $pdo->fetchAll();
        }
        $pdo->close();
        $pdo = null;
    }

    /* -------------------------------------------------------------------------- */
    /*                               VISTA DIRECTOR                               */
    /* -------------------------------------------------------------------------- */
    static public function VerSolicitudDM($tablaBD, $item, $valor)
    {
        $idsuario = $_SESSION["id"];

        if ($item != null) {


            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $item = :$item AND status =1 ");

            $pdo->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $pdo->execute();

            return $pdo->fetchAll();
        } else {


            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE status = 1  AND estado = 2 ");


            $pdo->execute();

            return $pdo->fetchAll();
        }
        $pdo->close();
        $pdo = null;
    }

    /* -------------------------------------------------------------------------- */
    /*                               VISTA COMPRAS                               */
    /* -------------------------------------------------------------------------- */
    static public function VistaSolicitudCOM($tablaBD, $item, $valor)
    {
        $idsuario = $_SESSION["id"];

        if ($item != null) {


            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $item = :$item AND status =1 ");

            $pdo->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $pdo->execute();

            return $pdo->fetchAll();
        } else {


            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE status = 1  AND estado = 5 ");


            $pdo->execute();

            return $pdo->fetchAll();
        }
        $pdo->close();
        $pdo = null;
    }




    /* -------------------------------------------------------------------------- */
    /*                            CONSULTA TRAER DATOS                            */
    /* -------------------------------------------------------------------------- */
    static public function VistaSolicitudM($tablaBD, $item2, $valor2)
    {


        if ($item2 != null) {


            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $item2 = :$item2 AND status=1");

            $pdo->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

            $pdo->execute();

            return $pdo->fetch();
        } else {


            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE status = 1");

            $pdo->execute();

            return $pdo->fetchAll();
        }

        $pdo->close();
        $pdo = null;
    }

    /* -------------------------------------------------------------------------- */
    /*                        insert de datos de solicitud                        */
    /* -------------------------------------------------------------------------- */

    static public function AgregarSolicitudM($tablaBD, $datosC)
    {

        date_default_timezone_set('America/Mexico_City');
        $fecha = date('Y-m-d H:i:s');
        $fechatext = date('d/m/Y H:i:s', strtotime($fecha));
        $solicitante = $_SESSION['nombre'];
        $email = $_SESSION["correo"];
        $iniciales = $_SESSION["iniciales_firma"];
        $idsuario = $_SESSION["id"];
        // $Creofechayhora = $creo . ' ' . $fechatext;

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD 
        (id_provedor,codigo,atnproveedor_soli, lugarentr_solicitud,atn_lentrega,cp_lentrega,
        direccion_lentrega,telefono_lentrega,solicitante_lentrega,email_solicitante
        ,solicitante_soli,firma_superv,forma_env,incoterms,plazo_entr,id_cliente,
        proyecto_soli,seguro_inclu,oferta_suminis,condicion_especial,ref_suministrador,
        descripcion,cantidad,precio_unitario,tasa,total,subtotal_soli,taxes,
        pago_envio_soli,otros_soli,total_soli,moneda,cuadro_msoli,ofertaprove_soli,
        especificacion_tecsoli,status, estado,id_tipo_proceso,
        id_usuario) 

         
        VALUES 
        (:id_provedor,:codigo,:atnproveedor_soli, :lugarentr_solicitud,:atn_lentrega,:cp_lentrega,
        :direccion_lentrega,:telefono_lentrega,'$solicitante','$email','$iniciales',:firma_superv,:forma_env,
        :incoterms,:plazo_entr,:id_cliente,
        :proyecto_soli,:seguro_inclu,:oferta_suminis,:condicion_especial,:ref_suministrador,
        :descripcion,:cantidad,:precio_unitario,:tasa,:total,:subtotal_soli,:taxes,
        :pago_envio_soli,:otros_soli,:total_soli,:moneda,:cuadro_msoli,:ofertaprove_soli,
        :especificacion_tecsoli,1, 1,1,$idsuario)");

        $pdo->bindParam(":id_provedor", $datosC["id_provedor"], PDO::PARAM_INT);
        $pdo->bindParam(":codigo", $datosC["codigo"], PDO::PARAM_STR);
        $pdo->bindParam(":atnproveedor_soli", $datosC["atnproveedor_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":lugarentr_solicitud", $datosC["lugarentr_solicitud"], PDO::PARAM_STR);
        $pdo->bindParam(":atn_lentrega", $datosC["atn_lentrega"], PDO::PARAM_STR);
        $pdo->bindParam(":cp_lentrega", $datosC["cp_lentrega"], PDO::PARAM_STR);
        $pdo->bindParam(":direccion_lentrega", $datosC["direccion_lentrega"], PDO::PARAM_STR);
        $pdo->bindParam(":telefono_lentrega", $datosC["telefono_lentrega"], PDO::PARAM_STR);
        $pdo->bindParam(":firma_superv", $datosC["firma_superv"], PDO::PARAM_STR);
        $pdo->bindParam(":forma_env", $datosC["forma_env"], PDO::PARAM_STR);
        $pdo->bindParam(":incoterms", $datosC["incoterms"], PDO::PARAM_STR);
        $pdo->bindParam(":plazo_entr", $datosC["plazo_entr"], PDO::PARAM_STR);
        $pdo->bindParam(":id_cliente", $datosC["id_cliente"], PDO::PARAM_STR);
        $pdo->bindParam(":proyecto_soli", $datosC["proyecto_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":seguro_inclu", $datosC["seguro_inclu"], PDO::PARAM_STR);
        $pdo->bindParam(":oferta_suminis", $datosC["oferta_suminis"], PDO::PARAM_STR);
        $pdo->bindParam(":condicion_especial", $datosC["condicion_especial"], PDO::PARAM_STR);
        $pdo->bindParam(":ref_suministrador", $datosC["ref_suministrador"], PDO::PARAM_STR);
        $pdo->bindParam(":descripcion", $datosC["descripcion"], PDO::PARAM_STR);
        $pdo->bindParam(":cantidad", $datosC["cantidad"], PDO::PARAM_STR);
        $pdo->bindParam(":precio_unitario", $datosC["precio_unitario"], PDO::PARAM_STR);
        $pdo->bindParam(":tasa", $datosC["tasa"], PDO::PARAM_STR);
        $pdo->bindParam(":total", $datosC["total"], PDO::PARAM_STR);
        $pdo->bindParam(":subtotal_soli", $datosC["subtotal_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":taxes", $datosC["taxes"], PDO::PARAM_STR);
        $pdo->bindParam(":pago_envio_soli", $datosC["pago_envio_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":otros_soli", $datosC["otros_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":total_soli", $datosC["total_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":moneda", $datosC["moneda"], PDO::PARAM_STR);
        $pdo->bindParam(":cuadro_msoli", $datosC["cuadro_msoli"], PDO::PARAM_STR);
        $pdo->bindParam(":ofertaprove_soli", $datosC["ofertaprove_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":especificacion_tecsoli", $datosC["especificacion_tecsoli"], PDO::PARAM_STR);



        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }

        $pdo->close();
        $pdo = null;
    }

    /* -------------------------------------------------------------------------- */
    /*                        insert de datos de orden de compra director          */
    /* -------------------------------------------------------------------------- */

    static public function AgregarSolicitudDM($tablaBD, $datosC)
    {

        date_default_timezone_set('America/Mexico_City');
        $fecha = date('Y-m-d H:i:s');
        $fechatext = date('d/m/Y H:i:s', strtotime($fecha));
        $solicitante = $_SESSION['nombre'];
        $email = $_SESSION["correo"];
        $iniciales = $_SESSION["iniciales_firma"];
        $idsuario = $_SESSION["id"];

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD 
        (id_provedor,codigo,atnproveedor_soli, lugarentr_solicitud,atn_lentrega,cp_lentrega,
        direccion_lentrega,telefono_lentrega,solicitante_lentrega,email_solicitante
        ,solicitante_soli,firma_superv,forma_env,incoterms,plazo_entr,id_cliente,
        proyecto_soli,seguro_inclu,oferta_suminis,condicion_especial,ref_suministrador,
        descripcion,cantidad,precio_unitario,tasa,total,subtotal_soli,taxes,
        pago_envio_soli,otros_soli,total_soli,moneda,cuadro_msoli,ofertaprove_soli,
        especificacion_tecsoli,comentarios,status, estado,id_tipo_proceso,
        id_usuario) 

         
        VALUES 
        (:id_provedor,:codigo,:atnproveedor_soli, :lugarentr_solicitud,:atn_lentrega,:cp_lentrega,
        :direccion_lentrega,:telefono_lentrega,'$solicitante','$email','$iniciales',:firma_superv,:forma_env,
        :incoterms,:plazo_entr,:id_cliente,
        :proyecto_soli,:seguro_inclu,:oferta_suminis,:condicion_especial,:ref_suministrador,
        :descripcion,:cantidad,:precio_unitario,:tasa,:total,:subtotal_soli,:taxes,
        :pago_envio_soli,:otros_soli,:total_soli,:moneda,:cuadro_msoli,:ofertaprove_soli,
        :especificacion_tecsoli,1,1, 5,2,$idsuario)");

        $pdo->bindParam(":id_provedor", $datosC["id_provedor"], PDO::PARAM_INT);
        $pdo->bindParam(":codigo", $datosC["codigo"], PDO::PARAM_STR);
        $pdo->bindParam(":atnproveedor_soli", $datosC["atnproveedor_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":lugarentr_solicitud", $datosC["lugarentr_solicitud"], PDO::PARAM_STR);
        $pdo->bindParam(":atn_lentrega", $datosC["atn_lentrega"], PDO::PARAM_STR);
        $pdo->bindParam(":cp_lentrega", $datosC["cp_lentrega"], PDO::PARAM_STR);
        $pdo->bindParam(":direccion_lentrega", $datosC["direccion_lentrega"], PDO::PARAM_STR);
        $pdo->bindParam(":telefono_lentrega", $datosC["telefono_lentrega"], PDO::PARAM_STR);
        $pdo->bindParam(":firma_superv", $datosC["firma_superv"], PDO::PARAM_STR);
        $pdo->bindParam(":forma_env", $datosC["forma_env"], PDO::PARAM_STR);
        $pdo->bindParam(":incoterms", $datosC["incoterms"], PDO::PARAM_STR);
        $pdo->bindParam(":plazo_entr", $datosC["plazo_entr"], PDO::PARAM_STR);
        $pdo->bindParam(":id_cliente", $datosC["id_cliente"], PDO::PARAM_STR);
        $pdo->bindParam(":proyecto_soli", $datosC["proyecto_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":seguro_inclu", $datosC["seguro_inclu"], PDO::PARAM_STR);
        $pdo->bindParam(":oferta_suminis", $datosC["oferta_suminis"], PDO::PARAM_STR);
        $pdo->bindParam(":condicion_especial", $datosC["condicion_especial"], PDO::PARAM_STR);
        $pdo->bindParam(":ref_suministrador", $datosC["ref_suministrador"], PDO::PARAM_STR);
        $pdo->bindParam(":descripcion", $datosC["descripcion"], PDO::PARAM_STR);
        $pdo->bindParam(":cantidad", $datosC["cantidad"], PDO::PARAM_STR);
        $pdo->bindParam(":precio_unitario", $datosC["precio_unitario"], PDO::PARAM_STR);
        $pdo->bindParam(":tasa", $datosC["tasa"], PDO::PARAM_STR);
        $pdo->bindParam(":total", $datosC["total"], PDO::PARAM_STR);
        $pdo->bindParam(":subtotal_soli", $datosC["subtotal_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":taxes", $datosC["taxes"], PDO::PARAM_STR);
        $pdo->bindParam(":pago_envio_soli", $datosC["pago_envio_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":otros_soli", $datosC["otros_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":total_soli", $datosC["total_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":moneda", $datosC["moneda"], PDO::PARAM_STR);
        $pdo->bindParam(":cuadro_msoli", $datosC["cuadro_msoli"], PDO::PARAM_STR);
        $pdo->bindParam(":ofertaprove_soli", $datosC["ofertaprove_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":especificacion_tecsoli", $datosC["especificacion_tecsoli"], PDO::PARAM_STR);



        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }

        $pdo->close();
        $pdo = null;
    }


    /* -------------------------------------------------------------------------- */
    /*                        insert de datos de orden de compra manager          */
    /* -------------------------------------------------------------------------- */

    static public function AgregarSolicitudMANM($tablaBD, $datosC)
    {

        date_default_timezone_set('America/Mexico_City');
        $fecha = date('Y-m-d H:i:s');
        $fechatext = date('d/m/Y H:i:s', strtotime($fecha));
        $solicitante = $_SESSION['nombre'];
        $email = $_SESSION["correo"];
        $iniciales = $_SESSION["iniciales_firma"];
        $idsuario = $_SESSION["id"];

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD 
        (id_provedor,codigo,atnproveedor_soli, lugarentr_solicitud,atn_lentrega,cp_lentrega,
        direccion_lentrega,telefono_lentrega,solicitante_lentrega,email_solicitante
        ,solicitante_soli,firma_superv,forma_env,incoterms,plazo_entr,id_cliente,
        proyecto_soli,seguro_inclu,oferta_suminis,condicion_especial,ref_suministrador,
        descripcion,cantidad,precio_unitario,tasa,total,subtotal_soli,taxes,
        pago_envio_soli,otros_soli,total_soli,moneda,cuadro_msoli,ofertaprove_soli,
        especificacion_tecsoli,status, estado,id_tipo_proceso,
        id_usuario) 

         
        VALUES 
        (:id_provedor,:codigo,:atnproveedor_soli, :lugarentr_solicitud,:atn_lentrega,:cp_lentrega,
        :direccion_lentrega,:telefono_lentrega,'$solicitante','$email','$iniciales',:firma_superv,:forma_env,
        :incoterms,:plazo_entr,:id_cliente,
        :proyecto_soli,:seguro_inclu,:oferta_suminis,:condicion_especial,:ref_suministrador,
        :descripcion,:cantidad,:precio_unitario,:tasa,:total,:subtotal_soli,:taxes,
        :pago_envio_soli,:otros_soli,:total_soli,:moneda,:cuadro_msoli,:ofertaprove_soli,
        :especificacion_tecsoli,1, 2,2,$idsuario)");

        $pdo->bindParam(":id_provedor", $datosC["id_provedor"], PDO::PARAM_INT);
        $pdo->bindParam(":codigo", $datosC["codigo"], PDO::PARAM_STR);
        $pdo->bindParam(":atnproveedor_soli", $datosC["atnproveedor_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":lugarentr_solicitud", $datosC["lugarentr_solicitud"], PDO::PARAM_STR);
        $pdo->bindParam(":atn_lentrega", $datosC["atn_lentrega"], PDO::PARAM_STR);
        $pdo->bindParam(":cp_lentrega", $datosC["cp_lentrega"], PDO::PARAM_STR);
        $pdo->bindParam(":direccion_lentrega", $datosC["direccion_lentrega"], PDO::PARAM_STR);
        $pdo->bindParam(":telefono_lentrega", $datosC["telefono_lentrega"], PDO::PARAM_STR);
        $pdo->bindParam(":firma_superv", $datosC["firma_superv"], PDO::PARAM_STR);
        $pdo->bindParam(":forma_env", $datosC["forma_env"], PDO::PARAM_STR);
        $pdo->bindParam(":incoterms", $datosC["incoterms"], PDO::PARAM_STR);
        $pdo->bindParam(":plazo_entr", $datosC["plazo_entr"], PDO::PARAM_STR);
        $pdo->bindParam(":id_cliente", $datosC["id_cliente"], PDO::PARAM_STR);
        $pdo->bindParam(":proyecto_soli", $datosC["proyecto_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":seguro_inclu", $datosC["seguro_inclu"], PDO::PARAM_STR);
        $pdo->bindParam(":oferta_suminis", $datosC["oferta_suminis"], PDO::PARAM_STR);
        $pdo->bindParam(":condicion_especial", $datosC["condicion_especial"], PDO::PARAM_STR);
        $pdo->bindParam(":ref_suministrador", $datosC["ref_suministrador"], PDO::PARAM_STR);
        $pdo->bindParam(":descripcion", $datosC["descripcion"], PDO::PARAM_STR);
        $pdo->bindParam(":cantidad", $datosC["cantidad"], PDO::PARAM_STR);
        $pdo->bindParam(":precio_unitario", $datosC["precio_unitario"], PDO::PARAM_STR);
        $pdo->bindParam(":tasa", $datosC["tasa"], PDO::PARAM_STR);
        $pdo->bindParam(":total", $datosC["total"], PDO::PARAM_STR);
        $pdo->bindParam(":subtotal_soli", $datosC["subtotal_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":taxes", $datosC["taxes"], PDO::PARAM_STR);
        $pdo->bindParam(":pago_envio_soli", $datosC["pago_envio_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":otros_soli", $datosC["otros_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":total_soli", $datosC["total_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":moneda", $datosC["moneda"], PDO::PARAM_STR);
        $pdo->bindParam(":cuadro_msoli", $datosC["cuadro_msoli"], PDO::PARAM_STR);
        $pdo->bindParam(":ofertaprove_soli", $datosC["ofertaprove_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":especificacion_tecsoli", $datosC["especificacion_tecsoli"], PDO::PARAM_STR);



        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }

        $pdo->close();
        $pdo = null;
    }



    /* --------------------------------------------------------------------------*/
    /*                     Aprobar,Rechazar datos solicitud Manager              */
    /* --------------------------------------------------------------------------*/

    static public function ActualizarARSolicitudM($tablaBD, $datosC, $comentario)
    {

        if (isset($comentario) && !empty($comentario)) {
            $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET comentarios = :comentarios, 
             estado = 3, id_tipo_proceso= 1  WHERE id = :id");

            $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
            $pdo->bindParam(":comentarios", $datosC["comentarios"], PDO::PARAM_STR);


            if ($pdo->execute()) {
                return true;
            } else{
                return false;
            }

            $pdo->close();
            $pdo = null;

        } else {

            $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET comentarios = :comentarios, 
             estado = 2, id_tipo_proceso= 2  WHERE id = :id");

            $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
            $pdo->bindParam(":comentarios", $datosC["comentarios"], PDO::PARAM_STR);

            if ($pdo->execute()) {
                return true;
            } else {
                return false;
            }
            $pdo->close();
            $pdo = null;
        }
    }



    /* --------------------------------------------------------------------------*/
    /*                             Rechazar datos solicitud                    */
    /* --------------------------------------------------------------------------*/
    // static public function ActualizarARSolicitudM($tablaBD, $datosC)   {


    //         $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET comentarios = :comentarios, 
    //          estado = 2, id_tipo_proceso = 2  WHERE id = :id");

    //         $pdo->bindParam(":id ", $datosC["id"], PDO::PARAM_INT);
    //         $pdo->bindParam(":comentarios", $datosC["comentarios"], PDO::PARAM_STR);

    //         if ($pdo->execute()) {
    //             return true;
    //         } else {
    //             return false;
    //         }

    //         $pdo->close();
    //         $pdo = null;


    // }


    /* --------------------------------------------------------------------------*/
    /*                             aprobar datos solicitud                    */
    /* --------------------------------------------------------------------------*/
     static public function ActualizarARaprobarSolicitudM($tablaBD, $datosC, $comentario, $comentario2)
     {

          if ($comentario != null) {
              $estado = 3;
              $tipo_orden=1;
          } else if ($comentario2 == null) {
              $estado = 2;
              $tipo_orden=2;
          }
             $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET comentarios = :comentarios, 
              estado =3 , id_tipo_proceso = 1   WHERE id = :id");

             $pdo->bindParam(":id ", $datosC["id"], PDO::PARAM_INT);
             $pdo->bindParam(":comentarios", $datosC["comentarios"], PDO::PARAM_STR);

             // $pdo->bindParam(":estado", 2, PDO::PARAM_STR);


             if ($pdo->execute()) {
                 return true;
             } else {
                 return false;
             }

             $pdo->close();
             $pdo = null;
     } 



    /* --------------------------------------------------------------------------*/
    /*                            En espera datos solicitud director           */
    /* --------------------------------------------------------------------------*/
    static public function ActualizarSolicitudDM($tablaBD, $datosC, $comentario)
    {

        if (isset($comentario) && !empty($comentario)) {
            $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET comentarios = :comentarios, 
              estado = 3  WHERE id = :id");

            $pdo->bindParam(":id ", $datosC["id"], PDO::PARAM_INT);
            $pdo->bindParam(":comentarios", $datosC["comentarios"], PDO::PARAM_STR);

            // $pdo->bindParam(":estado", 2, PDO::PARAM_STR);


            if ($pdo->execute()) {
                return true;
            } else {
                return false;
            }

            $pdo->close();
            $pdo = null;
        } else if (isset($comentario2) && !empty($comentario2)) {

            $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET comentarios = :comentarios, 
              estado = 4, id_tipo_proceso= 2  WHERE id = :id");

            $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
            $pdo->bindParam(":comentarios", $datosC["comentarios"], PDO::PARAM_STR);

            if ($pdo->execute()) {
                return true;
            } else {
                return false;
            }

            $pdo->close();
            $pdo = null;
        } else {

            $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET comentarios = :comentarios, 
             estado = 5, id_tipo_proceso= 2  WHERE id = :id");

            $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
            $pdo->bindParam(":comentarios", $datosC["comentarios"], PDO::PARAM_STR);

            if ($pdo->execute()) {
                return true;
            } else {
                return false;
            }

            $pdo->close();
            $pdo = null;
        }
    }


    /* -------------------------------------------------------------------------- */
    /*                             ELIMINAR SOLICITUD MANAGER                     */
    /* -------------------------------------------------------------------------- */

    static public function BorrarSolicitudM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET status = 0  WHERE id= :id");

		$pdo -> bindParam(":id", $datosC, PDO::PARAM_INT);
        
		if($pdo -> execute()) {
            return true;

		}else{
			return false;
		}

		$pdo -> close();
        $pdo = null;
    }
}
