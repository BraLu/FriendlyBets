<?php
	session_start();
	$_SESSION["session"] = "";
	header("Location:../index.php");
?>