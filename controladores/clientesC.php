<?php


class ClientesC
{


    static public function VerClientesC()
    {

        //Creamos la variable de Bd
        $tablaBD = "clientes";
        //Solicitamos una respuesta a nuestro modelo y conocectamos una funcion con VerUsuariosM enviaremos los parametros $tablaBD
        $respuesta = ClientesM::VerClientesM($tablaBD);
        //abrimos un foreach con la variable respuesta traiga un echo con lo que tenemos como registros en la tabla
        return $respuesta;
    }

    static public function CrearClientesC()
    {
        if (isset($_POST["pais_cliN"])) {
            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["pais_cliN"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["actividad_cliN"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["servicios_cliN"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["distribucion_cliN"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["nombrecomercial_cliN"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["capacitacion_cliN"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["rfc_cliN"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["contacto_comprasN"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["telefono_cliN"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["correo_cliN"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["contacto_pagoN"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["condiventa_cliN"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["credito_cliN"])

            ) {

                $tablaBD = "clientes";

                $datosC = array(
                    "pais_cli" => $_POST["pais_cliN"],
                     "actividad_cli" => $_POST["actividad_cliN"],
                    "servicios_cli" => $_POST["servicios_cliN"],
                     "distribucion_cli" => $_POST["distribucion_cliN"],
                    "nombrecomercial_cli" => $_POST["nombrecomercial_cliN"],
                     "capacitacion_cli" => $_POST["capacitacion_cliN"],
                    "rfc_cli" => $_POST["rfc_cliN"], 
                    "direccion_cli" => $_POST["direccion_cliN"],
                    "contacto_compras" => $_POST["contacto_comprasN"],
                     "telefono_cli" => $_POST["telefono_cliN"],
                    "correo_cli" => $_POST["correo_cliN"],
                     "contacto_pago" => $_POST["contacto_pagoN"],
                    "condiventa_cli" => $_POST["condiventa_cliN"],
                     "credito_cli" => $_POST["credito_cliN"]
                );

                $respuesta = ClientesM::AgregarClientesM($tablaBD, $datosC);




                if ($respuesta == true) {

                    echo '<script>
                    swal("El usuario a sido guardado correctamente!", "", "success");
                            window.location = "clientes";	
                      
                    </script>';
                } else {

                    echo '<script>
                        Swal.fire({
                            title: "Ocurrió un error al agregar cliente!",
                            icon: "error",
                            confirmButtonText: "Cerrar"
                        }).then(function() {
                            window.location = "clientes";	
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    Swal.fire({
                        title: "No se permiten caracteres especiales!",
                        icon: "error",
                        confirmButtonText: "Cerrar"
                    }).then(function() {
                        window.location = "clientes";	
                    });
                </script>';
            }
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                              MOSTRAR CLIENTES                              */
    /* -------------------------------------------------------------------------- */
    static public function MostrarClientesC($item, $valor)
    {

        $tabla = "clientes";
        $respuesta = ClientesM::MostrarClientesM($tabla, $item, $valor);

        return $respuesta;

       
    }

    /* -------------------------------------------------------------------------- */
    /*                               EDITAR CLIENTE                               */
    /* -------------------------------------------------------------------------- */

    static public function EditarClienteC()
    {

        if (isset($_POST["nombrecomercial_cliE"])) {
            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nombrecomercial_cliE"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["pais_cliE"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["actividad_cliE"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["servicios_cliE"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["distribucion_cliE"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["capacitacion_cliE"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["rfc_cliE"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["contacto_comprasE"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["telefono_cliE"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["correo_cliE"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["contacto_pagoE"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["condiventa_cliE"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["credito_cliE"])
            ) {
                $tabla = "clientes";
                $datosC = array(
                    "id" => $_POST["idCliente"],
                    "pais_cli" => $_POST["pais_cliE"],
                     "actividad_cli" => $_POST["actividad_cliE"],
                    "servicios_cli" => $_POST["servicios_cliE"],
                     "distribucion_cli" => $_POST["distribucion_cliE"],
                    "nombrecomercial_cli" => $_POST["nombrecomercial_cliE"],
                     "capacitacion_cli" => $_POST["capacitacion_cliE"],
                    "rfc_cli" => $_POST["rfc_cliE"], 
                    "direccion_cli" => $_POST["direccion_cliE"],
                    "contacto_compras" => $_POST["contacto_comprasE"],
                     "telefono_cli" => $_POST["telefono_cliE"],
                    "correo_cli" => $_POST["correo_cliE"],
                     "contacto_pago" => $_POST["contacto_pagoE"],
                    "condiventa_cli" => $_POST["condiventa_cliE"],
                     "credito_cli" => $_POST["credito_cliE"]
                );

                $respuesta = ClientesM::AgregarClientesM($tabla, $datosC);

                if($respuesta == true){
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Clente ha sido agregado correctamente",
                        text: "Something went wrong!",
                        
                    }).then(function() {
                        window.location = "clientes";
                    });
                </script>';

                }else{
                    echo '<script>
                    Swal.fire({
                        title: "Ocurrió un error al editar cliente!",
                        icon: "error",
                       
                        confirmButtonText: "Cerrar"
                    }).then(function() {
                        window.location = "clientes";	
                    });
                </script>';
                }
            }
        }
    }


    /* -------------------------------------------------------------------------- */
    /*                              ELIMINAR CLIENTE                              */
    /* -------------------------------------------------------------------------- */

    static public function eliminarClientesC(){

        if(isset($_GET["idCliente"])){
            
            $tabla = "clientes";
            $datos = $_GET["idCliente"];

            $respuesta = ClientesM::eliminarClientesM($tabla, $datos);

            if($respuesta == true){
                echo '<script>
                Swal.fire({
                    title: "Cliente eliminado correctamente!",
                    icon: "success",
                    timer: 3000,
                    confirmButtonText: "Cerrar"
                }).then(function() {
                    window.location = "clientes";	
                });
            </script>';
            }else{
                echo '<script>
                Swal.fire({
                    title: "Ocurrió un error al eliminar cliente!",
                    icon: "error",
                    timer: 3000,
                    confirmButtonText: "Cerrar"
                }).then(function() {
                    window.location = "clientes";	
                });
            </script>';
            }
        }
    }


   
}
