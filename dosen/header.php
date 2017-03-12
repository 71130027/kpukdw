<?php
header("Access-Control-Allow-Origin: *");
	$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
	mysql_select_db('kpukdw');
	session_start();

	if(isset($_SESSION['type'])){
		if($_SESSION['type']=="dosen" || $_SESSION['type']=="koordinator"){
			
		}
		else
			header("location: ../index.php");	
	}
	else if (!isset($_SESSION['type'])){
		header("location: ../index.php");
	}
	
?>

<html>
	<head>
		<title>KaPeTI</title>
		<script src="http://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="header.css">

	</head>
	<body>
		<div id="header">
			<div id="head">
				<a id="title">KaPeTI</a>
				<script src="scripts.js"></script>
				<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
				<meta name="google-signin-client_id" content="650232885328-e6gsbsa4vgi5gv0nbv87ntjgiar9cfaq.apps.googleusercontent.com">
				<br>
				<p id="subtitle">Sistem Pengelolaan Kerja Praktik <strong>TI UKDW Yogyakarta</strong></p>
			</div>
		</div>
		<div id="menu">
			<div id="signin">
				<div id="gauth">
					<?php
						if(isset($_SESSION['email']))
						{
							$asd = $_SESSION['email'];
							$sql = mysql_query("sELECT * from dosen where dosen_pembimbing = '$asd'");
							$data = mysql_fetch_array($sql);
							echo '<div>'.$data['nama'].'</div>';
						}
						
					?>
				</div>
			</div>
			<ul id="menupanel">
				
				<?php

				
					echo '
				
			<li><div class="dropdown"><a href="/kpukdw/koordinator/logout.php"><button class="dropbtn"><i class="fa fa-code">Logout</i></button></a></div></li>';
			if(isset($_SESSION['type'])){
					if($_SESSION['type']=="koordinator")
						echo '<li><div class="dropdown"><a href="/kpukdw/koordinator/index.php"><button class="dropbtn"><i class="fa fa-code">Koordinator</i></button></a></div></li>';
}
			echo'<li><div class="dropdown"><a href="/kpukdw/dosen/index.php"><button class="dropbtn"><i class="fa fa-code">Home</i></button></a></div></li>
				';
				?>
			</ul>
		</div>

	</body>
</html>