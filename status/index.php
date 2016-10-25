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
						if($_SESSION['record']!=0)
						{
							echo '<table>
									<thead>
										<th>No</th>
										<th>Perusahaan</th>
										<th>Tipe KP</th>
										<th>Status</th>
									</thead>
									<tbody>';
							
							for($i=0;$i<$_SESSION['record'];$i++)
							{
								echo '<tr>
										<td>1</td>
										<td>2</td>
										<td>3</td>
										<td>4</td>
									</tr>';
							}
							
							echo 	'</tbody>
								</table>';
						}
						if($_SESSION['record']==0||$_SESSION['last_accdec']=="decline")
						{
							echo '<a onclick="goLoad(\'kpreguler\')" href="#"><div class="cphome">KP Reguler</div></a>
							<a onclick="goLoad(\'kpfakultas\')" href="#"><div class="cphome">KP Fakultas</div></a>';
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>