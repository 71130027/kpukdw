<?php
$connection = mysqli_connect('localhost', 'root', '','kpukdw'); //The Blank string is the password
$id_perusahaan = $_POST['id_perusahaan'];
$job_desc = $_POST['job_desc'];
$divisi = $_POST['divisi'];
// attempt insert query execution
$sql = "INSERT INTO joblist (id_perusahaan, divisi , job_desc) VALUES ('$id_perusahaan', '$divisi' , '$job_desc')";
if(mysqli_query($connection, $sql)){
    $message = "sudah di masukin";
	echo "<script type='text/javascript'>alert('$message');</script>";
} else{
    $message = "ERROR";
	echo "<script type='text/javascript'>alert('$message');</script>";
}
 
// close connection
mysqli_close();
header('Location: joblist.php'); 


?>