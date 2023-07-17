<!--start wrapper-->
<div class="wrapper">





    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content" style="margin-bottom: -3%;">

            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Gestor de solicitud de compra</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="inicio"><ion-icon name="home-outline"></ion-icon></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Consulta proveedores</li>
                        </ol>

                    </nav>

                </div>
                <!-- <div class="ms-auto">
              <div class="btn-group">
                <button type="button" class="btn btn-outline-primary">Settings</button>
                <button type="button" class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                  <a class="dropdown-item" href="javascript:;">Another action</a>
                  <a class="dropdown-item" href="javascript:;">Something else here</a>
                  <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
              </div>
            </div> -->
            </div>
            <!--end breadcrumb-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">

                     <li class="breadcrumb-item active" aria-current="page"><button type="button" class="btn btn-info px-5" style="color: #fff;" data-bs-toggle="modal" data-bs-target="#insertarP"><i class="fadeIn animated bx bx-user-plus"></i>Agregar solicitud</button></li> 


                </ol>
            </nav>

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
                                    <th>Solicitante</th>
                                    <th>Plazo de entrega</th>
                                    <th>Suministrador</th>
                                    <th>ATN</th>
                                    <th>Referencia suministrador</th>
                                    <th>Descripción</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Subtotal</th>
                                    <th>Taxes</th>
                                    <th>Shipping</th>
                                    <th>Otros</th>
                                    <th>Total</th>
                                    <th>Moneda</th>
                                    <th>Acciones</th>

                            </thead>
                            <tbody>
                                <!-- -------------------------------------------------------------------------- -->
                                <!--                      Vista de datos de tabla solicitud                     -->
                                <!-- -------------------------------------------------------------------------- -->
                                <?php
                                $item = null;
                                $valor = null;
                                $verS = SolicitudC::VerSolicitudC($item, $valor);
                                ?>
                                <?php
                                /* -------------------------------------------------------------------------- */
                                /*abrimos un foreach con la variable respuesta traiga un echo con lo que tenemos
                                  como registros en la tabla                                                  */
                                /* -------------------------------------------------------------------------- */

                                foreach ($verS as $key => $value) {
                                    echo '
                                    </tr>';
                                ?>
                                    <tr>
                                        <td><?php
                                            if ($value['estado'] == 1) {
                                                echo ' <button class="btn btn-secondary btn-block" type="submit">En proceso</button>';
                                            }
                                            if ($value['estado'] == 2) {
                                                echo ' <button class="btn btn-success btn-block" type="submit">Aprobada</button>';
                                            }
                                            if ($value['estado'] == 3) {
                                                echo ' <button class="btn btn-danger btn-block" type="submit">Rechazada</button>';
                                            }

                                            ?></td>

                                        <td><?php echo $value["solicitante_lentrega"] ?></td>
                                        <td><?php echo $value["plazo_entr"] ?></td>
                                        <td><?php echo $value["nombre"] ?></td>
                                        <td><?php echo $value["atn"] ?></td>
                                        <td><?php echo $value["ref_suministrador"] ?></td>
                                        <td><?php echo $value["descripcion"] ?></td>
                                        <td><?php echo $value["cantidad"] ?></td>
                                        <td><?php echo $value["precio_unitario"] ?></td>                                       
                                        <td><?php echo $value["subtotal_soli"] ?></td>
                                        <td><?php echo $value["taxes"] ?></td>
                                        <td><?php echo $value["pago_envio_soli"] ?></td>
                                        <td><?php echo $value["otros_soli"] ?></td>                                        
                                        <td><?php echo  $value["total_soli"] ?></td>
                                        <td><?php echo $value["moneda"] ?></td>


                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning"><i class="fadeIn animated bx bx-edit-alt"></i></button>
                                                <button class="btn btn-danger " title="Eliminar solicitud"><i class="fadeIn animated bx bx-trash-alt"></i></button>
                                                <button class="btn btn-secondary " title="PDF"><i class="bi bi-file-earmark-pdf"></i></button>
                                            </div>
                                        </td>

                                    </tr <?php } ?> 
                                    
                                    ?>

                            </tbody>
                        </table>
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








<?php
$borrarU = new UsuariosC();
$borrarU->BorrarUsuariosC();

?>