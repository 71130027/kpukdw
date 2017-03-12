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
					<table>
						<thead>
							<th>No</th>
							<th>Nama</th>
							<th>Deskripsi</th>
						</thead>
						<?php
							include('../koneksi.php');
							$sql = "SELECT id_file, file, file_desc, link, lokasi FROM storage";
							$res = $conn->query($sql);

							while($row = $res->fetch_assoc())
							{
								if($row['link']!=null)
								{
									$link = $row['link'];
								}
								else $link = $row['lokasi'];
								echo '<tr>';
								echo '<td>'.$row['id_file'].'</td>';
								echo '<td><a href="'.$link.'" target="_blank" style="color: #000000;">'.$row['file'].'</a></td>';
								echo '<td>'.$row['file_desc'].'</td>';
								echo '</tr>';
							}
						?>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>