<html>
<body>

<?php
$accept="ACCEPT";
$decline="DECLINE";
$query=mysql_connect("localhost","root","");
mysql_select_db("kpukdw",$query);

if ($_POST['submit'] == 'Accept') {
    //action for update here
    if(isset($_GET['id']))
{
$id=$_GET['id'];

$query3=mysql_query("update lamaran set status_registrasi='$accept' where id_lamaran='$id'");

$dosen = $_POST['dosen'];

$query5=mysql_query("select nim from lamaran where id_lamaran = '$id'");
$data = mysql_fetch_array($query5);
$nim = $data['nim'];

$query4 = mysql_query("insert into mahasiswa (nim, dosen_pembimbing) values ('$nim', '$dosen')");

header('location:registrasi.php');

}
} else if ($_POST['submit'] == 'Decline') {
    //action for delete
    if(isset($_GET['id']))
{
$id=$_GET['id'];

$query3=mysql_query("update lamaran set status_registrasi='$decline' where id_lamaran='$id'");
header('location:registrasi.php');

}
}

?>
</body>
</html>