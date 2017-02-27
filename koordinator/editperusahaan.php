<html>
<body>

<?php

$aktifasi="Aktif";
$nonaktif="Tidak";
$query=mysql_connect("localhost","root","");
mysql_select_db("kpukdw",$query);
if(isset($_GET['id']))
{
$id=$_GET['id'];

$query2=mysql_query("select aktif from perusahaan where id_perusahaan = '$id'");
$query4=mysql_fetch_array($query2);
if($query4['aktif']=="Aktif")
{
$query3=mysql_query("update perusahaan set aktif='$nonaktif' where id_perusahaan='$id'");
header('location:perusahaan.php');
}
if($query4['aktif']=="Tidak")
{
$query3=mysql_query("update perusahaan set aktif='$aktifasi' where id_perusahaan='$id'");
header('location:perusahaan.php');
}
}
?>
</body>
</html>