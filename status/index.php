<?php
	include('header.php');
	session_start();
?>
<html>
	<body>
		<div id="content">
			<div id="headcontainer">
				<link rel="stylesheet" type="text/css" href="status/index.css">
				<div id="cpanel">
					<?php
						include('../koneksi.php');
						$sql = "SELECT COUNT(id_lamaran) AS num FROM lamaran WHERE google_id='".$_SESSION['id']."'";
						$res = $conn->query($sql);
						$res = $res->fetch_assoc();
						$res = $res['num'];
						if($res!=0)
						{
							echo '<table>
									<thead>
										<th>No</th>
										<th>Perusahaan</th>
										<th>Tipe KP</th>
										<th>Status Pengajuan</th>
									</thead>
									<tbody>';
							
							$sql = "SELECT nama_perusahaan, tipe, status_pengajuan, status_registrasi FROM lamaran, perusahaan WHERE perusahaan.id_perusahaan=lamaran.id_perusahaan";
							$q = $conn->query($sql);
							$i=0;
							while($row = $q->fetch_array())
							{
								echo '<tr>
										<td>'.($i+1).'</td>
										<td>'.$row['nama_perusahaan'].'</td>
										<td>'.$row['tipe'].'</td>';
								switch ($row['status_pengajuan'])
								{
									case "ACCEPT": echo	'<td>DITERIMA</td></tr>'; break;
									case "DECLINE": echo	'<td>DITOLAK</td></tr>'; break;
									case "PENDING": echo	'<td>MENUNGGU KEPUTUSAN</td></tr>'; break;
								}
								$i++;
							}
							
							echo 	'</tbody>
								</table>';
						}
						if($res==0||$_SESSION['last_accdec']=="DECLINE")
						{
							echo '<a onclick="goLoad(\'kpreguler\')" href="#"><div class="cphome">KP Reguler</div></a>
							<a onclick="goLoad(\'kpfakultas\')" href="#"><div class="cphome">KP Fakultas</div></a>';
						}
						else if($_SESSION['last_accdec']=="ACCEPT")
						{
							echo '<div id="surat-keterangan">
									<div>
										<pre>Download Surat Pengantar:	<a href="download.php" target="_blank"><button>Download</button></a></pre>
									</div>
								</div>';
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>