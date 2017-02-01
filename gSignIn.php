<?php
	session_start();
	$_SESSION['user'] = $_POST['user'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['id'] = $_POST['id'];
	//if email dosen tambahin status session
	//$_SESSION['type']="dosen";
	//$_SESSION['type']="koor";

	die();
?>