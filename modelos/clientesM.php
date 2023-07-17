<?php


require_once "ConexionBD.php";

class ClientesM extends ConexionBD
{


    /* -------------------------------------------------------------------------- */
    /*                 Funcion statica por que llevara parametros 
								Ver los Usuarios					              */
    /* -------------------------------------------------------------------------- */
    static public function VerClientesM($tablaBD)
    {
        /* -------------------------------------------------------------------------- */
        /*                          crearemos la variable pdo                         */
        /* -------------------------------------------------------------------------- */

        $pdo = ConexionBD::cBD()->prepare("SELECT id,pais_cli,actividad_cli
		,servicios_cli,distribucion_cli,capacitacion_cli,nombrecomercial_cli
		,rfc_cli,direccion_cli,contacto_compras,telefono_cli,
		correo_cli,contacto_pago,condiventa_cli,credito_cli FROM $tablaBD WHERE status = 1");
        /* -------------------------------------------------------------------------- */
        /*           variable pdo para que se nos ejecute la consulta SELECT          */
        /* -------------------------------------------------------------------------- */
        $pdo->execute();
        /* -------------------------------------------------------------------------- */
        /*     retornamos el pdo con un fetchAll() para mostrar todos los usuarios    */
        /* -------------------------------------------------------------------------- */
        return $pdo->fetchAll();
        /* -------------------------------------------------------------------------- */
        /*                        Cerramos la conexion de la BD                       */
        /* -------------------------------------------------------------------------- */
        $pdo->close();
        $pdo = null;
    }

    /* -------------------------------------------------------------------------- */
    /*                              MOSTRAR CLIENTES                              */
    /* -------------------------------------------------------------------------- */
    static public function MostrarClientesM($tabla, $item, $valor)
    {

        if ($item != null) {
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND status = 1");

            $pdo->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $pdo->execute();

            return $pdo->fetch();

        } else {
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tabla WHERE status = 1");

            $pdo -> execute();

            return $pdo -> fetchAll();
        }

        $pdo -> close();
        $pdo = null;
    }

    /* -------------------------------------------------------------------------- */
    /*                              AGREGAR CLIENTES                              */
    /* -------------------------------------------------------------------------- */

    static public function AgregarClientesM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (pais_cli, actividad_cli, servicios_cli, distribucion_cli, capacitacion_cli,
            nombrecomercial_cli, rfc_cli, direccion_cli, contacto_compras, telefono_cli, correo_cli, contacto_pago, condiventa_cli, credito_cli, status) 
            VALUES (:pais_cli, :actividad_cli, :servicios_cli, :distribucion_cli, :capacitacion_cli, :nombrecomercial_cli, :rfc_cli,
            :direccion_cli, :contacto_compras, :telefono_cli, :correo_cli, :contacto_pago, :condiventa_cli, :credito_cli, 1)");

        $pdo->bindParam(":pais_cli", $datosC["pais_cli"], PDO::PARAM_STR);
        $pdo->bindParam(":actividad_cli", $datosC["actividad_cli"], PDO::PARAM_STR);
        $pdo->bindParam(":servicios_cli", $datosC["servicios_cli"], PDO::PARAM_STR);
        $pdo->bindParam(":distribucion_cli", $datosC["distribucion_cli"], PDO::PARAM_STR);
        $pdo->bindParam(":capacitacion_cli", $datosC["capacitacion_cli"], PDO::PARAM_STR);
        $pdo->bindParam(":nombrecomercial_cli", $datosC["nombrecomercial_cli"], PDO::PARAM_STR);
        $pdo->bindParam(":rfc_cli", $datosC["rfc_cli"], PDO::PARAM_STR);
        $pdo->bindParam(":direccion_cli", $datosC["direccion_cli"], PDO::PARAM_STR);
        $pdo->bindParam(":contacto_compras", $datosC["contacto_compras"], PDO::PARAM_STR);
        $pdo->bindParam(":telefono_cli", $datosC["telefono_cli"], PDO::PARAM_STR);
        $pdo->bindParam(":correo_cli", $datosC["correo_cli"], PDO::PARAM_STR);
        $pdo->bindParam(":contacto_pago", $datosC["contacto_pago"], PDO::PARAM_STR);
        $pdo->bindParam(":condiventa_cli", $datosC["condiventa_cli"], PDO::PARAM_STR);
        $pdo->bindParam(":credito_cli", $datosC["credito_cli"], PDO::PARAM_STR);

        print_r($pdo);

        if ($pdo->execute()) {
            // Cerramos la conexión de PDO
            return true;
        } else {
            // Cerramos la conexión de PDO
            return false;
        }
        $pdo->close();
        $pdo = null;
    }

