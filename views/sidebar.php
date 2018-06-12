
<div class="sidebar" data-color="blue">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
    <a href="http://www.creative-tim.com" class="simple-text logo-mini">
      FB
    </a>
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
      Friendly Bets
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">

      <?php 

        if (!empty($_SESSION["session"]) and ($_SESSION["session"] != "")) {
          # code...
          echo "<li>".
                "<a href='?p=home'>".
                  "<i class='now-ui-icons objects_globe'></i>".
                  "<p>Home</p>".
                "</a>".
              "</li>".
              "<li>".
                "<a href='./security/cerrar_session.php'>".
                  "<i class='now-ui-icons ui-1_simple-remove'></i>".
                  "<p>Cerrar Sessión</p>".
                "</a>".
              "</li>";
        }else{
          echo "<li>".
                "<a href='?p=login'>".
                  "<i class='now-ui-icons users_circle-08'></i>".
                  "<p>Login</p>".
                "</a>".
              "</li>".
              "<li >".
                "<a href='?p=nosotros'>".
                  "<i class='now-ui-icons text_align-center'></i>".
                  "<p>Nosotros</p>".
                "</a>".
              "</li>";
        }

      ?>
    </ul>
  </div>
</div>