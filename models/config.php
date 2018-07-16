<?php

define('HOST','localhost'); 
define('USER','root');
define('PASS','');
define('DBNAME','friendlybets');
define('MONEDA','S/.');

if (isset($_SESSION["session"])) 
{
 	define('IDUSUARIO',$_SESSION['session']);
}


?>