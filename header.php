<?php
	header("Access-Control-Allow-Origin: *");
	include('koneksi.php');
	session_start();
	//lempar ke dosen/koor
	if(isset($_SESSION['type']))
	{
		if($_SESSION['type']=="koordinator")
		{
			header("Location: koordinator");
		}
	}
	
	$stat = 'NONE';
	if(isset($_SESSION['id']))
	{
		$sql = "SELECT id_lamaran FROM lamaran WHERE google_id='".$_SESSION['id']."' ORDER BY tanggal_input DESC";
		$res = $conn->query($sql);
		$res = $res->fetch_assoc();
		if($res)
		{
			$res = $res['id_lamaran'];
			$sql = "SELECT status_pengajuan, status_registrasi, status_kp FROM lamaran WHERE id_lamaran='".$res."'";
			$res = $conn->query($sql);
			$res = $res->fetch_assoc();
			$_SESSION['last_statPengajuan'] = $res['status_pengajuan'];
		}
	}
?>
<html>
	<head>
		<title>KaPeTI</title>
		<script src="jquery-3.1.1.min.js"></script>
		<script src="scripts.js"></script>
		<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
		<meta name="google-signin-client_id" content="650232885328-e6gsbsa4vgi5gv0nbv87ntjgiar9cfaq.apps.googleusercontent.com">
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
					if(isset($_SESSION['id']))
					{
						if($res==false||$res['status_pengajuan']=="NONE"||$res['status_pengajuan']=="DECLINE"||
						   $res['status_registrasi']=="DECLINE"||$res['status_kp']=="GUGUR")
							echo '<a onclick="goLoad(\'status\')" href="#"><li><div id="p-pengajuan">Pengajuan KP</div></li></a>';
						else if($res['status_pengajuan']=="PENDING"||$res['status_registrasi']!="NONE")
							echo '<a onclick="goLoad(\'status\')" href="#"><li><div id="p-status">Status</div></li></a>';
						else if($res['status_pengajuan']=="ACCEPT")
							echo '<a onclick="goLoad(\'registrasi\')" href="#"><li><div id="p-registrasi">Registrasi</div></li></a>';
						
						echo '<a onclick="goLoad(\'download\')" href="#"><li><div id="p-download">Download</div></li></a>';
						echo '<a href="signout.php"><li><div id="signinout">Log Out</div></li></a>';
					}
				?>
			</ul>
		</div>
	</body>
</html>