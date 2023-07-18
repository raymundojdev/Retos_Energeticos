<?php

// if( $_SESSION["rol"] == "Empleado"
// || $_SESSION["rol"] == "Manager" || $_SESSION["rol"] = "Director"
// || $_SESSION["rol"] == "Compras"){

//     echo '<script>

//     window.location = "inicio";
//     </script>';

//     return;

//   }
?>

<!--start wrapper-->
<div class="wrapper">
    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content" style="margin-bottom: -3%;">

            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Gestor solicitud de compras </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="inicio"><ion-icon name="home-outline"></ion-icon></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Consulta Solicitud de compra</li>
                        </ol>

                    </nav>

                </div>
                
            </div>
            <!--end breadcrumb-->
            <div class="btn-group" role="group" aria-label="Basic example">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 align-items-center">

                        <!-- <li class="breadcrumb-item active" aria-current="page"><button type="button" class="btn btn-info px-5" style="color: #fff;" data-bs-toggle="modal" data-bs-target="#solicitudCom"><i class="fadeIn animated bx bx-user-plus"></i>Solicitud de compra</button></li> -->
                        <li class="breadcrumb-item active" aria-current="page"><button type="button" class="btn btn-info px-5" style="color: #fff;" data-bs-toggle="modal" data-bs-target="#solicitudCom2"><i class="fadeIn animated bx bx-user-plus"></i>Solicitud de compra</button></li>

                    </ol>
                </nav>
            </div>
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3"></div>

            </div>

        </div>

        <!-- start page content-->
        <div class="page-content" style="padding: 0.5rem; margin-bottom: -3%;">

            <!--start breadcrumb-->

            <!--end breadcrumb-->

            <hr />
            <h6 class="mb-0 text-uppercase"></h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered TB">
                            <thead>
                                <tr>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                    <th>PO#</th>
                                    <th>Fecha</th>
                                    <th>Solicitante</th>
                                    <th>Suministrador</th>
                                    <th>Total</th>
                            </thead>
                            <tbody>
                                <!-- -------------------------------------------------------------------------- -->
                                <!--                      Vista de datos de tabla solicitud                     -->
                                <!-- -------------------------------------------------------------------------- -->
                                <?php
                                $item2 = null;
                                $valor2 = null;


                                $item = null;
                                $valor = null;
                                $verS = SolicitudC::VistaSolicitudFAC($item, $valor);
                                ?>
                                <?php
                                 date_default_timezone_set('America/Mexico_City');
                                 $fecha = date('Y-m-d H:i:s');
                                 $anio = date('Y', strtotime($fecha));
                                 $ultimosDosDigitos = substr($anio, -2);
                                /* -------------------------------------------------------------------------- */
                                /*abrimos un foreach con la variable respuesta traiga un echo con lo que tenemos
                                  como registros en la tabla                                                  */
                                /* -------------------------------------------------------------------------- */
                                $codigo = 870;

                                $codf= $codigo.'_'. $ultimosDosDigitos;
                                foreach ($verS as $key => $value) {
                                    $codigo+=1; 
                                    echo '
                                    </tr>';
                                ?>
                                    <tr>
                                        <td><?php
                                            if ($value['estado'] == 1) {
                                                echo ' <button class="btn btn-secondary btn-block" >En proceso</button>';
                                            }
                                            if ($value['estado'] == 2) {
                                                echo ' <button class="btn btn-primary btn-block" style="background-color: #1F618D;">Aprobada</button>';
                                            }
                                            if ($value['estado'] == 3) {
                                                echo ' <button class="btn btn-danger btn-block" >Rechazada</button>';
                                            }
                                            if ($value['estado'] == 4) {
                                                echo ' <button class="btn btn-warning btn-block" >En espera</button>';
                                            }
                                            if ($value['estado'] == 5) {
                                                echo ' <button class="btn btn-success btn-block" >Autorizado</button>';
                                            }

                                            ?></td>

                                        <td>
                                            <div class="btn-group">
                                           <?php echo' <button class="btn btn-warning btnVistaSolicitud" data-bs-toggle="modal" data-bs-target="#solicitudCom22"  idSolicitud="' . $value["id"] . '"><i class="fadeIn animated bx bx-edit-alt"></i></button>
                                           <button class="btn btn-danger BorrarM" Mid="' . $value["id"] . '"><i class="fadeIn animated bx bx-trash-alt"></i></button>' ?>
                                            <?php  echo ' <button class="btn btn-secondary btnImprimirSolicitud" idSolicitudFac="'.$value['id'].'" title="PDF"><i class="bi bi-file-earmark-pdf"></i></button>'?>
                                            </div>
                                        </td>
                                        <td><?php echo $value["codigo"] ?></td>
                                        <td><?php echo $value["fecha"] ?></td>
                                        <td><?php echo $value["solicitante_lentrega"] ?></td>
                                        <td><?php echo $value["nombre_prov"] ?></td>
                                        <td><?php echo $value["total_soli"] ?></td>




                                    </tr> <?php } ?>

                            </tbody>

                        </table>
                        <!-- -------------------------------------------------------------------------- -->
                        <!--                     Final vista de datos de tabla solicitud                -->
                        <!-- -------------------------------------------------------------------------- -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content-->
    </div>

    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><ion-icon name="arrow-up-outline"></ion-icon></a>
    <!--End Back To Top Button-->

    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

