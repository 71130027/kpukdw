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
							<pre>Jumlah SKS:			</pre>
							<input name="sks" type="text">
							<br>
							<pre>No. Telepon aktif:		</pre>
							<input name="telp" type="number" required>
							<br>
							<pre>Prioritas KP 1:		</pre>
							<select name="kpc_1"required>
								<?php
									include('../koneksi.php');
									$sql = "SELECT id_perusahaan, nama_perusahaan FROM perusahaan WHERE status='C' ORDER BY nama_perusahaan DESC";
									$res = $conn->query($sql);
									while($row=$res->fetch_assoc())
										echo '<option value="'.$row['id_perusahaan'].'">'.$row['nama_perusahaan'].'</option>';
								?>
							</select>
							<br>
							<pre>Prioritas KP 2:		</pre>
							<select id="kpc_2" name="kpc_2" onchange="kpc();">
								<option value="none">Tidak ada</option>
								<?php
									$sql = "SELECT id_perusahaan, nama_perusahaan FROM perusahaan WHERE status='C' ORDER BY nama_perusahaan DESC";
									$res = $conn->query($sql);
									while($row=$res->fetch_assoc())
										echo '<option value="'.$row['id_perusahaan'].'">'.$row['nama_perusahaan'].'</option>';
								?>
							</select>
							<br>
							<pre>Prioritas KP 3:		</pre>
							<select id="kpc_3" name="kpc_3" disabled>
								<option value="none">Tidak ada</option>
								<?php
									$sql = "SELECT id_perusahaan, nama_perusahaan FROM perusahaan WHERE status='C' ORDER BY nama_perusahaan DESC";
									$res = $conn->query($sql);
									while($row=$res->fetch_assoc())
										echo '<option value="'.$row['id_perusahaan'].'">'.$row['nama_perusahaan'].'</option>';
								?>
							</select>
							<br>
							<pre>Durasi Kerja Praktik:	</pre>
							<select name="startmonth" class="datemonth">
								<?php
									$month = intval(date('n'));
									if($month<2)
										$month = "0106";
									else if($month<8)
										$month = "0712";
									else
										$month = "0106";
									
									switch(substr($month,0,2))
									{
										case "01": $monthcaption = "Januari"; break;
										case "02": $monthcaption = "Februari"; break;
										case "03": $monthcaption = "Maret"; break;
										case "04": $monthcaption = "April"; break;
										case "05": $monthcaption = "Mei"; break;
										case "06": $monthcaption = "Juni"; break;
										case "07": $monthcaption = "Juli"; break;
										case "08": $monthcaption = "Agustus"; break;
										case "09": $monthcaption = "September"; break;
										case "10": $monthcaption = "Oktober"; break;
										case "11": $monthcaption = "November"; break;
										case "12": $monthcaption = "Desember"; break;
									}
										
									echo '<option value="'.substr($month,0,2).'">'.$monthcaption.'</option>';
								?>
							</select>
							<select name="startyear" class="dateyear">
								<?php
									$year = intval(date("Y"));
									if(intval(date('n'))>8)
										$year++;
									echo '<option value="'.$year.'">'.$year.'</option>';
								?>
							</select>
							<pre>s/d</pre>
							<select name="endmonth" class="datemonth">
								<?php
									switch(substr($month,2,2))
									{
										case "01": $monthcaption = "Januari"; break;
										case "02": $monthcaption = "Februari"; break;
										case "03": $monthcaption = "Maret"; break;
										case "04": $monthcaption = "April"; break;
										case "05": $monthcaption = "Mei"; break;
										case "06": $monthcaption = "Juni"; break;
										case "07": $monthcaption = "Juli"; break;
										case "08": $monthcaption = "Agustus"; break;
										case "09": $monthcaption = "September"; break;
										case "10": $monthcaption = "Oktober"; break;
										case "11": $monthcaption = "November"; break;
										case "12": $monthcaption = "Desember"; break;
									}
										
									echo '<option value="'.substr($month,2,2).'">'.$monthcaption.'</option>';
								?>
							</select>
							<select name="endyear" class="dateyear">
								<?php
									echo '<option value="'.$year.'">'.$year.'</option>';
								?>
							</select>
							<br>
							<br>
							<pre>Deskripsi Diri:</pre>
							<br>
							<textarea name="desc" class="antimultirow" required></textarea>
							<br>
							<pre>Keahlian dan Tools yang dikuasai:</pre>
							<br>
							<textarea name="tools" class="antimultirow" required></textarea>
							<br>
							<pre>Mini Project:</pre>
							<br>
							<textarea name="mini_project" class="antimultirow"></textarea>
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
						<script>
							$("textarea").keypress(function(event) {
								if (event.which == 13) {
									alert("Hi");
									event.preventDefault();
								}
							});
						</script>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>