    /* -------------------------------------------------------------------------- */
	/*                           Actualizar clientes                        */
	/* -------------------------------------------------------------------------- */
    static public function ActualizarProveedoresM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET pais_cli = :pais_cli, actividad_cli = :actividad_cli, 
		 servicios_cli = :servicios_cli, distribucion_cli = :distribucion_cli, nombrecomercial_cli = :nombrecomercial_cli,
         capacitacion_cli = :capacitacion_cli, rfc_cli = :rfc_cli,
         direccion_cli = :direccion_cli,contacto_compras = :contacto_compras,telefono_cli = :telefono_cli,
         correo_cli = :correo_cli, contacto_pago = :contacto_pago, condiventa_cli =:condiventa_cli,
         credito_cli = :credito_cli  WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);		
		$pdo -> bindParam(":pais_cli", $datosC["pais_cli"], PDO::PARAM_STR);
        $pdo -> bindParam(":actividad_cli", $datosC["actividad_cli"], PDO::PARAM_STR);
		$pdo -> bindParam(":servicios_cli", $datosC["servicios_cli"], PDO::PARAM_STR);
		$pdo -> bindParam(":distribucion_cli", $datosC["distribucion_cli"], PDO::PARAM_INT);
		$pdo -> bindParam(":nombrecomercial_cli", $datosC["nombrecomercial_cli"], PDO::PARAM_STR);
        $pdo -> bindParam(":capacitacion_cli", $datosC["capacitacion_cli"], PDO::PARAM_STR);
        $pdo -> bindParam(":rfc_cli", $datosC["rfc_cli"], PDO::PARAM_STR);
        $pdo -> bindParam(":direccion_cli", $datosC["direccion_cli"], PDO::PARAM_STR);
        $pdo -> bindParam(":contacto_compras", $datosC["contacto_compras"], PDO::PARAM_STR);
        $pdo -> bindParam(":telefono_cli", $datosC["telefono_cli"], PDO::PARAM_STR);
        $pdo -> bindParam(":correo_cli", $datosC["correo_cli"], PDO::PARAM_STR);
        $pdo -> bindParam(":contacto_pago", $datosC["contacto_pago"], PDO::PARAM_STR);
        $pdo -> bindParam(":condiventa_cli", $datosC["condiventa_cli"], PDO::PARAM_STR);
        $pdo -> bindParam(":credito_cli", $datosC["credito_cli"], PDO::PARAM_STR);
		

		if($pdo -> execute()) {
			return true;
		/* -------------------------------------------------------------------------- */
		/*                 Si no se cumple que nos retorne como falso                 */
		/* -------------------------------------------------------------------------- */
		}else{
			return false;
		}

		/* -------------------------------------------------------------------------- */
		/*                          Cerramos conexion de pdo                          */
		/* -------------------------------------------------------------------------- */
		$pdo -> close();
        $pdo = null;

	}

    static public function eliminarClientesM($tabla, $datos){

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tabla SET status = 0  WHERE id= :id");

		$pdo -> bindParam(":id", $datos, PDO::PARAM_INT);
        
                                                                                                       
		if($pdo -> execute()) {
			return true;
		/* -------------------------------------------------------------------------- */
		/*                 si no se cumple que nos retorne como falso                 */
		/* -------------------------------------------------------------------------- */
		}else{
			return false;
		}

		/* -------------------------------------------------------------------------- */
		/*                          Cerramos conexion de pdo                          */
		/* -------------------------------------------------------------------------- */
		$pdo -> close();
		$pdo = null;
    }
}
