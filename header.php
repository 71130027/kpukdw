<html>
	<head>
		<title>KaPeTI</title>
		<script src="http://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="header.css">
		<script>
			function goLoad(link)
			{
				$('#content').load(link + "/index.php #headcontainer");
			}
		</script>
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
					<div>Google</div>
				</div>
			</div>
			<ul id="menupanel">
				<a href=""><li><div id="p-home">Home</div></li></a>
				<?php
					echo '<a onclick="goLoad(\'pengajuan\')" href="#"><li><div id="p-pengajuan">Pengajuan KP</div></li></a>
					<a href="signout.php"><li><div id="signinout">Log Out</div></li></a>';
				?>
			</ul>
		</div>
	</body>
</html>