</div>
<!-- -------------------------------------------------------------------------- -->
<!--                            ejemplo de comentario                           -->
<!-- -------------------------------------------------------------------------- -->

<!-- -------------------------------------------------------------------------- -->
<!--                           Modal  Solicitud                                 -->
<!-- -------------------------------------------------------------------------- -->



<!-- ---------------------------------------------------------------------------->
<!--                       Modal crear solicitud de compra                     -->
<!-- ---------------------------------------------------------------------------->
<div class="modal fade" id="solicitudCom2" tabindex="-1" aria-hidden="true" style="background-color: #fff;">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Solicitud de compra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-right: 1%"></button>
            </div>
            <div class="row" style="background-color:#fff;">
                <div class="col-xl-7 mx-auto">

                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <form id="solicitante" class="row g-3 needs-validation " method="post" enctype="multipart/form-data">
                                  
                                    <h6 class="mb-0 text-uppercase">VENDOR / SUMINISTRADOR</h6>
                                    <div class="col-md-6">
                                        <label for="validationDefault01" class="form-label">Nombre</label>
                                        <?php
                                        date_default_timezone_set('America/Mexico_City');
                                        $fecha = date('Y-m-d H:i:s');
                                        $anio = date('Y', strtotime($fecha));
                                        $ultimosDosDigitos = substr($anio, -2);
                                        $codigo+=1;
                                       
                                        ?>
                                         <input type="text" class="form-control" value="<?php echo $codigo.'_'.$ultimosDosDigitos ?>" name="codigoN" id="codigoN" >
                                        <select class="form-select" value="" name="proveedorN" id="proveedorN" required>
                                            <option value="" name="" id="proveedorN">...</option>
                                            <?php
                                            $item = null;
                                            $valor = null;

                                            $suminis = ProveedoresC::VerCombProveedoresC($item, $valor);
                                            foreach ($suminis as $key => $value) {
                                                echo '<option value="' . $value["id"] . '" >' . $value["nombre_prov"] . '</option>';
                                            }

                                            ?>

                                        </select>


                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationDefaul05" class="form-label">ATN</label>
                                        <input type="text" class="form-control" name="atnSN" id="validationDefault0" oninput="convertirAMayusculas(this)" required>

                                    </div>


                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-5 mx-auto">

                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <div class="row g-3 needs-validation" novalidate>
                                    <!-- style="background-color: #1b4e88;color: #fff;
                                            padding-bottom: 4%; text-align:center;" -->
                                    <h6 class="mb-0 text-uppercase">SHIP TO /LUGAR DE ENTREGA</h6>
                                    <div class="col-md-4">
                                        <label for="validationDefault01" class="form-label">Lugar/entrega</label>
                                        <input type="text" class="form-control" oninput="convertirAMayusculas(this)" name="entregaLN" id="validationDefaul01" value="RETOS ENERGETICOS SA DE CV">

                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationDefault02" class="form-label">ATN</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" oninput="convertirAMayusculas(this)" name="atnLN" id="validationDefaul03" value="" required>

                                        </div>
                                        <!-- <select class="form-select" name="atnN" id="" required>
                                        <option value="" name="">Seleciona ATN</option>
                                            <?php
                                            // $item = null;
                                            // $valor = null;

                                            // $manager = UsuariosC::VerManagerC($item, $valor);
                                            // foreach ($manager as $key => $value) {
                                            //     echo '<option value="' . $value["nombre"] . '">' . $value["nombre"] . '</option>';
                                            // }
                                            ?>


                                        </select> -->
                                        <!-- <input type="text" class="form-control" id="validationDefaul02" value="" required> -->

                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationDefault01" class="form-label">CP</label>
                                        <input type="text" class="form-control" oninput="convertirAMayusculas(this)" name="cpLN" id="validationDefaul03" value="91919, VERACRUZ VER, MEXICO" required>

                                    </div>

                                    <div class="col-md-8">
                                        <label for="validationDefaul03" class="form-label">Dirección</label>
                                        <input type="text" class="form-control" oninput="convertirAMayusculas(this)" name="direccionLN" id="validationDefault04" value="JUAN GRIJALVA #610" required>

                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationDefault03" class="form-label">Teléfono</label>
                                        <input type="text" class="form-control" oninput="convertirAMayusculas(this)" name="telefonoLN" id="validationDefault05" value="+52 1 229 937 1727" required>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationDefault2" class="form-label">Solicitante</label>
                                        <input type="text" class="form-control" oninput="convertirAMayusculas(this)" name="solicitanteLN" id="validationDefault2" value="<?php echo $_SESSION["nombre"]; ?>" disabled>

                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationDefault08" class="form-label">Email</label>
                                        <input type="text" class="form-control"  oninput="convertirAMayusculas(this)" name="emailLN" id="validationDefault08" value='<?php echo $_SESSION["correo"]; ?>' disabled>

                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-12 mx-auto">
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <div class="row g-3 needs-validation" novalidate>


                                    <div class="col-md-2">
                                        <label for="validationDefault01" class="form-label">Requisitioner / Solicitante</label>
                                        <input type="text" class="form-control" name="solicitanteSN" id="validationDefault01" value="<?php echo $_SESSION["iniciales_firma"]; ?>" required disabled>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationDefault02" class="form-label">Request by/ Firma de Autorizador</label>
                                        <select class="form-select" value="" name="firmasupN" id="" required>
                                            <option value="" name="">...</option>
                                            <?php
                                            $item = null;
                                            $valor = null;

                                            $suminis = UsuariosC::VerManagerC($item, $valor);
                                            foreach ($suminis as $key => $value) {
                                                echo '<option  value="' . $value["id"] . '" >' . $value["nombre"] . '</option>';
                                            }
                                            //
                                            ?>
                                            <!-- // <option value="" name="monedaN">...</option>
                                            // <option value="MXN">MXN</option> -->
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="validationDefault03" class="form-label">Ship via / Forma de envio</label>
                                        <input type="text" class="form-control" oninput="convertirAMayusculas(this)" name="formaenvN" id="validationDefault03" value="" required>

                                    </div>
                                    <div class="col-md-2">
                                        <label for="validationDefault04" class="form-label">Incoterms</label>
                                        <input type="text" class="form-control" oninput="convertirAMayusculas(this)" name="incotermsN" id="validationDefault04" value="" required>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationDefault05" class="form-label">Lead Time/ Plazo de entrega</label>
                                        <input type="text" class="form-control" oninput="convertirAMayusculas(this)" name="plazoentregaN" id="validationDefault05" required>

                                    </div>


                                    <br>
                                    <br>
                                    <br>


                                    <div class="col-md-2">
                                        <label for="validationDefault06" class="form-label">Client/ Cliente</label>
                                        <select class="form-select" value="" name="clienteN" id="" required>
                                            <option value="" name="">...</option>
                                            <?php
                                            $item = null;
                                            $valor = null;

                                            $clientes = ClientesC::MostrarClientesC($item, $valor);
                                            foreach ($clientes as $key => $value) {
                                                echo '<option value="' . $value["id"] . '" >' . $value["nombrecomercial_cli"] . '</option>';
                                            }
                                            //
                                            ?>

                                        </select>

                                    </div>





                                    <div class="col-md-2">
                                        <label for="validationDefault06" class="form-label">Project / Proyecto</label>
                                        <input type="text" class="form-control" oninput="convertirAMayusculas(this)" name="proyectoN" id="validationDefault06" value="" required>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationDefault08" class="form-label">Insurance included/ Seguro incluido</label>
                                        <select  class="form-select" name="seguroincluN" id="validationDefault08" required>
                                            <option selected disabled value="">...</option>
                                            <option>Sí</option>
                                            <option>No</option>

                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationDefault09" class="form-label">Vendor offer / Oferta suministrador</label>
                                        <input type="text" class="form-control" oninput="convertirAMayusculas(this)" name="ofertasumN" id="validationDefault09">

                                    </div>
                                    <div class="col-md-2">
                                        <label for="validationDefault10" class="form-label"> Condiciones Especiales</label>
                                        <input type="text" class="form-control" oninput="convertirAMayusculas(this)"  name="condicionesespN" id="validationDefault10" required>

                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-12 mx-auto">

                    <hr />
                    <div class="card" style="margin-top: -3%;">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <div class="row g-3 needs-validation" novalidate>
                                    <div class="table-responsive inputSummary">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>

                                                    <th style="width:13%;">Referencia</th>
                                                    <th style="width: 35%;">Descripción</th>
                                                    <th style="width:10%;">Cantidad</th>
                                                    <th>Precio unitario</th>
                                                    <th></th>
                                                    <th>Tasa %</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]" required>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" oninput="convertirAMayusculas(this)" rows="1" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  required> -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()" value="">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" oninput="convertirAMayusculas(this)" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()" value="">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <textarea class="form-control" oninput="convertirAMayusculas(this)" rows="1" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()" value="">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" oninput="convertirAMayusculas(this)" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()" value="">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" oninput="convertirAMayusculas(this)" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()" value="">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" oninput="convertirAMayusculas(this)" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" oninput="convertirAMayusculas(this)" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" oninput="convertirAMayusculas(this)" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" oninput="convertirAMayusculas(this)" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" oninput="convertirAMayusculas(this)" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <textarea class="form-control" rows="1"  oninput="convertirAMayusculas(this)" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <textarea class="form-control" rows="1" oninput="convertirAMayusculas(this)" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <textarea class="form-control" rows="1" oninput="convertirAMayusculas(this)" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <textarea class="form-control" rows="1" oninput="convertirAMayusculas(this)" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                                <!-- -------------------------------------------------------------------------- -->
                                <!-- addInput agrega filas a tabla de prouctos                                  -->
                                <!-- -------------------------------------------------------------------------- -->

                                <!-- <button type="button" class="btn btn-warning" style="margin-left: 0.5%;" title="Agregar fila" onclick="addInput(this,'inputSummary')"><i class="lni lni-plus"></i></button>
                                <label for="" class="form-label" style="color:#c2c2c2;">&ensp;Agregar solo filas necesarias</label> -->

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-12 col-xl-12 col-sm-12 col-md-12  mx-auto">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="my-3 border-top"></div>
                        <h6 class="mb-0">Subtotal: <span class="float-end"><input type="text" class="form-control" style="position: relative; margin-top: -5%" name="subtotalN" id="subtotalN" oninput="calcularS()" required></span></h5>

                            <div class="my-3 border-top"></div>
                            <h6 class="mb-0">Taxes: <span class="float-end"><input type="text" class="form-control" style="position: relative; margin-top: -5%" name="taxesN" id="taxesN" oninput="calcularS()" required></span></h5>
                                <div class="my-3 border-top"></div>
                                <h6 class="mb-0">Shipping: <span class="float-end"><input type="text" class="form-control" style="position: relative; margin-top: -5%" name="shippinglN" id="shippinglN" oninput="calcularS()" value="" required></span></h5>
                                    <div class="my-3 border-top"></div>
                                    <h6 class="mb-0">Otros: <span class="float-end"><input type="text" class="form-control" style="position: relative; margin-top: -5%" name="otrosN"  id="otrosN" oninput="calcularS()" value="" required></span></h5>
                                        <div class="my-3 border-top"></div>
                                        <h6 class="mb-0">Total: <span class="float-end"><input type="text" class="form-control" style="position: relative; margin-top: -5%" name="totalN" id="totalN" oninput="calcularS()" required></span></h5>

                                            <div class="my-3 border-top"></div>
                                            <h6 class="mb-0">Moneda: <span class="float-end">
                                                    <input type="text" class="form-control" oninput="convertirAMayusculas(this)" style="position: relative; margin-top: -5%" name="monedaN" value="" required>
                    </div>
                </div>
                <br>
                <hr>

            </div>

            <div class="card radius-10">
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-3 g-3">

                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                                <div class="widget-icon-2 bg-light-success text-success">
                                    <i class="lni lni-archive"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0">Cuadro de mando</p>
                                    <br>
                                    <input type="file" class="form-control" name="cuadro_msoliN" id="cuadro_msoliN" aria-label="file example">
                                    <br>
                                    <div class="form-check mb-3">

                                        <input type="checkbox" name="novalido1" id="novalido1" value="Option 1">
                                        <label class="form-check-label">No valido</label>


                                    </div>
                                    <div class="progress my-0" style="height: 6px;">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                                <div class="widget-icon-2 bg-light-success text-success">
                                    <i class="lni lni-archive"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0">Oferta de proveedor</p>
                                    <br>
                                    <input type="file" class="form-control" id="ofertaprovN" name="ofertaprovN" aria-label="file example">
                                    <div class="form-check mb-3">
                                        <!-- id="validationFormCheck1" -->
                                        <br>
                                        <input type="checkbox" name="novalido2" id="novalido2" value="Option 1">
                                        <label class="form-check-label">No valido</label>

                                    </div>
                                    <?php

                                    ?>

                                    <div class="progress my-0" style="height: 6px;">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                                <div class="widget-icon-2 bg-light-success text-success">
                                    <i class="lni lni-archive"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0">Especificación tecnica</p>
                                    <br>
                                    <input type="file" class="form-control" name="especiftecN" id="especiftecN" aria-label="file example">
                                    <div class="form-check mb-3">
                                        <br>
                                        <input type="checkbox" name="novalido3" id="novalido3" value="Option 1">

                                        <label class="form-check-label">No valido</label>

                                    </div>
                                    <!-- <h4 class="mb-2 text-success">$85K</h4> -->
                                    <div class="progress my-0" style="height: 6px;">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!--end row-->
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Crear solicitud</button>
            <br>

            <?php

            $crearSoli = new SolicitudC();
            $crearSoli->CrearSolicitudC();

            ?>

            </form>

        </div>
    </div>
