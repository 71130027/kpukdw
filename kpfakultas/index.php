<?php
	include('../header.php');
?>
<html>
	<body>
		<div id="content">
			<div id="headcontainer">
				<link rel="stylesheet" type="text/css" href="kpfakultas/index.css">
				<div id="cpanel">
					<div class="cphome">
						<form action="submit.php">
							<p id="ctitle">KP Reguler</p>
							<pre>Nama:				</pre>
							<input name="nama" type="text" readonly value="<?php echo 'Danny Joe Dozan' ?>">
							<br>
							<pre>NIM:				</pre>
							<input name="nim" type="text" readonly value="<?php echo '71130027' ?>">
							<br>
							<pre>Prodi:				</pre>
							<input name="prodi" type="text" readonly value="<?php echo 'Teknik Informatika' ?>">
							<br>
							<pre>Jumlah SKS:			</pre>
							<input name="sks" type="text" readonly value="<?php echo '128' ?>">
							<br>
							<pre>No. Telpon aktif:		</pre>
							<input name="telp" type="number" required>
							<br>
							<pre>Proyek KP 1:			</pre>
							<select name="kpc_1"required>
								<option value="a">A</option>
								<option value="b">B</option>
								<option value="c">C</option>
								<option value="other">Lainnya...</option>
							</select>
							<br>
							<pre>Proyek KP 2:			</pre>
							<select name="kpc_2">
								<option value="none">Tidak ada</option>
								<option value="a">A</option>
								<option value="b">B</option>
								<option value="c">C</option>
								<option value="other">Lainnya...</option>
							</select>
							<br>
							<pre>Proyek KP 3:			</pre>
							<select name="kpc_3">
								<option value="none">Tidak ada</option>
								<option value="a">A</option>
								<option value="b">B</option>
								<option value="c">C</option>
								<option value="other">Lainnya...</option>
							</select>
							<br>
							<pre>Deskripsi Diri:</pre>
							<br>
							<textarea name="desc" class="multirow" type="text" required></textarea>
							<br>
							<pre>Keahlian dan Tools yang dikuasai:</pre>
							<br>
							<textarea name="tools" class="multirow" type="text" required></textarea>
							<br>
							<pre>Mini Project:</pre>
							<br>
							<textarea name="mini_project" class="multirow" type="text"></textarea>
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