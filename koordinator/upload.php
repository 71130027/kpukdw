<?php
$connection = mysqli_connect('localhost', 'root', '','kpukdw'); 
// This is the directory where images will be saved


// This gets all the other information from the form


$allowed_ext	= array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip');
$file_name		= $_FILES['file']['name'];
$file_ext		= strtolower(end(explode('.', $file_name)));
$file_size		= $_FILES['file']['size'];
$file_tmp		= $_FILES['file']['tmp_name'];

$nama			= $_POST['filename'];
$desc			= $_POST['filedesc'];
$radio 			= $_POST['uploadmethod'];

$link = $_POST['fileurl'];

if($radio == "uploadfile"){


				if(in_array($file_ext, $allowed_ext) === true){
					if($file_size < 4044070){
						$lokasi = 'uploads/'.$nama.'.'.$file_ext;
						move_uploaded_file($file_tmp, $lokasi);
						$sql = "INSERT INTO storage (file, file_desc, lokasi) VALUES ('$nama', '$desc', '$lokasi')";
						if(mysqli_query($connection, $sql)){
						    $message = "sudah di masukin";
							echo "<script type='text/javascript'>alert('$message');</script>";
						} else{
						    $message = "ERROR";
							echo "<script type='text/javascript'>alert('$message');</script>";
						}
						
					}else{
						echo '<div class="error">ERROR: Besar ukuran file (file size) maksimal 1 Mb!</div>';
					}
				}else{
					echo '<div class="error">ERROR: Ekstensi file tidak di izinkan!</div>';
				}
			mysqli_close();
header('Location: download.php'); 
}
else{
	$sql = "INSERT INTO storage (file, file_desc, lokasi) VALUES ('$nama', '$desc', '$link')";
if(mysqli_query($connection, $sql)){
    $message = "sudah di masukin";
	echo "<script type='text/javascript'>alert('$message');</script>";
} else{
    $message = "ERROR";
	echo "<script type='text/javascript'>alert('$message');</script>";
}
 
// close connection
mysqli_close();
header('Location: download.php'); 

}

?>