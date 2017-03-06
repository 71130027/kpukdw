<?php
	include('header.php');
	session_start();
?>
<html>
	<body>
		<div id="content">
			<div id="headcontainer">
				<link rel="stylesheet" type="text/css" href="registrasi/index.css">
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
										<th>Status Registrasi</th>
										<th>Status KP</th>
									</thead>
									<tbody>';
							
							$sql = "SELECT id_lamaran, kpc1, kpc2, tipe, status_pengajuan, status_registrasi, status_kp FROM lamaran, perusahaan
							WHERE perusahaan.id_perusahaan=lamaran.id_perusahaan AND google_id='".$_SESSION['id']."' ORDER BY tanggal_input ASC";
							$q = $conn->query($sql);
							$i=0;
							while($row = $q->fetch_assoc())
							{
								echo '<tr>
										<td>'.($i+1).'</td>';
								
								$sql = "SELECT nama_perusahaan, job_desc FROM lamaran, perusahaan
								WHERE id_lamaran='".$row['id_lamaran']."' AND perusahaan.id_perusahaan=lamaran.id_perusahaan";
								$query = $conn->query($sql);
								$kpcperusahaan = $query->fetch_assoc();
								$perusahaan='<abbr title="'.$kpcperusahaan['job_desc'].'"><u>'.$kpcperusahaan['nama_perusahaan'].'</abbr>';
								if($row['kpc1']!=-1)
								{
									$sql = "SELECT nama_perusahaan, kpc1_jd FROM lamaran, perusahaan
									WHERE id_lamaran='".$row['id_lamaran']."' AND perusahaan.id_perusahaan=lamaran.kpc1";
									$query = $conn->query($sql);
									$kpcperusahaan = $query->fetch_assoc();
									$perusahaan=$perusahaan.'<br><abbr title="'.$kpcperusahaan['kpc1_jd'].'">'.$kpcperusahaan['nama_perusahaan'].'</abbr>';
									if($row['kpc2']!=-1)
									{
										$sql = "SELECT nama_perusahaan, kpc2_jd FROM lamaran, perusahaan
										WHERE id_lamaran='".$row['id_lamaran']."' AND perusahaan.id_perusahaan=lamaran.kpc2";
										$query = $conn->query($sql);
										$kpcperusahaan = $query->fetch_assoc();
										$perusahaan=$perusahaan.'<br><abbr title="'.$kpcperusahaan['kpc2_jd'].'">'.$kpcperusahaan['nama_perusahaan'].'</abbr>';
									}
								}
								echo '</u><td>'.$perusahaan.'</td>
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
								$type=$row['tipe'];
								$i++;
							}
							
							echo 	'</tbody>
								</table>';
						}
						if($type!="C")
						{
							echo '<div class="surat">
								<div>
									<pre>Download Surat Pengantar:	<a href="download.php" target="_blank"><button class="buttons">Download</button></a></pre>
								</div>
							</div>
							<p class="surat-desc">Apabila sudah melakukan proses penerimaan KP di perusahaan dan telah mendapat Surat keterangan diterima,</p>
							<p class="surat-desc">Surat tersebut dapat diupload pada form di bawah ini.</p>
							<div class="surat">
								<div>
									<pre>Upload Surat Keterangan (Hasil seleksi perusahaan):</pre>
									<pre><form action="upload.php" method="post" enctype="multipart/form-data"><input name="file_sk" type="file" required><input name="submit" class="buttons" type="submit" value="Upload"></pre>
								</div>
							</div>';
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>