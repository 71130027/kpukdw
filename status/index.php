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
						$last_pengajuan = "NONE";
						$last_registration = "NONE";
						$last_kp = "NONE";
						$sql = "SELECT COUNT(id_lamaran) AS num FROM lamaran WHERE google_id='".$_SESSION['id']."'";
						$num = $conn->query($sql);
						$num = $num->fetch_assoc();
						$num = $num['num'];
					
//						$sql = "SELECT id_lamaran, status_registrasi, status_kp FROM lamaran WHERE google_id='".$_SESSION['id']."' ORDER BY id_lamaran DESC";
//						$res = $conn->query($sql);
//						$res = $res->fetch_assoc();
						if($num!=0)
						{
							echo '<table>
									<thead>
										<th>No</th>
										<th>Perusahaan</th>
										<th>Tipe KP</th>
										<th>Status Pengajuan</th>
										<th>Status Registrasi</th>
										<th>Status KP</th>
									</thead>
								<tbody>';
							
							$sql = "SELECT nama_perusahaan, tipe, status_pengajuan, status_registrasi, status_kp FROM lamaran, perusahaan WHERE perusahaan.id_perusahaan=lamaran.id_perusahaan";
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
									case "ACCEPT":     echo	'<td>DITERIMA</td>'; break;
									case "DECLINE":    echo	'<td>DITOLAK</td>'; break;
									case "PENDING":    echo	'<td>MENUNGGU KEPUTUSAN</td>'; break;
								}
                                if(strcmp($row['status_registrasi'], "NONE")!=0)
                                {
									if(strcmp($row['status_registrasi'], "ACCEPT")==0)
									{
										echo	    '<td>DITERIMA</td>';
	                                    if(strcmp($row['status_kp'], "LULUS")==0)      echo '<td>LULUS</td>';
										else if(strcmp($row['status_kp'], "GUGUR")==0) echo '<td>GUGUR</td>';
										else if(strcmp($row['status_kp'], "NONE")==0)  echo '<td>SEDANG BERLANGSUNG</td>';
										echo		'</tr>';
									}
									else if(strcmp($row['status_registrasi'], "DECLINE")==0)
										echo	'<td>DITOLAK</td><td>-</td></tr>';
									else if(strcmp($row['status_registrasi'], "PENDING")==0)
										echo	'<td>MENUNGGU KEPUTUSAN</td><td>-</td></tr>';
                                }
								else
								{
									echo '<td>-</td><td>-</td></tr>';
								}
								
								$last_pengajuan = $row['status_pengajuan'];
								$last_registration = $row['status_registrasi'];
								$last_kp = $row['status_kp'];
								$i++;
							}
							
							echo 	'</tbody>
								</table>';
						}
						if($num==0||strcmp($last_pengajuan, "DECLINE")==0||strcmp($last_registration, "DECLINE")==0||strcmp($last_kp, "GUGUR")==0)
						{
							echo '<a onclick="goLoad(\'kpreguler\')" href="#"><div class="cphome">KP Reguler</div></a>
							<a onclick="goLoad(\'kpfakultas\')" href="#"><div class="cphome">KP Fakultas</div></a>';
						}
						else if($_SESSION['last_statPengajuan']=="ACCEPT" && strcmp($last_registration, "NONE")==0)
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