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
				
				<?php
					echo '
					<li><div class="dropdown"><button class="dropbtn"><i class="fa fa-code">Logout</i></button></div></li>
			<li><div class="dropdown"><a href="/kpukdw/koordinator/download.php"><button class="dropbtn"><i class="fa fa-code">Download</i></button></a></div></li>
			<li><div class="dropdown">
					<button class="dropbtn"><i class="fa fa-code">Admin</i></button>
					<div class="dropdown-content">
					    <a href="/kpukdw/koordinator/admin.php">Edit</a>
					    <a href="/kpukdw/koordinator/kegiatan.php">Kegiatan</a>
					    <a href="/kpukdw/koordinator/joblist.php">Job List</a>
					</div>
				</div>
				</li>
<li><div class="dropdown"><a href="/kpukdw/koordinator/index.php"><button class="dropbtn"><i class="fa fa-code">Home</i></button></a></div></li>
				';
				?>
			</ul>
		</div>

	</body>
</html>