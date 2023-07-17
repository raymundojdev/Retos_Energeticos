<?php

require_once "../controladores/clientesC.php";
require_once "../modelos/clientesM.php";

class AjaxClientes{


    /* -------------------------------------------------------------------------- */
    /*                               EDITAR CLIENTE                               */
    /* -------------------------------------------------------------------------- */

    public $idCliente;

    public function ajaxEditarCliente(){

        $item = "id";
        $valor = $this->idCliente;

        $respuesta = ClientesC::MostrarClientesC($item,$valor);

        echo json_encode( $respuesta);
    }
}

/* -------------------------------------------------------------------------- */
/*                               EDITAR CLIENTE                               */
/* -------------------------------------------------------------------------- */

if(isset($_POST["idCliente"])){

    $cliente = new AjaxClientes();
    $cliente -> idCliente = $_POST["idCliente"];
    $cliente -> ajaxEditarCliente();

    
}
