<?php

// if($_SESSION["rol"] != "Administrador" || $_SESSION["rol"]== "Manager" 
// || $_SESSION["rol"] != "Director"){

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
                <div class="breadcrumb-title pe-3">Gestor de usuarios </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="inicio"><ion-icon name="home-outline"></ion-icon></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Consulta usuarios</li>
                        </ol>

                    </nav>

                </div>
               
            </div>
            <!--end breadcrumb-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">

                    <li class="breadcrumb-item active" aria-current="page"><button type="button" class="btn btn-info px-5" style="color: #fff;" data-bs-toggle="modal" data-bs-target="#insertarUsuarios"><i class="fadeIn animated bx bx-user-plus"></i>Agregar usuario</button></li>


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
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered TB">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Nombre</th>
                                    <th>Cargo</th>
                                    <th>Correo electrónico</th>
                                    <th>Rol</th>
                                    <th>Foto</th>
                                    <th>Firma</th>
                                    <th>Iniciales solicitante</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $verU = UsuariosC::VerUsuariosC();

                                foreach ($verU as $key => $value) {

                                    echo '<tr>
                                            <td>' . $value["usuario"] . '</td>
                                            <td>' . $value["nombre"] . '</td>
                                            <td>' . $value["cargo"] . '</td>
                                            <td>' . $value["correo"] . '</td>
                                            <td>' . $value["rol"] . '</td>
                                            ';

                                    //abrimos una nueva condicion en dodnde foto es diferente a vacio tendra un eco en el td entonces mostrara la foto de la base de datos en la variable value[foto]
                                    if ($value["foto"] != "") {
                                        //<!--Se agregara un tamaño de imagen en width-->
                                        echo '
                                                <td>
                                                <img src="' . $value["foto"] . '" class="user-image" alt="User Image" width="40px;"></td>';
                                        //si no vendra con la imagen por defecto sin foto 
                                    } else {
                                        echo '<td>
                                            <img src="vistas/img/usuarios/defecto.png" class="user-image" alt="User Image" width="40px;"></td>';
                                    }
                                    if ($value["firma"] != "") {
                                        //<!--Se agregara un tamaño de imagen en width-->
                                        echo '
                                                <td>
                                                <img src="' . $value["firma"] . '" class="user-image" alt="User Image" width="40px;"></td>';
                                        //si no vendra con la imagen por defecto sin foto 
                                    } else {
                                        echo '<td>
                                            <img src="vistas/img/usuarios/defecto.png" class="user-image" alt="User Image" width="40px;"></td>';
                                    }




                                    //Agregamos la clase BorrarU y un atributo llamado Uid ese atributo sera igual a lo que venga concatenado a value["rol"] id del modelo de la base de datos 
                                    echo ' <td>' . $value["iniciales_firma"] . '</td>
                                            <td>
                                            <div class="btn-group">
                                            <button class="btn btn-warning EditarU" Uid="' . $value["id"] . '"" data-bs-toggle="modal" data-bs-target="#EditarU"><i class="fadeIn animated bx bx-edit-alt"></i></button>

                                            <button class="btn btn-danger BorrarU" Uid="' . $value["id"] . '" Ufoto="' . $value["foto"] . '" Ufirma="' . $value["firma"] . '" ><i class="fadeIn animated bx bx-trash-alt"></i></button>
                                        </div>
                                            </td>

                                          </tr>';
                                }


                                $item = null;
                                $valor = null;

                                $editarU = UsuariosC::EUsuariosC($item, $valor);

                                ?>



                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content-->

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



