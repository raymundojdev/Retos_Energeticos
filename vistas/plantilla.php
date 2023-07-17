<?php

session_start();

?>

<!doctype html>
<html lang="es" class="semi-dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <!-- <script src="vistas/assets/plugins/Sweet-alert/dist/sweetalert2.all.min.js"></script>
    <link href="vistas/assets/plugins/Sweet-alert/dist/sweetalert2.min.css" rel="stylesheet" /> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->



    <!--SweetAlert2Javascript-->
    
    <link href="vistas/assets/plugins/Sweet-alert/dist/sweetalert2.min.css" rel="stylesheet" />
    <!-- <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css"> -->




    <!-- loader-->
    <link href="vistas/assets/css/pace.min.css" rel="stylesheet" />
    <script src="vistas/assets/js/pace.min.js"></script>


    <!--plugins-->
    <link href="vistas/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="vistas/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="vistas/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="vistas/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="vistas/assets/plugins/notifications/css/lobibox.min.css" />
    <link href="vistas/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="vistas/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="vistas/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="vistas/assets/css/style.css" rel="stylesheet">
    <link href="vistas/assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!--Theme Styles-->
    <link href="vistas/assets/css/dark-theme.css" rel="stylesheet" />
    <link href="vistas/assets/css/semi-dark.css" rel="stylesheet" />
    <link href="vistas/assets/css/header-colors.css" rel="stylesheet" />

    <link href="vistas/assets/css/header-colors.css" rel="stylesheet" />

    <!--SweetAlerts2-->




    <title>Retos Energeticos</title>
</head>

<body>

    <?php

    if (isset($_SESSION["Ingreso"]) && isset($_SESSION["Ingreso"]) == true) {
        echo
        '<!--start wrapper-->
            <div class="wrapper">
            ';
        include "modulos/cabecera.php";

        // if ($_SESSION["rol"] == "Empleado") {

        //     include "modulos/menuEmpleado.php";
        // }

        include "modulos/menu.php";


        if (isset($_GET["url"])) {
            if (
                $_GET["url"] == "inicio" 
                ||$_GET["url"] == "ingreso" 
                ||$_GET["url"] == "salir"
                || $_GET["url"] == "usuarios"  
                || $_GET["url"] == "perfil-usuario" 
                || $_GET["url"] == "proveedores"
                || $_GET["url"] == "solicitud-compras" 
                || $_GET["url"] == "orden-compraD" 
                || $_GET["url"] == "solicitud-compraCO"
                || $_GET["url"] == "orden-compras"
                || $_GET["url"] == "manager"  
                || $_GET["url"] == "clientes" 
                || $_GET["url"] == "404"
                || $_GET["url"] == "orden-compraD"
                
            ) {
                include "modulos/" . $_GET["url"] . ".php";

            }else{
                include "modulos/404.php";
            }

        } else {
            include "modulos/inicio.php";
        }
        echo ' </div>
            <!--end wrapper-->
            ';
    } else {
        include "modulos/ingreso.php";
    }
    ?>


    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top">
        <ion-icon name="arrow-up-outline"></ion-icon>
    </a>
    <!--End Back To Top Button-->

    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

    <!--Sweetalert -->

    <script src="vistas/assets/js/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

    <!-- JS Files-->

    <script src="vistas/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="vistas/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="vistas/assets/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--plugins-->
    <script src="vistas/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="vistas/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="vistas/assets/plugins/chartjs/chart.min.js"></script>
    <script src="vistas/assets/js/index.js"></script>
    <script src="vistas/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="vistas/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="vistas/assets/js/table-datatable.js"></script>


    <script src="vistas/assets/plugins/Sweet-alert/dist/sweetalert2.min.js"></script>


    <!-- Main JS-->
    <script src="vistas/assets/js/main.js"></script>
    <script src="vistas/js/usuarios.js"></script>
    <script src="vistas/js/proveedores.js"></script>
    <script src="vistas/js/solicitud-compra.js"></script>
    <script src="vistas/js/clientes.js"></script>





    <!--notification js -->
    <!-- <script src="vistas/assets/plugins/notifications/js/lobibox.min.js"></script>
    <script src="vistas/assets/plugins/notifications/js/notifications.min.js"></script>
    <script src="vistas/assets/plugins/notifications/js/notification-custom-script.js"></script> -->

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>

    <script>
        function AgregarMas() {
            $("<div>").load("InputDinamico.php", function() {
                $("#productos").append($(this).html());
            });
        }

        function BorrarRegistro() {
            $('div.lista-producto').each(function(index, item) {
                jQuery(':checkbox', this).each(function() {
                    if ($(this).is(':checked')) {
                        $(item).remove();
                    }
                });
            });
        }
    </script>
</body>

</html>