<?php 

require_once "ConexionBD.php";

class UsuariosM extends ConexionBD{
	

    static public function IngresoUsuariosM($datosC, $tablaBD){

        $pdo = ConexionBD::cBD()->prepare("SELECT usuario,nombre,cargo,correo,clave,foto,rol, id, firma, iniciales_firma FROM $tablaBD WHERE usuario =:usuario");

        $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();
      
    }

    
	/* -------------------------------------------------------------------------- */
	/*                 Funcion statica por que llevara parametros 
								Ver los Usuarios					              */
	/* -------------------------------------------------------------------------- */
	static public function VerUsuariosM($tablaBD){
		/* -------------------------------------------------------------------------- */
		/*                          crearemos la variable pdo                         */
		/* -------------------------------------------------------------------------- */

		$pdo = ConexionBD::cBD()->prepare("SELECT id,usuario,nombre,cargo,correo,clave,foto,rol,firma,iniciales_firma FROM $tablaBD WHERE estado = 1");
		/* -------------------------------------------------------------------------- */
		/*           variable pdo para que se nos ejecute la consulta SELECT          */
		/* -------------------------------------------------------------------------- */
		$pdo -> execute();
		/* -------------------------------------------------------------------------- */
		/*     retornamos el pdo con un fetchAll() para mostrar todos los usuarios    */
		/* -------------------------------------------------------------------------- */
		return $pdo -> fetchAll();
		/* -------------------------------------------------------------------------- */
		/*                        Cerramos la conexion de la BD                       */
		/* -------------------------------------------------------------------------- */
		$pdo -> close();
		
	}


	


    /* -------------------------------------------------------------------------- */
    /*                               Crear Usuarios                               */
    /* -------------------------------------------------------------------------- */
	static public function CrearUsuariosM($tablaBD, $datosC){
		
		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (usuario,nombre,cargo,correo,clave,foto,rol,estado,firma,iniciales_firma) VALUES (:usuario,:nombre,:cargo,:correo, :clave, :foto, :rol, 1,:firma,:iniciales_firma)");

		//enlazamos parametros
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":cargo", $datosC["cargo"], PDO::PARAM_STR);
		$pdo -> bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);
        $pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);
		$pdo -> bindParam(":firma", $datosC["firma"], PDO::PARAM_STR);
		$pdo -> bindParam(":iniciales_firma", $datosC["iniciales_firma"], PDO::PARAM_STR);
      

		/* -------------------------------------------------------------------------- */
		/* utilizaremos una condicion si nuestra variable pdo se nos ejecula vamos
		a retornar verdadero														  */
		/* -------------------------------------------------------------------------- */
		 
		if($pdo -> execute()) {
			return "ok";
		/* -------------------------------------------------------------------------- */
		/*                 si no se cumple que nos retorne como falso                 */
		/* -------------------------------------------------------------------------- */
		}else{
			return "error";
		}
		/* -------------------------------------------------------------------------- */
		/*                          Cerramos conexion de pdo                          */
		/* -------------------------------------------------------------------------- */
		$pdo -> close();
		$pdo = null;
	}

    /* -------------------------------------------------------------------------- */
    /*                               Borrar usuarios                              */
    /* -------------------------------------------------------------------------- */
    static public function BorrarUsuariosM($tablaBD,$datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET estado = 0 ,clave = 'nulo' WHERE id= :id");

		$pdo -> bindParam(":id", $datosC, PDO::PARAM_INT);
        
                                                                                                       
		if($pdo -> execute()) {
			return "ok";
		/* -------------------------------------------------------------------------- */
		/*                 si no se cumple que nos retorne como falso                 */
		/* -------------------------------------------------------------------------- */
		}else{
			return "error";
		}

		/* -------------------------------------------------------------------------- */
		/*                          Cerramos conexion de pdo                          */
		/* -------------------------------------------------------------------------- */
		$pdo -> close();
		$pdo = null;
	}

	/* -------------------------------------------------------------------------- */
	/*                               Llamar Usuarios                              */
	/* -------------------------------------------------------------------------- */
	static public function EUsuariosM($tablaBD,$item,$valor){
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
		$pdo = null;
	}

	static public function VerManagerM($tablaBD,$item,$valor){

		
		if($item != null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE rol = 'Manager' AND $item = :$item AND estado = 1");

			$pdo -> bindParam(":" .$item, $valor, PDO::PARAM_STR);


			$pdo -> execute();

			return $pdo -> fetch();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT* FROM $tablaBD WHERE rol = 'Manager' AND estado = 1");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}

		$pdo -> close();
		$pdo = null;
	}

	


	/* -------------------------------------------------------------------------- */
	/*                             Actualizar Usuarios                            */
	/* -------------------------------------------------------------------------- */
	static public function ActualizarUsuariosM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET usuario = :usuario, nombre = :nombre, 
		 cargo = :cargo, correo = :correo, clave = :clave, foto = :foto, rol = :rol, firma = :firma, iniciales_firma = :iniciales_firma  WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":cargo", $datosC["cargo"], PDO::PARAM_STR);
		$pdo -> bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);
		$pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);
		$pdo -> bindParam(":firma", $datosC["firma"], PDO::PARAM_STR);
		$pdo -> bindParam(":iniciales_firma", $datosC["iniciales_firma"], PDO::PARAM_STR);

		if($pdo -> execute()) {
			return "ok";
		/* -------------------------------------------------------------------------- */
		/*                 si no se cumple que nos retorne como falso                 */
		/* -------------------------------------------------------------------------- */
		}else{
			return "error";
		}

		/* -------------------------------------------------------------------------- */
		/*                          Cerramos conexion de pdo                          */
		/* -------------------------------------------------------------------------- */
		$pdo -> close();
		$pdo = null;
	}

	
	
	

}