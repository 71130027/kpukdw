<?php
	session_start();
	require_once("koneksi.php");

	//kirim ke database
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
        $sql="SELECT id_lamaran, nim FROM lamaran WHERE google_id='".$_SESSION['id']."' ORDER BY id_lamaran DESC";
        $res = $conn->query($sql);
        $res = $res->fetch_assoc();
        
        // Upload file
        $sql="SELECT COUNT(id_lamaran) AS num FROM lamaran WHERE google_id='".$_SESSION['id']."'";
        $submission = $conn->query($sql);
        $submission = $submission->fetch_assoc();
        $submission = $submission['num'];

        // Create Path
        $target_dir = "uploads/surat_keterangan/";
        $imageFileType = strtolower(pathinfo(basename($_FILES["file_sk"]["name"]),PATHINFO_EXTENSION));
        // path/to/sk_file_1.jpg
        $target_file = $target_dir."sk_".$res['nim']."_".$submission.".".$imageFileType;
        $uploadOk = 1;

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["file_sk"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }

        // Check file size
        if ($_FILES["file_sk"]["size"] > 1024000) {
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 1)
        {
            move_uploaded_file($_FILES["file_sk"]["tmp_name"], $target_file);
            $sql="UPDATE lamaran SET status_registrasi = 'PENDING' WHERE id_lamaran = '".$res['id_lamaran']."'";
			$conn->query($sql);
        }
	}
	
	header("location: index.php");
?>