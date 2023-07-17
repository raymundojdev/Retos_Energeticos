 <!--start wrapper-->
 <div class="wrapper">
    <div class="">
      <div class="row g-0 m-0">
        <div class="col-xl-6 col-lg-12">
          <div class="login-cover-wrapper">
            <div class="card shadow-none">
              <div class="card-body">
                <div class="text-center">
                  <h4>Retos Energeticos</h4>
                  <p>Ingreso al sistema</p>
                </div>
                <form class="form-body row g-3" method="post">
                  <div class="col-12">
                    <label class="form-label">Usuario</label>
                    <input type="text" class="form-control" placeholder="Ingrese usuario"  name="usuario-Ing">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control" placeholder="Ingrese contraseña" name="clave-Ing">
                  </div>
                  <div class="col-12 col-lg-6">
                   
                  </div>
                  
                  <div class="col-12 col-lg-12">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-dark">Iniciar sesión</button>
                    </div>
                  </div>
                  <?php 

                  error_reporting(0);
                  //clase UsuariosC
                  $ingreso = new UsuariosC();
                  //LLamar la funcion IngresoUsuariosC
                  $ingreso -> IngresoUsuariosC();

                  echo '
                  
                  <script>
                  
                  </script>
                  ';

                  ?>
                 
                  <!-- <div class="col-12 col-lg-12">
                    <div class="social-login d-flex flex-row align-items-center justify-content-center gap-2 my-2">
                      <a href="javascript:;" class=""><img src="assets/images/icons/facebook.png" alt=""></a>
                      <a href="javascript:;" class=""><img src="assets/images/icons/apple-black-logo.png" alt=""></a>
                      <a href="javascript:;" class=""><img src="assets/images/icons/google.png" alt=""></a>
                    </div>
                  </div>
                  -->
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-12">
          <div class="position-fixed top-0 h-100 d-xl-block d-none login-cover-img">
          </div>
        </div>
      </div>
      <!--end row-->
    </div>
  </div>
  <!--end wrapper-->