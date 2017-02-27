<html>
<body>
<?php
$query=mysql_connect("localhost","root","");
mysql_select_db("kpukdw",$query);
if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1=mysql_query("delete from storage where id_file = '$id'");
if($query1)
{
header('location:download.php');
}
}
?>
</body>
</html>