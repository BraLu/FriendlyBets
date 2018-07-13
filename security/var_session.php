<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $value = $_POST['value'];
        $_SESSION["session"] = $value;
    }
    echo $_SESSION["session"];

?>