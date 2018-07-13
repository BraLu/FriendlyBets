<?php
  session_start();
  if (isset($_SESSION["session"])) 
  {
     
  }else
  {
     $_SESSION["session"] = "";
     /*echo "Session2".$_SESSION["session"];*/
  }
  
?>

<!DOCTYPE html>
<html lang="es">

<!--Aqui va el Head-->
  <?php include("views/head.php") ?>
  
<!---->

<body class="">

    <!--Loading-->
      <!---
      <div class="modal fade" id="loading" tabindex="-1" role="dialog" aria-labelledby="loadingLabel" aria-hidden="true">
          <div class="modal-dialog" id="fbloading">
              <img src="assets/img/loading.gif" width="200px">
          </div>
      </div>
      -->
      <div class="modal-fbloading" style="display: none;">
          <div style="background-color: #000;position: fixed; top: 0; right: 0; bottom: 0; left: 0; z-index: 1060;opacity: 0.20;"></div>
          <div id="fbloading"><img src="assets/img/loading.gif"></div>
      </div>

    <!---->

  <div class="wrapper ">
    <!--Aqui va el sidebar-->
      <?php include("views/sidebar.php") ?>    
    <!---->

    <div class="main-panel">

      <!--Aqui va el navbar-->
        <?php include("views/navbar.php") ?>  
      <!---->

      <div class="panel-header panel-header-sm">
      <!--Hola -->
      </div>

      <div class="content">
          <!--Aqui va el contenido por el ejemplo el formulario del login-->
            <?php

              if (($_SESSION["session"] != 0)) {
                // Pequeña lógica para capturar la pagina que queremos abrir
                $pagina = isset($_GET['p']) ? strtolower($_GET['p']) : 'home';
                
                /* Estamos considerando que el parámetro enviando tiene el mismo nombre del archivo a cargar, si este no fuera así
                  se produciría un error de archivo no encontrado */
                  include('views/' . $pagina . '.php');
                  
              }else{
                
                // Pequeña lógica para capturar la pagina que queremos abrir
                $pagina = isset($_GET['p']) ? strtolower($_GET['p']) : 'login';

                /* Estamos considerando que el parámetro enviando tiene el mismo nombre del archivo a cargar, si este no fuera así
                  se produciría un error de archivo no encontrado */
                  include('views/' . $pagina . '.php');
              }

            ?>
          <!---->
      </div>
      
      <!--Aqui va el footer-->
        <?php include("views/footer.php") ?>
      <!---->

    </div>
    
  </div>


  <!--Aqui va References Inferior-->
    <?php include("views/references_inferior.php") ?>
  <!---->

</body>

</html>