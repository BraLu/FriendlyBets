<?php
  session_start();
  if (isset($_SESSION["session"])) 
  {
     
  }else
  {
     $_SESSION["session"] = "";
     echo "Session2".$_SESSION["session"];
  }
  
?>

<!DOCTYPE html>
<html lang="es">

<!--Aqui va el Head-->
  <?php include("views/head.php") ?>
  
<!---->

<body class="">
  <div class="wrapper ">

    <!--Aqui va el sidebar-->
      <?php include("views/sidebar.php") ?>    
    <!---->

    <div class="main-panel">

      <!--Aqui va el navbar-->
        <?php include("views/navbar.php") ?>  
      <!---->

      <div class="panel-header panel-header-sm">

      </div>

      <div class="content">
          <!--Aqui va el contenido por el ejemplo el formulario del login-->
            <?php

              if (!empty($_SESSION["session"]) and ($_SESSION["session"] != "")) {
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