 <!--start top header-->
 <header class="top-header" style="
    background-color: #1B4F72;">
   <nav class="navbar navbar-expand gap-3" style="
    background-color: #1B4F72;">
     <div class="mobile-menu-button">
       <ion-icon name="menu-sharp"></ion-icon>
     </div>
     <form class="searchbar">
       <!-- <div class="position-absolute top-50 translate-middle-y search-icon ms-3">
            <ion-icon name="search-sharp"></ion-icon>
          </div> -->
       <!-- <input class="form-control" type="text" placeholder="Search for anything"> -->
       <div class="position-absolute top-50 translate-middle-y search-close-icon">
         <ion-icon name="close-sharp"></ion-icon>
       </div>
     </form>
     <div class="top-navbar-right ms-auto">

       <ul class="navbar-nav align-items-center">
         <!-- <li class="nav-item mobile-search-button">
              <a class="nav-link" href="javascript:;">
                <div class="">
                  <ion-icon name="search-sharp"></ion-icon>
                </div>
              </a>
            </li> -->

         <li class="nav-item dropdown dropdown-large">
           <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
             <div class="position-relative">
               <!-- <span class="notify-badge">8</span> -->
               <ion-icon name="notifications-sharp" style="
                color: #fff;"></ion-icon>
             </div>
           </a>
           <div class="dropdown-menu dropdown-menu-end">
             <a href="javascript:;">
               <div class="msg-header">
                 <p class="msg-header-title">Notificationes</p>
                 <!-- <p class="msg-header-clear ms-auto">Marks all as read</p> -->
               </div>
             </a>
             <div class="header-notifications-list">
               <a class="dropdown-item" href="javascript:;">
                 <div class="d-flex align-items-center">
                   <div class="notify text-primary">
                     <ion-icon name="cart-outline"></ion-icon>
                   </div>
                   <div class="flex-grow-1">
                     <h6 class="msg-name">----</h6>
                     <p class="msg-info">----</p>
                   </div>
                 </div>
               </a>



             </div>

           </div>
         </li>
         <li class="nav-item dropdown dropdown-user-setting">
           <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
             <div class="user-setting">

               <?php
                if ($_SESSION["foto"] == "") {
                  echo '<img src="vistas/img/usuarios/defecto.png" class="user-img" alt="Imagen usuario">
                  ';
                } else {
                  echo '<img src="' . $_SESSION["foto"] . '" class="user-img" alt="Imagen usuario">';
                }
                ?>

             </div>
           </a>
           <ul class="dropdown-menu dropdown-menu-end">
             <li>
               <a class="dropdown-item" href="#">

                 <?php

                  if ($_SESSION["foto"] == "") {
                    echo ' <img src="vistas/img/usuarios/defecto.png" alt="" class="rounded-circle" width="54" height="54" alt="Imagen usuario">
                    ';
                  } else {
                    echo '<img src="' . $_SESSION["foto"] . '" class="user-img" alt="Imagen usuario">';
                  }

                  ?>
                 <div class="d-flex flex-row align-items-center gap-2">

                   <div class="">
                     <h6 class="mb-0 dropdown-user-name"><?php echo $_SESSION["nombre"];  ?></h6>
                     <small class="mb-0 dropdown-user-designation text-secondary"><?php echo $_SESSION["cargo"]; ?></small>
                   </div>
                 </div>
               </a>
             </li>
             <li>
               <hr class="dropdown-divider">
             </li>
             <li>
               <a class="dropdown-item" href="perfil-usuario">
                 <div class="d-flex align-items-center">
                   <div class="">
                     <ion-icon name="person-outline"></ion-icon>
                   </div>
                   <div class="ms-3"><span>Perfil</span></div>
                 </div>
               </a>
             </li>
             <li>
               <hr class="dropdown-divider">
             </li>
             <li>
               <a class="dropdown-item" href="salir">
                 <div class="d-flex align-items-center">
                   <div class="">
                     <ion-icon name="log-out-outline"></ion-icon>
                   </div>
                   <div class="ms-3"><span>Cerrar sesión </span></div>
                 </div>
               </a>
             </li>
           </ul>
         </li>

       </ul>

     </div>
   </nav>
 </header>
 <!--end top header-->