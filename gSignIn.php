<?php
	session_start();
	$_SESSION['user'] = $_POST['user'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['token'] = $_POST['token'];

	die();
?>