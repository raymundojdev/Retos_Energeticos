<?php

require_once "ConexionBD.php";

class ProveedoresM extends ConexionBD{

    /* -------------------------------------------------------------------------- */
    /*                              Ver los Usuarios                              */
    /* -------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------- */
    /*                 Funcion statica por que llevara parametros                 */
    /* -------------------------------------------------------------------------- */
    static public function VerProveedoresM($tablaBD)
    {
        /* -------------------------------------------------------------------------- */
        /*                          crearemos la variable pdo                         */
        /* -------------------------------------------------------------------------- */

        $pdo = ConexionBD::cBD()->prepare("SELECT id,nombre,rfc,direccion,telefono,atn,email FROM $tablaBD WHERE  estado = 1");
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
    }
	
	/* -------------------------------------------------------------------------- */
	/*                      Consulta de proveedores combobox                      */
	/* -------------------------------------------------------------------------- */
	static public function VercombProveedoresM($tablaBD, $item, $valor)
    {
        
		if($item != null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $item = :$item AND estado = 1");

			$pdo -> bindParam(":" .$item, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT* FROM $tablaBD WHERE estado = 1");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}

		$pdo -> close();
		$pdo = null;
    }

    /* -------------------------------------------------------------------------- */
    /*                             Agregar Proveedores                            */
    /* -------------------------------------------------------------------------- */
    static public function AgregarProveedorM($tablaBD, $datosC){
        
        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre,rfc,direccion,telefono,atn,email,estado) VALUES (:nombre,:rfc,:direccion, :telefono, :atn, :email, 1)");

		/* -------------------------------------------------------------------------- */
		/*                            enlazamos parametros                            */
		/* -------------------------------------------------------------------------- */
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":rfc", $datosC["rfc"], PDO::PARAM_STR);
        $pdo -> bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
		$pdo -> bindParam(":telefono", $datosC["telefono"], PDO::PARAM_INT);
		$pdo -> bindParam(":atn", $datosC["atn"], PDO::PARAM_STR);
		$pdo -> bindParam(":email", $datosC["email"], PDO::PARAM_STR);
       

		/* -------------------------------------------------------------------------- */
		/*utilizaremos una condicion si nuestra variable pdo se nos ejecula vamos a 
										retornar verdadero
																		              */
		/* -------------------------------------------------------------------------- */
		 
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

	/* -------------------------------------------------------------------------- */
	/*                            ELIMINAR PROVEEDORES                            */
	/* -------------------------------------------------------------------------- */
    static public function BorrarProveedoresM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET estado = 0  WHERE id= :id");

		$pdo -> bindParam(":id", $datosC, PDO::PARAM_INT);
        

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

    /* -------------------------------------------------------------------------- */
    /*                             Llamar Proveedores                             */
    /* -------------------------------------------------------------------------- */
	static public function EProveedoresM($tablaBD,$item,$valor){

		if($item != null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $item = :$item");

			$pdo -> bindParam(":" .$item, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT* FROM $tablaBD");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}

		$pdo -> close();
		 
	}

	/* -------------------------------------------------------------------------- */
	/*                           Actualizar proveedores                           */
	/* -------------------------------------------------------------------------- */
    static public function ActualizarProveedoresM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombre = :nombre, rfc = :rfc, 
		 direccion = :direccion, telefono = :telefono, atn = :atn, email = :email WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);		
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":rfc", $datosC["rfc"], PDO::PARAM_STR);
		$pdo -> bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
		$pdo -> bindParam(":telefono", $datosC["telefono"], PDO::PARAM_INT);
		$pdo -> bindParam(":atn", $datosC["atn"], PDO::PARAM_STR);
        $pdo -> bindParam(":email", $datosC["email"], PDO::PARAM_STR);
		

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
}
