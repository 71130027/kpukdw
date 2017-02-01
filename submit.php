<?php
	session_start();
	require_once("koneksi.php");

	//kirim ke database
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if($_GET['type']=="kpreguler")
		{
			$nama = $_POST['nama'];
			$nim = $_POST['nim'];
			$sks = $_POST['sks'];
			if($_POST['kpa']!="other")
			{
				//KP A
				$id_perusahaan = $_POST['kpa'];
				$type = "A";
			}
			else
			{
				//KP B
				//tambah id_perusahaan
				$q="INSERT INTO perusahaan(nama_perusahaan, cp_perusahaan, telpon_perusahaan, alamat_perusahaan, status, aktif)
				VALUES('".$_POST['kpb_nama']."','".$_POST['kpb_cp']."','".$_POST['kpb_telp']."','".$_POST['kpb_alamat']."','B')";
				//$perusahaan = $_POST['kpb'];
				$type = "B";
			}
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
			
			$sql = "INSERT INTO lamaran(id_lamaran,google_id,nim,nama,sks,id_perusahaan,job_desc,tipe) VALUES('$id_lamaran','$g_id','$nim','$nama','$sks','$id_perusahaan','$jobdesc','$type')";
			$conn->query($sql);
		}
		else if($_GET['type']=="kpfakultas")
		{
			
		}
	}
	
	header("location: index.php");
?>