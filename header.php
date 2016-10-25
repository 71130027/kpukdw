<?php
	header("Access-Control-Allow-Origin: *");
	include('koneksi.php');
	session_start();
	$_SESSION['record'] = 2;
	$_SESSION['last_accdec'] = "accept"; //none, pending, accept, decline
?>
<html>
	<head>
		<title>KaPeTI</title>
		<script src="scripts.js"></script>
		<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
		<meta name="google-signin-client_id" content="650232885328-e6gsbsa4vgi5gv0nbv87ntjgiar9cfaq.apps.googleusercontent.com">
		<script src="http://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="header.css">
	</head>
	<body>
		<div id="header">
			<div id="head">
				<a id="title">KaPeTI</a>
				<br>
				<p id="subtitle">Sistem Pengelolaan Kerja Praktik <strong>TI UKDW Yogyakarta</strong></p>
			</div>
		</div>
		<div id="menu">
			<div id="signin">
				<div id="gauth">
					<?php
						if(isset($_SESSION['user']))
						{
							echo '<div>'.$_SESSION['user'].'</div>';
						}
						else
						{
							echo '<div id="google" class="g-signin2" data-onsuccess="onSignIn"></div>';
						}
					?>
				</div>
			</div>
			<ul id="menupanel">
				<a href=""><li><div id="p-home">Home</div></li></a>
				<?php
					if(isset($_SESSION['user']))
					{
						if($_SESSION['record']==0||$_SESSION['last_accdec']=="decline"||$_SESSION['last_accdec']=="none")
							echo '<a onclick="goLoad(\'status\')" href="#"><li><div id="p-pengajuan">Pengajuan KP</div></li></a>';
						else if($_SESSION['record']>0&&$_SESSION['last_accdec']=="pending")
							echo '<a onclick="goLoad(\'status\')" href="#"><li><div id="p-status">Status</div></li></a>';
						else if($_SESSION['last_accdec']=="accept")
							echo '<a onclick="goLoad(\'registrasi\')" href="#"><li><div id="p-registrasi">Registrasi</div></li></a>';
						
						echo '<a onclick="goLoad(\'download\')" href="#"><li><div id="p-download">Download</div></li></a>';
						echo '<a href="signout.php"><li><div id="signinout">Log Out</div></li></a>';
					}
				?>
			</ul>
		</div>
	</body>
</html>