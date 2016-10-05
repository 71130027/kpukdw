<?php
	include('koneksi.php');
	session_start();
?>
<html>
	<head>
		<title>KaPeTI</title>
		<script>
			function renderButton() {
				gapi.signin2.render('google', {
					'scope': 'email',
					'width': 180,
					'height': 32,
					'longtitle': true,
					'theme': 'light',
					'onsuccess': onSignIn
				});
			}
			
			function goLoad(link)
			{
				$('#content').load(link + "/index.php #headcontainer");
			}
			
			function onSignIn(googleUser) {
				var profile = googleUser.getBasicProfile();

				$.ajax({
					url: 'gSignIn.php',
					type: 'POST',               
					// Form data
					data: function(){
						var email = profile.getEmail();
						if(email.indexOf("@ti.ukdw.ac.id")!==-1)
						{
							var data = new FormData();
							data.append('user', profile.getName());
							data.append('email', profile.getEmail());
							data.append('token', googleUser.getAuthResponse().id_token);
							return data;
						}
					}(),
					success: function (data) {
						location.reload(true);
					},
					error: function (data) {
					},
					complete: function () {
					},
					cache: false,
					contentType: false,
					processData: false
				});
			}
		</script>
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
						echo '<a onclick="goLoad(\'pengajuan\')" href="#"><li><div id="p-pengajuan">Pengajuan KP</div></li></a>
						<a href="signout.php"><li><div id="signinout">Log Out</div></li></a>';
					}
				?>
			</ul>
		</div>
	</body>
</html>