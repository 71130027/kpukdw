<html>
<body>

<?php

$lulus="LULUS";
$query=mysql_connect("localhost","root","");
mysql_select_db("kpukdw",$query);
if(isset($_GET['id']))
{
$id=$_GET['id'];

$query3=mysql_query("update lamaran set status_kp='$lulus' where id_lamaran='$id'");
header('location:kp.php');

}
?>
</body>
</html>