<?php
	include('header.php');
	$nama = 'Danny Joe Dozan';
	$nim = '71130027';
	$sks = '128';
?>
<html>
	<body>
		<div id="content">
			<div id="headcontainer">
				<script>
					console.log($('#kpa option:selected').val());
					if($('#kpa option:selected').val() == "other")
					{
						$('#kpb').attr("disabled", false);
					}
					else
						$('#kpb').attr("disabled", true);
				</script>
				<link rel="stylesheet" type="text/css" href="kpreguler/index.css">
				<div id="cpanel">
					<div class="cphome">
						<form action="submit.php" method="post">
							<p id="ctitle">KP Reguler</p>
							<pre>Nama:				</pre>
							<input name="nama" type="text" readonly value="<?php echo $nama; ?>">
							<br>
							<pre>NIM:				</pre>
							<input name="nim" type="text" readonly value="<?php echo $nim; ?>">
							<br>
							<pre>Jumlah SKS:			</pre>
							<input name="sks" type="text" readonly value="<?php echo $sks; ?>">
							<br>
							<pre>Nama Perusahaan:	</pre>
							<select id="kpa" name="nama_perusahaan_kpa" required onchange="kpab();">
								<?php
								//Ambil data dari database
								echo '<option value="a">A</option>
								<option value="b">B</option>
								<option value="c">C</option>';
								?>
								<option value="other">Lainnya...</option>
							</select>
							<br>
							<pre>					</pre>
							<input id="kpb" name="nama_perusahaan_kpb" type="text" disabled>
							<br>
							<pre>Job Description:		</pre>
							<br>
							<textarea name="jobdesc" class="multirow" type="text" required></textarea>
							<br>
							<input name="submit" id="csubmit" type="submit">
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>