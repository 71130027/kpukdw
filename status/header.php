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
				<a href="../kpukdw"><li><div id="p-home">Home</div></li></a>
				<?php
					echo '<a href="pengajuan"><li><div id="p-pengajuan">Pengajuan</div></li></a>
					<a><li><div id="signinout">Log Out</div></li></a>';
				?>
			</ul>
		</div>
	</body>
</html>