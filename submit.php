<?php
	session_start();
	require_once("koneksi.php");

	//kirim ke database
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if($_GET['type']=="kpreguler")
		{
            if(isset($_POST["submit"])) {
				// Upload file
				$sql="SELECT COUNT(id_lamaran) AS num FROM lamaran WHERE google_id='".$_SESSION['id']."'";
				$submission = $conn->query($sql);
				$submission = $submission->fetch_assoc();
				$submission = $submission['num'] + 1;
				
				// Create Path
				$target_dir_transkrip_nilai = "uploads/transkrip_nilai/";
				$target_dir_rencana_matkul = "uploads/rencana_mata_kuliah/";
				$imageFileType_tn = strtolower(pathinfo(basename($_FILES["transkrip_nilai"]["name"]),PATHINFO_EXTENSION));
				$imageFileType_rmk = strtolower(pathinfo(basename($_FILES["rencana_matkul"]["name"]),PATHINFO_EXTENSION));
				// path/to/tn_file_1.jpg
				$target_file_transkrip_nilai = $target_dir_transkrip_nilai."tn_".$_POST['nim']."_".$submission.".".$imageFileType_tn;
				$target_file_rencana_matkul = $target_dir_rencana_matkul."rmk_".$_POST['nim']."_".$submission.".".$imageFileType_rmk;
				$uploadOk = 1;
				
				// Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["transkrip_nilai"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
                $check = getimagesize($_FILES["rencana_matkul"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
            
				// Check file size
				if ($_FILES["transkrip_nilai"]["size"] > 1024000 || $_FILES["rencana_matkul"]["size"] > 1024000) {
					$uploadOk = 0;
				}

				// Allow certain file formats
				if($imageFileType_tn != "jpg" && $imageFileType_tn != "png" && $imageFileType_tn != "jpeg" ||
					$imageFileType_rmk != "jpg" && $imageFileType_rmk != "png" && $imageFileType_rmk != "jpeg") {
					$uploadOk = 0;
				}

				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 1)
				{
					//insert data
					$nama = $_POST['nama'];
					$nim = $_POST['nim'];
					$telp = $_POST['telp'];
					$sks = $_POST['sks'];
					if($_POST['kpa']!="other")
					{
						//KP A
						$id_perusahaan = $_POST['kpa'];
						$sql = "SELECT status FROM perusahaan WHERE id_perusahaan='".$id_perusahaan."'";
						$type = $conn->query($sql);
						$type = $type->fetch_assoc();
						$type = $type['status'];
					}
					else
					{
						//KP B
						//tambah id_perusahaan
						$sql = "INSERT INTO perusahaan(nama_perusahaan, cp_perusahaan, telpon_perusahaan, alamat_perusahaan, status, aktif, list)
						VALUES('".$_POST['kpb_nama']."','".$_POST['kpb_cp']."','".$_POST['kpb_telp']."','".$_POST['kpb_alamat']."','B','T','PENDING')";
						$conn->query($sql);
						$sql = "SELECT id_perusahaan FROM perusahaan ORDER BY id_perusahaan DESC";
						$id_perusahaan = $conn->query($sql);
						$id_perusahaan = $id_perusahaan->fetch_assoc();
						$id_perusahaan = $id_perusahaan['id_perusahaan'];
						$type = "B";
					}
					$startdate = $_POST['startmonth'].$_POST['startyear'];
					$enddate = $_POST['endmonth'].$_POST['endyear'];
					
					$jobdesc = $_POST['jobdesc'];
					$stat_pengajuan = "PENDING";

					$month = intval(date("n"));
					$year = date("y");

					if($month>=1&&$month<=6) //Genap
					{
						$month = 2;
						$year = ($year-1).($year);
					}
					else //Gasal
					{
						$month = 1;
						$year = ($year).($year+1);
					}

					$id_lamaran = $type.$year.$month;

					$sql = "SELECT COUNT(id_lamaran) AS num FROM lamaran WHERE id_lamaran LIKE '".$id_lamaran."%'";
					$res = $conn->query($sql);
					$res = $res->fetch_assoc();
					$res = $res['num'];

					$id_lamaran = $id_lamaran.str_pad(($res+1), 4, "0", STR_PAD_LEFT);
					$g_id = $_SESSION['id'];

					$sql = "INSERT INTO lamaran(id_lamaran,google_id,nim,nama,no_kontak,sks,id_perusahaan,startdate,enddate,job_desc,tipe) VALUES('$id_lamaran','$g_id','$nim','$nama','$telp','$sks','$id_perusahaan','$startdate','$enddate','$jobdesc','$type')";
					$conn->query($sql);
					move_uploaded_file($_FILES["transkrip_nilai"]["tmp_name"], $target_file_transkrip_nilai);
					move_uploaded_file($_FILES["rencana_matkul"]["tmp_name"], $target_file_rencana_matkul);
				}
            }
		}
		else if($_GET['type']=="kpfakultas")
		{
			if(isset($_POST["submit"])) {
				// Upload file
				$sql="SELECT COUNT(id_lamaran) AS num FROM lamaran WHERE google_id='".$_SESSION['id']."'";
				$submission = $conn->query($sql);
				$submission = $submission->fetch_assoc();
				$submission = $submission['num'] + 1;
				
				// Create Path
				$target_dir_transkrip_nilai = "uploads/transkrip_nilai/";
				$target_dir_rencana_matkul = "uploads/rencana_mata_kuliah/";
				$imageFileType_tn = strtolower(pathinfo(basename($_FILES["transkrip_nilai"]["name"]),PATHINFO_EXTENSION));
				$imageFileType_rmk = strtolower(pathinfo(basename($_FILES["rencana_matkul"]["name"]),PATHINFO_EXTENSION));
				// path/to/tn_file_1.jpg
				$target_file_transkrip_nilai = $target_dir_transkrip_nilai."tn_".$_POST['nim']."_".$submission.".".$imageFileType_tn;
				$target_file_rencana_matkul = $target_dir_rencana_matkul."rmk_".$_POST['nim']."_".$submission.".".$imageFileType_rmk;
				$uploadOk = 1;
				
				// Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["transkrip_nilai"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
                $check = getimagesize($_FILES["rencana_matkul"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
            
				// Check file size
				if ($_FILES["transkrip_nilai"]["size"] > 1024000 || $_FILES["rencana_matkul"]["size"] > 1024000) {
					$uploadOk = 0;
				}

				// Allow certain file formats
				if($imageFileType_tn != "jpg" && $imageFileType_tn != "png" && $imageFileType_tn != "jpeg" ||
					$imageFileType_rmk != "jpg" && $imageFileType_rmk != "png" && $imageFileType_rmk != "jpeg") {
					$uploadOk = 0;
				}
				
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 1)
				{
					//insert data
					$nama = $_POST['nama'];
					$nim = $_POST['nim'];
					$telp = $_POST['telp'];
					$sks = $_POST['sks'];
					if($_POST['kpa']!="other")
					{
						//KP A
						$id_perusahaan = $_POST['kpa'];
						$sql = "SELECT status FROM perusahaan WHERE id_perusahaan='".$id_perusahaan."'";
						$type = $conn->query($sql);
						$type = $type->fetch_assoc();
						$type = $type['status'];
					}
					else
					{
						//KP B
						//tambah id_perusahaan
						$sql = "INSERT INTO perusahaan(nama_perusahaan, cp_perusahaan, telpon_perusahaan, alamat_perusahaan, status, aktif, list)
						VALUES('".$_POST['kpb_nama']."','".$_POST['kpb_cp']."','".$_POST['kpb_telp']."','".$_POST['kpb_alamat']."','B','T','PENDING')";
						$conn->query($sql);
						$sql = "SELECT id_perusahaan FROM perusahaan ORDER BY id_perusahaan DESC";
						$id_perusahaan = $conn->query($sql);
						$id_perusahaan = $id_perusahaan->fetch_assoc();
						$id_perusahaan = $id_perusahaan['id_perusahaan'];
						$type = "B";
					}
					$startdate = $_POST['startmonth'].$_POST['startyear'];
					$enddate = $_POST['endmonth'].$_POST['endyear'];
					
					$jobdesc = $_POST['jobdesc'];
					$stat_pengajuan = "PENDING";

					$month = intval(date("n"));
					$year = date("y");

					if($month>=1&&$month<=6) //Genap
					{
						$month = 2;
						$year = ($year-1).($year);
					}
					else //Gasal
					{
						$month = 1;
						$year = ($year).($year+1);
					}

					$id_lamaran = $type.$year.$month;

					$sql = "SELECT COUNT(id_lamaran) AS num FROM lamaran WHERE id_lamaran LIKE '".$id_lamaran."%'";
					$res = $conn->query($sql);
					$res = $res->fetch_assoc();
					$res = $res['num'];

					$id_lamaran = $id_lamaran.str_pad(($res+1), 4, "0", STR_PAD_LEFT);
					$g_id = $_SESSION['id'];

					$sql = "INSERT INTO lamaran(id_lamaran,google_id,nim,nama,no_kontak,sks,id_perusahaan,startdate,enddate,job_desc,tipe) VALUES('$id_lamaran','$g_id','$nim','$nama','$telp','$sks','$id_perusahaan','$startdate','$enddate','$jobdesc','$type')";
					$conn->query($sql);
					move_uploaded_file($_FILES["transkrip_nilai"]["tmp_name"], $target_file_transkrip_nilai);
					move_uploaded_file($_FILES["rencana_matkul"]["tmp_name"], $target_file_rencana_matkul);
				}
			}
		}
	}
	
	header("location: index.php");
?>