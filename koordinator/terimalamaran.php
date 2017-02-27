<html>
<body>

<?php

$accept="ACCEPT";
$white="Whitelist";
$query=mysql_connect("localhost","root","");
mysql_select_db("kpukdw",$query);
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
else
{
$query3=mysql_query("update lamaran set status_pengajuan='$accept' where id_lamaran='$id'");
header('location:index.php');	
}
}
?>
</body>
</html>