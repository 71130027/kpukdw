<?php
	include('header.php');
?>
<html>
	<body>
		<div id="content">
			<div id="headcontainer">
				<link rel="stylesheet" type="text/css" href="kpfakultas/index.css">
				<div id="cpanel">
					<div class="cphome">
						<?php session_start(); ?>
						<form action="submit.php?type=kpfakultas" method="post">
							<p id="ctitle">KP Fakultas</p>
							<pre>Nama:				</pre>
							<input name="nama" type="text" readonly value="<?php echo $_SESSION['user']; ?>">
							<br>
							<pre>NIM:				</pre>
							<input name="nim" type="text">
							<br>
<!--
							<pre>Prodi:				</pre>
							<input name="prodi" type="text">
							<br>
-->
							<pre>Jumlah SKS:			</pre>
							<input name="sks" type="text">
							<br>
							<pre>No. Telepon aktif:		</pre>
							<input name="telp" type="number" required>
							<br>
							<pre>Prioritas KP 1:			</pre>
							<select name="kpc_1"required>
								<option value="a">A</option>
								<option value="b">B</option>
								<option value="c">C</option>
							</select>
							<br>
							<pre>Prioritas KP 2:		</pre>
							<select id="kpc_2" name="kpc_2" onchange="kpc();">
								<option value="none">Tidak ada</option>
								<option value="a">A</option>
								<option value="b">B</option>
								<option value="c">C</option>
							</select>
							<br>
							<pre>Prioritas KP 3:		</pre>
							<select id="kpc_3" name="kpc_3" disabled>
								<option value="none">Tidak ada</option>
								<option value="a">A</option>
								<option value="b">B</option>
								<option value="c">C</option>
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