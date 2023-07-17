<?php

require_once "controladores/plantillaC.php";

require_once "controladores/usuariosC.php";
require_once "modelos/usuariosM.php";

require_once "controladores/proveedoresC.php";
require_once "modelos/proveedoresM.php";

require_once "controladores/solicitudC.php";
require_once "modelos/solicitudM.php";

require_once "controladores/clientesC.php";
require_once "modelos/clientesM.php";

$plantilla = new Plantilla();
$plantilla -> LlamarPlantilla();

