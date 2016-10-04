<?php
	include('../header.php');
?>
<html>
	<body>
		<div id="content">
			<div id="headcontainer">
				<link rel="stylesheet" type="text/css" href="kpreguler/index.css">
				<div id="cpanel">
					<div class="cphome">
						<form action="submit.php">
							<p id="ctitle">KP Reguler</p>
							<pre>Nama:				</pre>
							<input name="nama" type="text" readonly value="<?php echo 'Danny Joe Dozan'; ?>">
							<br>
							<pre>NIM:				</pre>
							<input name="nim" type="text" readonly value="<?php echo '71130027'; ?>">
							<br>
							<pre>Jumlah SKS:			</pre>
							<input name="sks" type="text" readonly value="<?php echo '128'; ?>">
							<br>
							<pre>Nama Perusahaan:	</pre>
							<select name="nama_perusahaan_kpa" required>
								<option value="a">A</option>
								<option value="b">B</option>
								<option value="c">C</option>
								<option value="other">Lainnya...</option>
							</select>
							<br>
							<pre>					</pre>
							<input name="nama_perusahaan_kpb" type="text">
							<br>
							<pre>Job Description:		</pre>
							<input name="jobdesc" type="text" required>
							<br>
							<input name="submit" id="csubmit" type="submit">
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>