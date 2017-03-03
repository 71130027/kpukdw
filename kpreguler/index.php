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
						<form action="submit.php?type=kpreguler" method="post" enctype="multipart/form-data">
							<p id="ctitle">KP Reguler</p>
							<pre>Nama:				</pre>
							<input name="nama" type="text" readonly value="<?php echo $_SESSION['user']; ?>">
							<br>
							<pre>NIM:				</pre>
							<input name="nim" type="number">
							<br>
							<pre>Jumlah SKS:			</pre>
							<input name="sks" type="number">
							<br>
							<pre>No. Telepon Aktif:		</pre>
							<input name="telp" type="number">
							<br>
							<pre>Nama Perusahaan:	</pre>
							<select id="kpa" name="kpa" required onchange="kpab();">
								<?php
								include('../koneksi.php');
								//Ambil data dari database
								$sql = "SELECT id_perusahaan, nama_perusahaan FROM perusahaan WHERE (status='A' OR status='B') AND aktif='A' AND list='WHITELIST' ORDER BY nama_perusahaan ASC";
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
							<pre>Durasi Kerja Praktik:	</pre>
							<select name="startmonth" class="datemonth">
								<option value="01">Januari</option>
								<option value="02">Februari</option>
								<option value="03">Maret</option>
								<option value="04">April</option>
								<option value="05">Mei</option>
								<option value="06">Juni</option>
								<option value="07">Juli</option>
								<option value="08">Agustus</option>
								<option value="09">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
							<select name="startyear" class="dateyear">
								<?php
									$thisyear = date("Y");
									for($i=0;$i<=2;$i++)
									{
										echo '<option value="'.($thisyear+$i).'">'.($thisyear+$i).'</option>';
									}
								?>
							</select>
							<pre>s/d</pre>
							<select name="endmonth" class="datemonth">
								<option value="01">Januari</option>
								<option value="02">Februari</option>
								<option value="03">Maret</option>
								<option value="04">April</option>
								<option value="05">Mei</option>
								<option value="06">Juni</option>
								<option value="07">Juli</option>
								<option value="08">Agustus</option>
								<option value="09">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
							<select name="endyear" class="dateyear">
								<?php
									$thisyear = date("Y");
									for($i=0;$i<=2;$i++)
									{
										echo '<option value="'.($thisyear+$i).'">'.($thisyear+$i).'</option>';
									}
								?>
							</select>
							<br>
							<pre>Job Description:		</pre>
							<br>
							<textarea name="jobdesc" class="antimultirow" type="text" required></textarea>
							<br>
							<pre id="csubtitle">Lampiran (Scan):</pre>
							<br>
							<pre>Transkrip Nilai:		</pre>
							<input name="transkrip_nilai" type="file" required>
							<br>
							<pre>Rencana Mata Kuliah:	</pre>
							<input name="rencana_matkul" type="file" required>
							<br>
                            <input name="submit" id="csubmit" type="submit" value="Ajukan">
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>