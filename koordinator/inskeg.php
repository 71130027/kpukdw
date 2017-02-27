<?php
$connection = mysqli_connect('localhost', 'root', '','kpukdw'); //The Blank string is the password

$spendaftarank = $_POST['spendaftarankp']; 
$spendaftarankp = strtotime($spendaftarank);
$spendaftarankp = date('Y-m-d', $spendaftarankp);
$ependaftarank = $_POST['ependaftarankp']; 
$ependaftarankp = strtotime($ependaftarank);
$ependaftarankp = date('Y-m-d', $ependaftarankp);
$sregistrasik = $_POST['sregistrasikp']; 
$sregistrasikp = strtotime($sregistrasik);
$sregistrasikp = date('Y-m-d', $sregistrasikp);
$eregistrasik = $_POST['eregistrasikp']; 
$eregistrasikp = strtotime($eregistrasik);
$eregistrasikp = date('Y-m-d', $eregistrasikp);
$sprosesk = $_POST['sproseskp']; 
$sproseskp = strtotime($sprosesk);
$sproseskp = date('Y-m-d', $sproseskp);
$eprosesk = $_POST['eproseskp']; 
$eproseskp = strtotime($eprosesk);
$eproseskp = date('Y-m-d', $eproseskp);
$smonitoringk = $_POST['smonitoringkp']; 
$smonitoringkp = strtotime($smonitoringk);
$smonitoringkp = date('Y-m-d', $smonitoringkp);
$emonitoringk = $_POST['emonitoringkp']; 
$emonitoringkp = strtotime($emonitoringk);
$emonitoringkp = date('Y-m-d', $emonitoringkp);
$sdafujiank = $_POST['sdafujiankp']; 
$sdafujiankp = strtotime($sdafujiank);
$sdafujiankp = date('Y-m-d', $sdafujiankp);
$edafujiank = $_POST['edafujiankp']; 
$edafujiankp = strtotime($edafujiank);
$edafujiankp = date('Y-m-d', $edafujiankp);
$sujiank = $_POST['sujiankp']; 
$sujiankp = strtotime($sujiank);
$sujiankp = date('Y-m-d', $sujiankp);
$eujiank = $_POST['eujiankp']; 
$eujiankp = strtotime($eujiank);
$eujiankp = date('Y-m-d', $eujiankp);
$semester = $_POST['semester'];
$year1 = $_POST['year1'];





// attempt insert query execution
$sql = "INSERT INTO jadwal (semester, tahun, spendaftarankp,ependaftarankp, sregistrasikp,eregistrasikp, sproseskp,eproseskp,smonitoringkp,emonitoringkp,sdafujiankp,edafujiankp,sujiankp,eujiankp) VALUES ('$semester','$year1','$spendaftarankp','$ependaftarankp','$sregistrasikp','$eregistrasikp','$sproseskp','$eproseskp','$smonitoringkp','$emonitoringkp','$sdafujiankp','$edafujiankp','$sujiankp','$eujiankp')";
if(mysqli_query($connection, $sql)){
    $message = "sudah di masukin";
	echo "<script type='text/javascript'>alert('$message');</script>";
} else{
    $message = "ERROR";
	echo "<script type='text/javascript'>alert('$message');</script>";
}
 
// close connection
mysqli_close();
header('Location: kegiatan.php'); 


?>