<html>
<body>

<?php

$accept="ACCEPT";
$decline="DECLINE";
$query=mysql_connect("localhost","root","");
mysql_select_db("kpukdw",$query);
if(isset($_GET['id']))
{
$id=$_GET['id'];

$query3=mysql_query("update lamaran set status_registrasi='$decline' where id_lamaran='$id'");
header('location:registrasi.php');

}
?>
</body>
</html>