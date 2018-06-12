<?php
	session_start();
	$_SESSION["session"] = "amamani";
	header("Location:../index.php");
?>
