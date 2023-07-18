<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header" style="
    background-color: #1B4F72;">
    <div>
      <a href="inicio"><img src="vistas/img/logo-reg.png" class="logo-icon" style="margin-left: -8%;width: 81%; margin-top: 23%;" alt="logo icon"></a>
    </div>
    <div>
      <a href="inicio">
        <h4 class="logo-text" style="font-size: 18px; margin-left: -11%;
    margin-top: 6%;">Retos Energeticos</h4>
      </a>
    </div>
    <div class="toggle-icon ms-auto">
      <ion-icon name="menu-sharp"></ion-icon>
    </div>
  </div>
  <!--navigation-->
  <ul class="metismenu" id="menu">

    <?php
    if ($_SESSION["rol"] == "Administrador") {
      echo '<li class="menu-label">Elementos</li>
          <li>
            <a href="javascript:;" class="has-arrow">
              <div class="parent-icon">
                <ion-icon name="briefcase-sharp"></ion-icon>
              </div>
              <div class="menu-title">Herramientas</div>
            </a>
  
            <ul>             
              <li> <a href="usuarios">
              <i class="lni lni-users"></i>&nbsp Usuarios
                </a>
              </li>
              <li> <a href="clientes">
              <i class="fadeIn animated bx bx-briefcase-alt-2"></i>&nbsp Clientes
                </a>
              </li>
              
              <li> <a href="manager">
              <i class="fadeIn animated bx bx-user-pin"></i></ion-icon>&nbsp Manager
                    </a>
              </li>
              <li> <a href="orden-compraD">
              <i class="fadeIn animated bx bx-user-pin"></i></ion-icon>&nbsp Director
                    </a>
              </li>
              <li> <a href="solicitud-compraCO">
              <i class="fadeIn animated bx bx-user-pin"></i></ion-icon>&nbsp Compras
                    </a>
              </li>
          </li>';


      if (
        $_SESSION["rol"] == "Administrador" ||  $_SESSION["rol"] == "Compras"
        ||  $_SESSION["rol"] == "Manager" ||  $_SESSION["rol"] == "Director"
      ) {
        echo '<li> <a href="proveedores">
                        <i class="lni lni-delivery"></i>&nbsp Proveedores
                          </a>
                        </li>
                        </ul>
                        ';
      }
    }
    

    if (
      $_SESSION["rol"] == "Administrador" || $_SESSION["rol"] == "Empleado"
      || $_SESSION["rol"] == "Compras"  || $_SESSION["rol"] == "Director"
    ) {
      echo '   
       <li>
                <a class="has-arrow" href="javascript:;">
                  <div class="parent-icon">
                    <ion-icon name="server-sharp"></ion-icon>
                  </div>
                  <div class="menu-title">Compras</div>
                </a>
                <ul>';
                if (
                  $_SESSION["rol"] == "Administrador" || $_SESSION["rol"] == "Empleado"
                  || $_SESSION["rol"] == "Compras"  
                ) {
                  echo'
                  <li> <a href="solicitud-compras">
                  <i class="fadeIn animated bx bx-receipt"></i>&nbsp Solicitud de compra
                    </a>
                  </li>

        </li>';
                }

      if (
        $_SESSION["rol"] == "Administrador" || $_SESSION["rol"] == "Director" 
      ) {
        echo '<li> <a href="orden-compraD">
                           <i class="fadeIn animated bx bx-clipboard"></i>&nbsp Orden de compra
                             </a>
                           </li>
                           </ul>
                           ';
      }
    }

    if (
       $_SESSION["rol"] == "Manager" 
    ) {
      echo '   
       <li>
                <a class="has-arrow" href="javascript:;">
                  <div class="parent-icon">
                    <ion-icon name="server-sharp"></ion-icon>
                  </div>
                  <div class="menu-title">Compras</div>
                </a>
                <ul>
                  <li> <a href="manager">
                  <i class="fadeIn animated bx bx-receipt"></i>&nbsp Solicitud de compra
                    </a>
                  </li>

        </li>';

     
    }

    if ($_SESSION["rol"] == "Administrador") {
      echo '<li class="menu-label">Paginas</li>

            </li>
            <li>
              <a class="has-arrow" href="javascript:;">
                <div class="parent-icon">
                  <ion-icon name="map-sharp"></ion-icon>
                </div>
                <div class="menu-title">------</div>
              </a>
              <ul>
                <li> <a href="map-google-maps.html">
                    <ion-icon name="ellipse-outline"></ion-icon>-----
                  </a>
                </li>
                <li> <a href="map-vector-maps.html">
                    <ion-icon name="ellipse-outline"></ion-icon>-----
                  </a>
                </li>
              </ul>
            </li>';
    }

    ?>






  </ul>
  <!--end navigation-->
</aside>
<!--end sidebar -->