<!-- Modal -->
<div class="modal fade" id="insertarUsuarios" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fadeIn animated bx bx-user-plus"></i>
                <h5 class="modal-title">Agregar usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <form method="post" role="form" enctype="multipart/form-data" class="row g-3 needs-validation">
                                    <div class="col-md-12">
                                        <label class="form-label">Usuario</label>
                                        <input type="text" class="form-control" name="usuarioN" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Nombre completo</label>
                                        <input type="text" class="form-control" name="nombreN" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="frm-label">Cargo laboral</label>
                                        <input type="text" class="form-control" name="cargoN" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="frm-label">Correo electrónico </label>
                                        <input type="email" class="form-control" name="correoN" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="frm-label">Contraseña</label>
                                        <input type="password" class="form-control" name="claveN" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Foto de perfil</label>
                                        <input type="file" class="form-control" name="fotoN">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Firma</label>
                                        <input type="file" class="form-control" name="firmaN">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Iniciales Solicitante</label>
                                        <input type="text" class="form-control" name="iniciales_firmaN">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Rol de usuario</label>
                                        <select class="form-select" name="rolN">
                                            <option selected disabled value="">Elige un rol...</option>
                                            <option value="Administracion">Administrador</option>
                                            <option value="Empleado">Empleado</option>
                                            <option value="Director">Director</option>
                                            <option value="Manager">Manager</option>
                                            <option value="Compras">Compras</option>
                                        </select>
                                        <div class="valid-feedback">Archivo relleno correctamente!</div>
                                        <div class="invalid-feedback"> requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Agregar</button>
                                    </div>
                                    <?php
                                    $crearU = new UsuariosC();
                                    $crearU->CrearUsuariosC();
                                    ?>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Usuarios -->
<div class="modal fade" id="EditarU" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fadeIn animated bx bx-user-plus"></i>
                <h5 class="modal-title">Editar usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row">
                <div class="col-xl-12 mx-auto">

                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <form method="post" role="form" enctype="multipart/form-data" class="row g-3 needs-validation">
                                    <div class="col-md-12">
                                        <label class="form-label">Usuario</label>
                                        <input type="text" class="form-control" id="usuarioE" name="usuarioE" required>

                                        <input type="hidden" id="Uid" name="Uid">

                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Nombre completo</label>
                                        <input type="text" class="form-control" id="nombreE" name="nombreE" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="frm-label">Cargo</label>
                                        <input type="text" class="form-control" id="cargoE" name="cargoE" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="frm-label">Correo electrónico</label>
                                        <input type="text" class="form-control" id="correoE" name="correoE" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="frm-label">Contraseña</label>
                                        <input type="password" class="form-control" id="claveE" name="claveE" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="frm-label">Iniciales Solicitante</label>
                                        <input type="text" class="form-control" id="iniciales_firmaE" name="iniciales_firmaE" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">Foto de perfil</label>
                                        <input type="file" class="form-control" id="fotoE" name="fotoE">
                                        <br>
                                        <div class="user-change-photo shadow">
                                            <img class="visor" src="vistas/img/usuarios/defecto.png" alt="Foto usuario actual">
                                        </div>
                                        <br>
                                        <p class="mb-1">peso máximo permitido 200MB</p>
                                        <input type="hidden" name="FotoActual" id="FotoActual">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Firma</label>
                                        <input type="file" class="form-control" id="firmaE" name="firmaE">
                                        <br>
                                        <div class="user-change-photo shadow">
                                            <img class="visor2" src="vistas/img/usuarios/defecto.png" alt="Firma usuario actual">
                                        </div>
                                        <br>
                                        <p class="mb-1">peso máximo permitido 200MB</p>
                                        <input type="hidden" name="FirmaActual" id="FirmaActual">
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">Rol de usuario</label>
                                        <select class="form-select" name="rolE">
                                            <option id="rolE"></option>
                                            <option value="Administracion">Administrador</option>
                                            <option value="Empleado">Empleado</option>
                                            <option value="Director">Director</option>
                                            <option value="Manager">Manager</option>
                                            <option value="Compras">Compras</option>
                                            
                                        </select>
                                        <div class="valid-feedback">Archivo relleno correctamente!</div>
                                        <div class="invalid-feedback"> requerido, favor de rellenar!</div>
                                    </div>


                                    <div class="modal-footer">

                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar cambios</button>
                                    </div>
                            </div>

                            <?php
                             $actualizarU = new UsuariosC();
                             $actualizarU -> ActualizarUsuariosC();


                            ?>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<!--end wrapper-->

<?php
$borrarU = new UsuariosC();
$borrarU->BorrarUsuariosC();

?>