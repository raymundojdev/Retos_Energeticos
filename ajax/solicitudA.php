<?php

require_once "../controladores/solicitudC.php";
require_once "../modelos/solicitudM.php";


class AjaxSolicitud{


    public $idSolicitud;


    /* -------------------------------------------------------------------------- */
    /*                               VISTASOLICITUD                               */
    /* -------------------------------------------------------------------------- */
    public function ajaxVistaSolicitud(){

        $item2 = "id";
        $valor2 = $this->idSolicitud;

        $respuesta = SolicitudC::VistaSolicitudC($item2, $valor2);

        echo json_encode($respuesta);
    
    }


  
}                                                  


if(isset($_POST["idSolicitud"])){
    $vistaSolicitud = new AjaxSolicitud();
    $vistaSolicitud -> idSolicitud = $_POST["idSolicitud"];
    $vistaSolicitud ->ajaxVistaSolicitud();
}