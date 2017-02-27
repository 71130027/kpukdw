<html>
<body>
<?php
$query=mysql_connect("localhost","root","");
mysql_select_db("kpukdw",$query);
if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1=mysql_query("delete from jadwal where id_jadwal = '$id'");
if($query1)
{
header('location:kegiatan.php');
}
}
?>
</body>
</html>