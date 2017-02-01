<?php
	include('header.php');
?>
<html>
	<body>
		<div id="content">
			<div id="headcontainer">
				<link rel="stylesheet" type="text/css" href="kpreguler/index.css">
				<div id="cpanel">
					<div class="cphome">
						<?php session_start(); ?>
						<form action="submit.php?type=kpreguler" method="post">
							<p id="ctitle">KP Reguler</p>
							<pre>Nama:				</pre>
							<input name="nama" type="text" readonly value="<?php echo $_SESSION['user']; ?>">
							<br>
							<pre>NIM:				</pre>
							<input name="nim" type="text">
							<br>
							<pre>Jumlah SKS:			</pre>
							<input name="sks" type="text">
							<br>
							<pre>No. Telepon Aktif:		</pre>
							<input name="telp" type="text">
							<br>
							<pre>Nama Perusahaan:	</pre>
							<select id="kpa" name="kpa" required onchange="kpab();">
								<?php
								include('../koneksi.php');
								//Ambil data dari database
								$sql = "SELECT id_perusahaan, nama_perusahaan FROM perusahaan WHERE status='A'";
								$q = $conn->query($sql);
								while($res=$q->fetch_assoc())
								{
									echo '<option value="'.$res['id_perusahaan'].'">'.$res['nama_perusahaan'].'</option>';
								}
								?>
								<option value="other">Lainnya...</option>
							</select>
							<br>
							<div id="kpb" hidden>
								<pre>					</pre>
								<input id="kpb_name" name="kpb_nama" type="text" required disabled>
								<br>
								<pre>Contact Person:		</pre>
								<input id="kpb_cp" name="kpb_cp" type="text" required disabled>
								<br>
								<pre>Telepon Perusahaan:	</pre>
								<input id="kpb_telp" name="kpb_telp" type="text" required disabled>
								<br>
								<pre>Alamat Perusahaan:	</pre>
								<input id="kpb_alamat" name="kpb_alamat" type="text" required disabled>
								<br>
							</div>
							<pre>Job Description:		</pre>
							<br>
							<textarea name="jobdesc" class="multirow" type="text" required></textarea>
							<br>
							<pre id="csubtitle">Lampiran (Scan):</pre>
							<br>
							<pre>Transkrip Nilai:		</pre>
							<input name="transkrip_nilai" type="file" required>
							<br>
							<pre>Rencana Mata Kuliah:	</pre>
							<input name="rencana_matkul" type="file" required>
							<br>
							<input name="submit" id="csubmit" type="submit">
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>