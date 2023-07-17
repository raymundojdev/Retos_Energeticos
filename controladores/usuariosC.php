<?php


class UsuariosC
{


	static public function IngresoUsuariosC()
	{
		if (isset($_POST["usuario-Ing"])) {
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave-Ing"])) {

				$datosC = array("usuario" => $_POST["usuario-Ing"], "clave" => ["clave-Ing"]);
				$tablaBD = "usuarios";
				$respuesta = UsuariosM::IngresoUsuariosM($datosC, $tablaBD);

				if ($respuesta["usuario"] == $_POST["usuario-Ing"] && $respuesta["clave"] == $_POST["clave-Ing"]) {

					$_SESSION["Ingreso"] = "ok";

					$_SESSION["id"] = $respuesta["id"];
					$_SESSION["usuario"] = $respuesta["usuario"];
					$_SESSION["nombre"] = $respuesta["nombre"];
					$_SESSION["cargo"] = $respuesta["cargo"];
					$_SESSION["correo"] = $respuesta["correo"];
					$_SESSION["clave"] = $respuesta["clave"];
					$_SESSION["foto"] = $respuesta["foto"];
					$_SESSION["rol"] = $respuesta["rol"];
					$_SESSION["firma"] = $respuesta["firma"];
					$_SESSION["iniciales_firma"] = $respuesta["iniciales_firma"];

					echo '<script>                    
                    window.location = "inicio";
                    </script>';
				} else {
					echo ' <div class="alert alert-dismissible fade show py-2 bg-danger">
                    <div class="d-flex align-items-center">
                      <div class="fs-3 text-white"><ion-icon name="close-circle-sharp"></ion-icon>
                      </div>
                      <div class="ms-3">
                        <div class="text-white">Usuario o contraseña incorrectas!</div>
                      </div>
                    </div>
                  </div> ';
				}
			}
		}
	}


	static public function VerUsuariosC()
	{

		//Creamos la variable de Bd
		$tablaBD = "usuarios";
		//Solicitamos una respuesta a nuestro modelo y conocectamos una funcion con VerUsuariosM enviaremos los parametros $tablaBD
		$respuesta = UsuariosM::VerUsuariosM($tablaBD);
		//abrimos un foreach con la variable respuesta traiga un echo con lo que tenemos como registros en la tabla
		return $respuesta;
	}

	//Crear Usuarios
	public function CrearUsuariosC()
	{
		//Haremos una condicion si la variable post["usuariosN"] del input trae informacion vamos a crear una variable //llamada rutaImg que sea igual a vacia
		if (isset($_POST["usuarioN"])) {

			$rutaImg = "";
			$rutaImgf = "";

			//creamos otra condicion donde nos dira si la variable $_FILES ["fotoN"] viene con informacion la variable //$_FILES es para archivos, la variable $_FILES lleva dos parametros el primero la variable foto N que es la //que traera la informacion y el segundo parametro es el archivo temporal "tmp_name" y tambien se hara otra //condicion para saber si no viene vacio y dentro la variable _FILES["fotoN"]
			if (isset($_FILES["fotoN"]["tmp_name"]) && !empty($_FILES["fotoN"]["tmp_name"])) {

				//si esto se cumple vamos a preguntar en una condicion si la imagen es png o jpg, dos parametros uno de la //variable _FILES["fotoN"] y el segundo de "type" para saber el tipo 
				if ($_FILES["fotoN"]["type"] == "image/jpeg") {

					//creamos una nueva variable, utilizamos el mt_rand que se utiliza para darle un rango al nombre de un //archivo en este caso sera un rango de 10 a 999 
					$nombre = mt_rand(10, 999);

					//Creamos otra variable que sera rutaImg y en ella colocaremos la ruta de la imageen y al final //concatenamos con la variable nombre
					$rutaImg = "vistas/img/usuarios/U" . $nombre . ".jpg";

					//creamos otra variable llamada foto sera igual a imagecreatefromjpg() esto devuelve un identificador //de imagen que si representa la imagen desde un nombre de fichero y agregamos los parametros //_FILES["fotoN"]["tmp_name"]
					$foto = imagecreatefromjpeg($_FILES["fotoN"]["tmp_name"]);

					//para finalizar colocaremos imagejpeg y adentro colocaremos el primer parametro que seria $foto y el //segundo seria la ruta de la imagen 
					imagejpeg($foto, $rutaImg);
				}

				//realizaremos lo mismo pero ahora con el formato png en esta condicion
				if ($_FILES["fotoN"]["type"] == "image/png") {
					$nombre = mt_rand(10, 999);
					$rutaImg = "vistas/img/usuarios/U" . $nombre . ".png";
					$foto = imagecreatefrompng($_FILES["fotoN"]["tmp_name"]);
					imagepng($foto, $rutaImg);
				}
			}

			if (isset($_FILES["firmaN"]["tmp_name"]) && !empty($_FILES["firmaN"]["tmp_name"])) {

				//si esto se cumple vamos a preguntar en una condicion si la imagen es png o jpg, dos parametros uno de la //variable _FILES["fotoN"] y el segundo de "type" para saber el tipo 
				if ($_FILES["firmaN"]["type"] == "image/jpeg") {

					//creamos una nueva variable, utilizamos el mt_rand que se utiliza para darle un rango al nombre de un //archivo en este caso sera un rango de 10 a 999 
					$nombre = mt_rand(10, 999);

					//Creamos otra variable que sera rutaImg y en ella colocaremos la ruta de la imageen y al final //concatenamos con la variable nombre
					$rutaImgf = "vistas/img/usuarios/FU" . $nombre . ".jpg";

					//creamos otra variable llamada foto sera igual a imagecreatefromjpg() esto devuelve un identificador //de imagen que si representa la imagen desde un nombre de fichero y agregamos los parametros //_FILES["fotoN"]["tmp_name"]
					$foto = imagecreatefromjpeg($_FILES["firmaN"]["tmp_name"]);

					//para finalizar colocaremos imagejpeg y adentro colocaremos el primer parametro que seria $foto y el //segundo seria la ruta de la imagen 
					imagejpeg($foto, $rutaImgf);
				}

				//realizaremos lo mismo pero ahora con el formato png en esta condicion
				if ($_FILES["firmaN"]["type"] == "image/png") {
					$nombre = mt_rand(10, 999);
					$rutaImgf = "vistas/img/usuarios/FU" . $nombre . ".png";
					$foto = imagecreatefrompng($_FILES["firmaN"]["tmp_name"]);
					imagepng($foto, $rutaImgf);
				}
			}

			//Crearemos una nueva variable llamada $tablaBD que sera el nombre de nuestra tabla usuarios
			$tablaBD = "usuarios";

			//Creamos una nueva variable llamada datosC que sera igual a un array con propiedades la primera sera la de "usuario" el valor de esa prodiedad sera lo que venga en la variable $_POST segunda propiedad sera clave y le asiganeremos el valor de lo que venga en la variable post $_POST["claveN"] que viene del input del formulario para agregar el usuario
			$datosC = array("usuario" => $_POST["usuarioN"], "nombre" => $_POST["nombreN"],
			 "cargo" => $_POST["cargoN"], "correo" => $_POST["correoN"], 
			 "clave" => $_POST["claveN"], "foto" => $rutaImg, "rol" => $_POST["rolN"],
			 "firma" => $rutaImgf, "iniciales_firma" => $_POST["iniciales_firmaN"]);

			//solicitamos una respuesta hacia nuestro modelo cola clase UsuariosM y la conectamos con la funcion CrearUsuariosM y mandando como  parametros $tablaBD y $datosC
			$respuesta = UsuariosM::CrearUsuariosM($tablaBD, $datosC);

			//creamos condicion lo que venga en respuesta es igual a verdadero entonces
			if ($respuesta == "ok" ) {

				echo '<script>
				  window.location = "usuarios";	
						</script>';
			} else {

				echo '<script>
			
				  window.location = "usuarios";	
						
						</script>';
			}
		}
	}


	//Llamar datos para editarlos
	static public function EUsuariosC($item, $valor)
	{
		$tablaBD = "usuarios";
		$respuesta = UsuariosM::EUsuariosM($tablaBD, $item, $valor);
		return $respuesta;
	}


	//BORRAR USUARIOS

	public function BorrarUsuariosC()
	{

		//Hacemos una condicion  que lo que venga en la variable Get["Uid"] se cumplira lo siguiente
		if (isset($_GET["Uid"])) {

			//Abrimos variable de la base de datos con la tabla usuarios
			$tablaBD = "usuarios";
			//datoc c que sea igual ala variable get["Uid"]
			$datosC  = $_GET["Uid"];

			//abrimos condicion para eliminar la foto si la variable get de Ufoto es diferente a vacio se hara un unlink
			if ($_GET["Ufoto"] != "") {
				//el unlink se utiliza para eliminar archivos de tipo file
				unlink($_GET["Ufoto"]);
			}
			if ($_GET["Ufirma"] != "") {

				unlink($_GET["Ufirma"]);
			}

			//Creamos variable (respuesta) para solicitar una respuesta al modelo 
			$respuesta = UsuariosM::BorrarUsuariosM($tablaBD, $datosC);

			//creamos una confidicion, si la respuesta del modelo es true recargara la pagina usuarios 
			if ($respuesta == "ok") {

				echo '
				<script>
						window.location ="usuarios";
						</script>';
			} else {
				echo 'ERROR AL BORRAR USUARIO';
			}
		}
	}

	public function ActualizarUsuariosC()
	{

		if (isset($_POST["Uid"])) {
			$rutaImg = $_POST["FotoActual"];
			$rutaImgF = $_POST["FirmaActual"];

			if (isset($_FILES["fotoE"]["tmp_name"]) && !empty($_FILES["fotoE"]["tmp_name"])) {
				if (!empty($_POST["FotoActual"])) {
					unlink($_POST["FotoActual"]);
				} else {
					$direc = "";
					mkdir($direc, 0755);
				}

				if ($_FILES["fotoE"]["type"] == "image/jpeg") {
					$nombre = mt_rand(10, 999);
					$rutaImg = "vistas/img/usuarios/U" . $nombre . ".jpg";
					$foto = imagecreatefromjpeg($_FILES["fotoE"]["tmp_name"]);
					imagejpeg($foto, $rutaImg);
				}

				if ($_FILES["fotoE"]["type"] == "image/png") {
					$nombre = mt_rand(10, 999);
					$rutaImg = "vistas/img/usuarios/U" . $nombre . ".png";
					$foto = imagecreatefrompng($_FILES["fotoE"]["tmp_name"]);
					imagepng($foto, $rutaImg);
				}
			}

			if (isset($_FILES["firmaE"]["tmp_name"]) && !empty($_FILES["firmaE"]["tmp_name"])) {
				if (!empty($_POST["FirmaActual"])) {
					unlink($_POST["FirmaActual"]);
				} else {
					$direcf = "";
					mkdir($direcf, 0755);
				}

				if ($_FILES["firmaE"]["type"] == "image/jpeg") {
					$nombre = mt_rand(10, 999);
					$rutaImgF = "vistas/img/usuarios/FU" . $nombre . ".jpg";
					$foto = imagecreatefromjpeg($_FILES["firmaE"]["tmp_name"]);
					imagejpeg($foto, $rutaImgF);
				}

				if ($_FILES["firmaE"]["type"] == "image/png") {
					$nombre = mt_rand(10, 999);
					$rutaImgF = "vistas/img/usuarios/FU" . $nombre . ".png";
					$foto = imagecreatefrompng($_FILES["firmaE"]["tmp_name"]);
					imagepng($foto, $rutaImgF);
				}
			}

			$tablaBD = "usuarios";

			$datosC = array(
				"id" => $_POST["Uid"], "usuario" => $_POST["usuarioE"], "nombre" => $_POST["nombreE"],
				"cargo" => $_POST["cargoE"], "correo" => $_POST["correoE"], "clave" => $_POST["claveE"], "foto" => $rutaImg,
				"rol" => $_POST["rolE"],  "firma" => $rutaImgF, "iniciales_firma" => $_POST["iniciales_firmaE"]
			);

			$respuesta = UsuariosM::ActualizarUsuariosM($tablaBD, $datosC);


			if ($respuesta == "ok") {

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
						window.location ="usuarios";
						</script>';
			} else {

				echo '<div class="alert alert-dismissible fade show py-2 bg-danger">
					<div class="d-flex align-items-center">
					  <div class="fs-3 text-white"><ion-icon name="checkmark-circle-sharp" role="img" class="md hydrated" aria-label="checkmark circle sharp"></ion-icon>
					  </div>
					  <div class="ms-3">
						<div class="text-white">Error al actualizar usuario!</div>
					  </div>
					</div>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  </div>';
			}
		}
	}


	static public function VerManagerC($item, $valor)
	{
		$tablaBD = "usuarios";
		$respuesta = UsuariosM::VerManagerM($tablaBD, $item, $valor);
		return $respuesta;
	}
}
