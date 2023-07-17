<?php

require_once "../controladores/usuariosC.php";
require_once "../modelos/usuariosM.php";

class UsuariosA{
    
    public $Uid; 

    public function EProveedoresA(){
        $item = "id";
        $valor = $this->Uid;

        $respuesta = UsuariosC::EUsuariosC($item, $valor);

        echo json_encode($respuesta);
    }

}

if(isset($_POST["Uid"])) {

    $editarU = new UsuariosA();
    $editarU -> Uid = $_POST["Uid"];
    $editarU -> EProveedoresA();
}