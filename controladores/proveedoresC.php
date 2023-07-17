<?php


class ProveedoresC{

   static public function VerProveedoresC()
    {

        //Creamos la variable de Bd
        $tablaBD = "provedores";

        //Solicitamos una respuesta a nuestro modelo y conocectamos una funcion con VerUsuariosM enviaremos los parametros $tablaBD
        $respuesta = ProveedoresM::VerProveedoresM($tablaBD);

        return $respuesta;
    }


	static public function VerCombProveedoresC($item, $valor)
    {

        //Creamos la variable de Bd
        $tablaBD = "provedores";

        //Solicitamos una respuesta a nuestro modelo y conocectamos una funcion con VerUsuariosM enviaremos los parametros $tablaBD
        $respuesta = ProveedoresM::VercombProveedoresM($tablaBD,$item, $valor);

        return $respuesta;
    }

     /* -------------------------------------------------------------------------- */
     /*                               Crear Usuarios                               */
     /* -------------------------------------------------------------------------- */
	public function CrearProveedoresC(){
        
        if(isset($_POST["nombreN"])){
             $tablaBD = "provedores";
             
             $datosC = array("nombre"=>$_POST["nombreN"], "rfc"=>$_POST["rfcN"], "direccion"=>$_POST["direccionN"],
             "telefono"=>$_POST["telefonoN"],"atn"=>$_POST["atnN"],"email"=>$_POST["emailN"]);

             $respuesta = ProveedoresM::AgregarProveedorM($tablaBD, $datosC);

             if($respuesta == true){

                echo '<script>             
                window.location = "proveedores";
                </script>';

             }

        }
    }

    /* -------------------------------------------------------------------------- */
    /*                            Eliminar Proveedores                            */
    /* -------------------------------------------------------------------------- */
    public function EliminarProveedorC(){


		/* -------------------------------------------------------------------------- */
		/* Hacemos una condicion que lo que venga en la variable Get["Pid"] se 
		cumplira lo siguiente                                                         */
		/* -------------------------------------------------------------------------- */
		  
		if (isset($_GET["Pid"])) {

			/* -------------------------------------------------------------------------- */
			/*         Abrimos variable de la base de datos con la tabla usuarios         */
			/* -------------------------------------------------------------------------- */
			$tablaBD = "provedores";
			/* -------------------------------------------------------------------------- */
			/*                datoc c que sea igual ala variable get["Pid"]               */
			/* -------------------------------------------------------------------------- */
			$datosC  = $_GET["Pid"];

			/* -------------------------------------------------------------------------- */
			/*     Creamos variable (respuesta) para solicitar una respuesta al modelo    */
			/* -------------------------------------------------------------------------- */
			$respuesta = ProveedoresM::BorrarProveedoresM($tablaBD, $datosC);

			/* -------------------------------------------------------------------------- */
			/* creamos una confidicion, si la respuesta del modelo es true recargara 
			        la pagina usuarios 													  */
			/* -------------------------------------------------------------------------- */
			 
			if ($respuesta == true) {
				echo '
				<script>
						window.location ="proveedores";
						</script>';
			} else {
				echo 'Error al eliminar proveedor';
			}
		}
    }

   /* -------------------------------------------------------------------------- */
   /*                           Traer datos Proveedores                          */
   /* -------------------------------------------------------------------------- */
    static public function EProveedoresC($item, $valor)
	{
		$tablaBD = "provedores";

		$respuesta = ProveedoresM::EProveedoresM($tablaBD, $item, $valor);

		return $respuesta;
	}

    /* -------------------------------------------------------------------------- */
    /*                           Actualizar proveedores                           */
    /* -------------------------------------------------------------------------- */
    public function ActualizarProveedoresC()
	{

		if (isset($_POST["Pid"])) {		

			$tablaBD = "provedores";

			$datosC = array(
				"id" => $_POST["Pid"], "nombre" => $_POST["nombreE"], "rfc" => $_POST["rfcE"],
				"direccion" => $_POST["direccionE"], "telefono" => $_POST["telefonoE"], "atn" => $_POST["atnE"], 
				"email" => $_POST["emailE"] 
			);

			$respuesta = ProveedoresM::ActualizarProveedoresM($tablaBD, $datosC);


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
						window.location ="proveedores";
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
}

   
