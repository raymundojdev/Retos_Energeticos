<?php

require_once "../controladores/proveedoresC.php";
require_once "../modelos/proveedoresM.php";

class ProveedoresA{
    
    public $Pid; 

    public function EProveedoresA(){
        $item = "id";
        $valor = $this->Pid;

        $respuesta = ProveedoresC::EProveedoresC($item, $valor);

        echo json_encode($respuesta);
    }

}

if(isset($_POST["Pid"])) {

    $editarP = new ProveedoresA();
    $editarP -> Pid = $_POST["Pid"];
    $editarP -> EProveedoresA();
}