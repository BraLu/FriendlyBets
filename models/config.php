<?php

if (!defined('HOST')) define('HOST','localhost'); 
if (!defined('USER')) define('USER','root');
if (!defined('PASS')) define('PASS','');
if (!defined('DBNAME')) define('DBNAME','friendlybets');
if (!defined('MONEDA')) define('MONEDA','S/.');

if (isset($_SESSION["session"])) 
{
 	if (!defined('IDUSUARIO')) define('IDUSUARIO',$_SESSION['session']);
}


?>