</div>


</div>

<!-- -------------------------------------------------------------------------- -->
<!--                          Final guardar modal  Solicitud                    -->
<!-- -------------------------------------------------------------------------- -->





</div>

<!-- -------------------------------------------------------------------------- -->
<!--                          Final guardar modal  Solicitud                    -->
<!-- -------------------------------------------------------------------------- -->

<div class="modal fade" id="solicitudCom22" tabindex="-1" aria-hidden="true" style="background-color: #fff;">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Solicitud de compra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-right: 1%"></button>
            </div>
            <div class="row" style="background-color:#fff;">
                <div class="col-xl-7 mx-auto">

                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <form id="solicitante" class="row g-3 needs-validation" method="post" enctype="multipart/form-data">

                                    <h6 class="mb-0 text-uppercase">VENDOR / SUMINISTRADOR</h6>
                                    <div class="col-md-6">
                                       
                                        
                                        <input type="hidden" class="form-control" name="idSolicitud" id="idSolicitud2">
                                        <label for="validationDefault01" class="form-label">Nombre</label>
                                        <select class="form-select" name="proveedorN" disabled>
                                            <option value=' . $value["nombre_prov"] . ' id="proveedorNS"></option>

                                        </select>
                                        


                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationDefaul05" class="form-label">ATN</label>
                                        <input type="text" class="form-control" name="atnSN" id="atnSN" readonly>
                                        

                                    </div>


                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-5 mx-auto">

                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <div class="row g-3 needs-validation" novalidate>

                                    <h6 class="mb-0 text-uppercase">SHIP TO /LUGAR DE ENTREGA</h6>
                                    <div class="col-md-4">
                                        <label for="validationDefault01" class="form-label">Lugar/entrega</label>
                                        <input type="text" class="form-control" name="entregaLN" id="entregaLN" value="" readonly>

                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationDefault02" class="form-label">ATN</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="atnLN" id="atnLN">

                                        </div>
                                        <!-- <select class="form-select" name="atnN" id="" readonly>
                                        <option value="" name="">Seleciona ATN</option>
                                            <?php
                                            // $item = null;
                                            // $valor = null;

                                            // $manager = UsuariosC::VerManagerC($item, $valor);
                                            // foreach ($manager as $key => $value) {
                                            //     echo '<option value="' . $value["nombre"] . '">' . $value["nombre"] . '</option>';
                                            // }
                                            ?>


                                        </select> -->
                                        <!-- <input type="text" class="form-control" id="validationDefaul02" value="" required> -->

                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationDefault01" class="form-label">CP</label>
                                        <input type="text" class="form-control" name="cpLN" id="cpLN" value="">

                                    </div>

                                    <div class="col-md-8">
                                        <label for="validationDefaul03" class="form-label">Dirección</label>
                                        <input type="text" class="form-control" name="direccionLN" id="direccionLN" value="">

                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationDefault03" class="form-label">Teléfono</label>
                                        <input type="text" class="form-control" name="telefonoLN" id="telefonoLN" value="" readonly readonly>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationDefault2" class="form-label">Solicitante</label>
                                        <input type="text" class="form-control" name="solicitanteLN" id="solicitanteLN" value="" readonly>

                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationDefault08" class="form-label">Email</label>
                                        <input type="text" class="form-control" name="emailLN" id="emailLN" value='' readonly>

                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-12 mx-auto">
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <div class="row g-3 needs-validation" novalidate>


                                    <div class="col-md-2">
                                        <label for="validationDefault01" class="form-label">Requisitioner / Solicitante</label>
                                        <input type="text" class="form-control" name="solicitanteSN" id="solicitanteSN" value="" readonly>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationDefault02" class="form-label">Request by/ Firma de Autorizador</label>
                                        <select class="form-select" value="" name="firmasupN"  readonly>
                                        <?php echo '<option value="' . $value["nombre"] . '" id="firmasupN">...</option>' ?>   
                                        

                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="validationDefault03" class="form-label">Ship via / Forma de envio</label>
                                        <input type="text" class="form-control" name="formaenvN" id="formaenvN" value="" readonly>

                                    </div>
                                    <div class="col-md-2">
                                        <label for="validationDefault04" class="form-label">Incoterms</label>
                                        <input type="text" class="form-control" name="incotermsN" id="incotermsN" value="" readonly>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationDefault05" class="form-label">Lead Time/ Plazo de entrega</label>
                                        <input type="text" class="form-control" name="plazoentregaN" id="plazoentregaN" readonly>

                                    </div>


                                    <br>
                                    <br>
                                    <br>


                                    <div class="col-md-2">
                                        <label for="validationDefault06" class="form-label">Client/ Cliente</label>
                                        <select class="form-select" value="" name="clienteN" readonly>
                                            <option value="" id="clienteeN"></option>


                                        </select>

                                    </div>

                                    <div class="col-md-2">
                                        <label for="validationDefault06" class="form-label">Project / Proyecto</label>
                                        <input type="text" class="form-control" name="proyectoN" id="proyectoN" value="" readonly>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationDefault08" class="form-label">Insurance included/ Seguro incluido</label>
                                        <select class="form-select" name="seguroincluN" readonly>
                                            <option selected readonly value="" id="seguroincluN"></option>


                                        </select>

                                    </div>
                                    <div class="col-md-2">
                                        <label for="validationDefault09" class="form-label">Vendor offer / Oferta suministrador</label>
                                        <input type="text" class="form-control" name="ofertasumN" id="ofertasumN" readonly>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationDefault10" class="form-label">Special Instructions / Condiciones Especiales</label>
                                        <input type="text" class="form-control" name="condicionesespN" id="condicionesespN" readonly>

                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-12 mx-auto">

                    <hr />
                    <div class="card" style="margin-top: -3%;">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <div class="row g-3 needs-validation" novalidate>
                                    <div class="table-responsive inputSummary">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>

                                                    <th style="width:13%;">Referencia</t>
                                                    <th style="width: 40%;">Descripción</th>
                                                    <th style="width:10%;">Cantidad</th>
                                                    <th>Precio unitario</th>
                                                    <th> </th>
                                                    <th>Tasa(%)</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="solicitanteN_0" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" id="descripN_0" readonly></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  required> -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" id="cantN_0">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="precuniN_0">

                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" id="tasaporN_0">

                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="tasaN_0">

                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="totalesN_0">

                                                        </div>
                                                    </td>


                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="solicitanteN_1" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" id="descripN_1" readonly></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" id="cantN_1" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="precuniN_1" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" id="tasaporN_1" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="tasaN_1" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="totalesN_1" readonly>

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="solicitanteN_2" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <textarea class="form-control" rows="1" cols="1" id="descripN_2" readonly></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" id="cantN_2" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="precuniN_2" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" id="tasaporN_2" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="tasaN_2" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="totalesN_2" readonly>

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="solicitanteN_3" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" id="descripN_3" readonly></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" id="cantN_3" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="precuniN_3" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" id="tasaporN_3" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="tasaN_3" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="totalesN_3" readonly>

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="solicitanteN_4" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" id="descripN_4" readonly></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" id="cantN_4" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="precuniN_4" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" id="tasaporN_4" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="tasaN_4" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="totalesN_4" readonly>

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="solicitanteN_5" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" id="descripN_5" readonly></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" id="cantN_5" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="precuniN_5" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" id="tasaporN_5" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="tasaN_5" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="totalesN_5" readonly>

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="solicitanteN_6" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" id="descripN_6" readonly></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" id="cantN_6" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="precuniN_6" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" id="tasaporN_6" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="tasaN_6" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="totalesN_6" readonly>

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="solicitanteN_7" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" id="descripN_7" readonly></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" id="cantN_7" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="precuniN_7" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" id="tasaporN_7" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="tasaN_7" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="totalesN_7" readonly>

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="solicitanteN_8" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" id="descripN_8" readonly></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" id="cantN_8" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="precuniN_8" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" id="tasaporN_8" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="tasaN_8" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="totalesN_8" readonly>

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="solicitanteN_9" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" id="descripN_9" readonly></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" id="cantN_9" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="precuniN_9" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" id="tasaporN_9" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="tasaN_9" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="totalesN_9" readonly>

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="solicitanteN_10" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" id="descripN_10" readonly></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" id="cantN_10" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="precuniN_1" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" id="tasaporN_10" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="tasaN_10" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="totalesN_10" readonly>

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="solicitanteN_11" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" id="descripN_11" readonly></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" id="cantN_11" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="precuniN_1" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" id="tasaporN_11" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="tasaN_11" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="totalesN_11" readonly>

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="solicitanteN_12" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" id="descripN_12" readonly></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" id="cantN_12" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="precuniN_1" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" id="tasaporN_12" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="tasaN_12" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="totalesN_12" readonly>

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="solicitanteN_13" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" id="descripN_13" readonly></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" id="cantN_13" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="precuniN_1" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" id="tasaporN_13" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="tasaN_13" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="totalesN_13" readonly>

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="solicitanteN_14" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" id="descripN_14" readonly></textarea>


                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" id="cantN_14" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="precuniN_1" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" id="tasaporN_14" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="tasaN_14" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" id="totalesN_14" readonly>

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control solicitante" id="solicitanteN_15" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control descrip" rows="1" cols="1" id="descripN_15" readonly></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control cant" id="cantN_15" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control precuni" id="precuniN_15" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="hidden" class="form-control" id="tasaporN_15" readonly>

                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control tasa" id="tasaN_15" readonly>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control totales" id="totalesN_15" readonly>

                                                        </div>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                                <!-- -------------------------------------------------------------------------- -->
                                <!-- addInput agrega filas a tabla de prouctos                                  -->
                                <!-- -------------------------------------------------------------------------- -->

                                <!-- <button type="button" class="btn btn-warning" style="margin-left: 0.5%;" title="Agregar fila" onclick="addInput(this,'inputSummary')"><i class="lni lni-plus"></i></button>
                                <label for="" class="form-label" style="color:#c2c2c2;">&ensp;Agregar solo filas necesarias</label> -->

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-12 col-xl-12 col-sm-12 col-md-12  mx-auto">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="my-3 border-top"></div>
                        <h6 class="mb-0">Subtotal: <span class="float-end"><input type="text" class="form-control" style="position: relative; margin-top: -5%" id="subtotallN" value=""></span></h5>
                            <div class="my-3 border-top"></div>
                            <h6 class="mb-0">Taxes: <span class="float-end"><input type="text" class="form-control" style="position: relative; margin-top: -5%" id="taxessN" value="" y></span></h5>
                                <div class="my-3 border-top"></div>
                                <h6 class="mb-0">Shipping: <span class="float-end"><input type="text" class="form-control" style="position: relative; margin-top: -5%" id="shippingglN" value="" readonly></span></h5>
                                    <div class="my-3 border-top"></div>
                                    <h6 class="mb-0">Otros: <span class="float-end"><input type="text" class="form-control" style="position: relative; margin-top: -5%" id="otrossN" value="" readonly></span></h5>
                                        <div class="my-3 border-top"></div>
                                        <h6 class="mb-0">Total: <span class="float-end"><input type="text" class="form-control" style="position: relative; margin-top: -5%" id="totalsoliN" value=""></span></h5>

                                            <div class="my-3 border-top"></div>
                                            <h6 class="mb-0">Moneda: <span class="float-end">
                                                    <input type="text" class="form-control" style="position: relative; margin-top: -5%" id="monedaaN" value="" readonly>
                    </div>
                </div>
                <br>
                <hr>

            </div>

            <div class="card radius-10">
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-3 g-3">

                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                                <div class="widget-icon-2 bg-light-success text-success">
                                    <i class="lni lni-archive"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0">Cuadro de mando</p>
                                    <br>
                                    <a href="" download="" id="cuadroM">Archivo adjunto</a>
                                    <br>
                                    <div class="form-check mb-3">

                                        <!-- <input type="checkbox" name="novalido1"  id="novalido1"value="Option 1">
                      <label class="form-check-label" >No valido</label> -->


                                    </div>
                                    <div class="progress my-0" style="height: 6px;">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                                <div class="widget-icon-2 bg-light-success text-success">
                                    <i class="lni lni-archive"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0">Oferta de proveedor</p>
                                    <br>
                                    <a href="" download="" id="ofertaP">Archivo adjunto</a>
                                    <div class="form-check mb-3">
                                        <!-- id="validationFormCheck1" -->
                                        <br>
                                        <!-- <input type="checkbox" name="novalido2" id="novalido2" value="Option 1">
                            <label class="form-check-label" >No valido</label> -->

                                    </div>
                                    <?php

                                    ?>

                                    <div class="progress my-0" style="height: 6px;">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                                <div class="widget-icon-2 bg-light-success text-success">
                                    <i class="lni lni-archive"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0">Especificación tecnica</p>
                                    <br>
                                    <a href="" download="" id="especifiT">Archivo adjunto</a>
                                    <div class="form-check mb-3">
                                        <br>
                                        <!-- <input type="checkbox" name="novalido3" id="novalido3" value="Option 1">
                         
                          <label class="form-check-label">No valido</label>  -->

                                    </div>
                                    <!-- <h4 class="mb-2 text-success">$85K</h4> -->
                                    <div class="progress my-0" style="height: 6px;">

                                    </div>
                                </div>
                            </div>
                        </div>






                    </div><!--end row-->



                    <!-- <div class="col-12" id="inputContainer" style="display: none;">
                        <label class="form-label">Comentarios</label>
                        <textarea class="form-control" rows="4" cols="4" id="comentarioRechazo" name="comentarioRechazo"></textarea>
                    </div>

                    <div class="col-12">

                        <br><br>
                        <label for="rechazarCheckbox">Rechazar solicitud</label>
                        <input type="checkbox" id="rechazarCheckbox"><br>

                    </div> -->
                </div>
            </div>

            <!-- <div class="btn-group btn-group-toggle" data-toggle="buttons">

                <button id="Brechazar" class="btn btn-danger btn-md btn-block " style="display: none;" type="submit">Rechazar solicitud</button>

                <button id="Baprobar" class="btn btn-primary btn-md btn-block" style="display: block;" type="submit">Aprobar solicitud</button>
                <br>
            </div> -->

            <?php

            // $actualizarSolicitarAR = new SolicitudC();
            // $actualizarSolicitarAR->ActualizarARSolicitudC();

            ?>

            </form>

        </div>
    </div>
</div>



</div>
<!--end wrapper-->

<?php
$borrarS = new SolicitudC();
$borrarS->EliminarSolicitudC();
?>



