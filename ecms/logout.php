<?php
	session_start();
	$_SESSION = array();
	setcookie("logged", 'false', time() - 1);
	header("Location: /");
?>