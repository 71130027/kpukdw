<html>
<body>

<?php

$white="Whitelist";
$black="Blacklist";
$query=mysql_connect("localhost","root","");
mysql_select_db("kpukdw",$query);
if(isset($_GET['id']))
{
$id=$_GET['id'];

$query2=mysql_query("select list from perusahaan where id_perusahaan = '$id'");
$query4=mysql_fetch_array($query2);
if($query4['list']=="Blacklist")
{
$query3=mysql_query("update perusahaan set list='$white' where id_perusahaan='$id'");
header('location:perusahaan.php');
}
if($query4['list']=="Whitelist")
{
$query3=mysql_query("update perusahaan set list='$black' where id_perusahaan='$id'");
header('location:perusahaan.php');
}
}
?>
</body>
</html>