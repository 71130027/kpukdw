<html>
<body>

<?php




$query=mysql_connect("localhost","root","");
mysql_select_db("kpukdw",$query);
$radio= $_POST['prioritas'];
if ($_POST['submit'] == 'Decline') {
	$decline="DECLINE";
    //action for delete
    if(isset($_GET['id']))
{
$id=$_GET['id'];

$query3=mysql_query("update lamaran set status_pengajuan='$decline' where id_lamaran='$id'");
header('location:index.php');

}
}
else if ($_POST['submit'] == 'Accept'){
	$accept="ACCEPT";
	$white="Whitelist";
	
    //action for update here
    if(isset($_GET['id']))
{
$id=$_GET['id'];


$query2=mysql_query("select tipe,id_perusahaan from lamaran where id_lamaran = '$id'");
$query4=mysql_fetch_array($query2);
$idper = $query4['id_perusahaan'];
if($query4['tipe']=="B"){
$query3=mysql_query("update lamaran set status_pengajuan='$accept' where id_lamaran='$id'");
$query5=mysql_query("update perusahaan set list='$white' where id_perusahaan='$idper'");
header('location:index.php');
}
if($query4['tipe']=='C'){
	if($radio == '2'){
		$query6=mysql_query("select kpc1, kpc1_jd from lamaran where id_lamaran = '$id'");
		$query7=mysql_fetch_array($query6);
		$kpc1 = $query7['kpc1'];
		$kpc1_jd = $query7['kpc1_jd'];

		$query8=mysql_query("update lamaran set id_perusahaan = '$kpc1', job_desc = '$kpc1_jd' where id_lamaran ='$id'");
		$query9=mysql_query("update lamaran set kpc1 = NULL, kpc1_jd = NULL, kpc2 = NULL, kpc2_jd = NULL where id_lamaran = '$id'");
		$query10=mysql_query("update lamaran set status_pengajuan='$accept', status_registrasi='PENDING' where id_lamaran='$id'");
		header('location:index.php');
	}
	if($radio == '3'){
		$query6=mysql_query("select kpc2, kpc2_jd from lamaran where id_lamaran = '$id'");
		$query7=mysql_fetch_array($query6);
		$kpc1 = $query7['kpc2'];
		$kpc1_jd = $query7['kpc2_jd'];

		$query8=mysql_query("update lamaran set id_perusahaan = '$kpc1', job_desc = '$kpc1_jd' where id_lamaran ='$id'");
		$query9=mysql_query("update lamaran set kpc1 = NULL, kpc1_jd = NULL, kpc2 = NULL, kpc2_jd = NULL where id_lamaran = '$id'");
		$query10=mysql_query("update lamaran set status_pengajuan='$accept', status_registrasi='PENDING' where id_lamaran='$id'");
		header('location:index.php');
	}
	else{
		$query9=mysql_query("update lamaran set kpc1 = NULL, kpc1_jd = NULL, kpc2 = NULL, kpc2_jd = NULL where id_lamaran = '$id'");
		$query10=mysql_query("update lamaran set status_pengajuan='$accept', status_registrasi='PENDING' where id_lamaran='$id'");
		header('location:index.php');
	}
}
else
{
$query3=mysql_query("update lamaran set status_pengajuan='$accept' where id_lamaran='$id'");
header('location:index.php');	
}
}
}


?>
</body>
</html>