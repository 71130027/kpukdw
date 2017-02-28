<?php
session_start();
if($_SESSION['last_statPengajuan']!="ACCEPT") header("Location: index.php");
include('koneksi.php');
$id = $_SESSION['id'];
$sql = "SELECT id_lamaran, nim, nama, no_kontak, job_desc, nama_perusahaan, telpon_perusahaan, alamat_perusahaan, cp_perusahaan, startdate, enddate 
	FROM lamaran, perusahaan 
	WHERE google_id='".$id."' AND lamaran.id_perusahaan = perusahaan.id_perusahaan AND status_pengajuan='ACCEPT'
	ORDER BY tanggal_input DESC";
$res = $conn->query($sql);
$res = $res->fetch_assoc();

if(substr($res['nim'],0,2)=="71")
    $prog_studi = "Teknik Informatika";
else if(substr($res['nim'],0,2)=="72")
    $prog_studi = "Sistem Informasi";

$date="";

switch(substr($res['startdate'],0,2))
{
	case "01": $date = "Januari ".substr($res['startdate'],2,4); break;
	case "02": $date = "Februari ".substr($res['startdate'],2,4); break;
	case "03": $date = "Maret ".substr($res['startdate'],2,4); break;
	case "04": $date = "April ".substr($res['startdate'],2,4); break;
	case "05": $date = "Mei ".substr($res['startdate'],2,4); break;
	case "06": $date = "Juni ".substr($res['startdate'],2,4); break;
	case "07": $date = "Juli ".substr($res['startdate'],2,4); break;
	case "08": $date = "Agustus ".substr($res['startdate'],2,4); break;
	case "09": $date = "September ".substr($res['startdate'],2,4); break;
	case "10": $date = "Oktober ".substr($res['startdate'],2,4); break;
	case "11": $date = "November ".substr($res['startdate'],2,4); break;
	case "12": $date = "Desember ".substr($res['startdate'],2,4); break;
}
$date = $date." sampai dengan ";

switch(substr($res['enddate'],0,2))
{
	case "01": $date = $date."Januari ".substr($res['enddate'],2,4); break;
	case "02": $date = $date."Februari ".substr($res['enddate'],2,4); break;
	case "03": $date = $date."Maret ".substr($res['enddate'],2,4); break;
	case "04": $date = $date."April ".substr($res['enddate'],2,4); break;
	case "05": $date = $date."Mei ".substr($res['enddate'],2,4); break;
	case "06": $date = $date."Juni ".substr($res['enddate'],2,4); break;
	case "07": $date = $date."Juli ".substr($res['enddate'],2,4); break;
	case "08": $date = $date."Agustus ".substr($res['enddate'],2,4); break;
	case "09": $date = $date."September ".substr($res['enddate'],2,4); break;
	case "10": $date = $date."Oktober ".substr($res['enddate'],2,4); break;
	case "11": $date = $date."November ".substr($res['enddate'],2,4); break;
	case "12": $date = $date."Desember ".substr($res['enddate'],2,4); break;
}

require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Times','',14);
$pdf->Cell(0,10,'NO: TI/2016/0001',0,1,'R');
$pdf->SetFont('Times','B',14);
$pdf->Cell(0,10,'FORMULIR PENGAJUAN',0, 1, 'C');
$pdf->Cell(0,10,'SURAT KETERANGAN MAGANG/KERJA PRAKTIK',0, 1, 'C');
$pdf->Cell(0,10,'',0,1,'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,8,'Yang bertanda tangan di bawah ini:',0,1,'L');
$pdf->Cell(30,8,'Nama',0,0,'L'); $pdf->Cell(0,8,': '.$res['nama'],0,1,'L');
$pdf->Cell(30,8,'NIM',0,0,'L'); $pdf->Cell(0,8,': '.$res['nim'],0,1,'L');
$pdf->Cell(30,8,'No.Telepon/HP',0,0,'L'); $pdf->Cell(0,8,': '.$res['no_kontak'],0,1,'L');
$pdf->Cell(30,8,'Program Studi',0,0,'L'); $pdf->Cell(0,8,': '.$prog_studi,0,1,'L');
$pdf->Cell(0,8,'',0,1,'L');
$pdf->Cell(0,8,'Dengan ini mengajukan permohonan pembuatan Surat Keterangan Magang/Kerja Praktik di:',0,1,'L');
$pdf->Cell(75,8,'Nama Perusahaan/Instansi/Lembaga',0,0,'L'); $pdf->Cell(0,8,': '.$res['nama_perusahaan'],0,1,'L');
$pdf->Cell(75,8,'No. Telepon Perusahaan/Instansi/Lembaga',0,0,'L');$pdf->Cell(0,8,': '.$res['telpon_perusahaan'],0,1,'L');
$pdf->Cell(75,8,'Alamat Surat Tujuan',0,0,'L'); $pdf->Cell(0,8,': '.$res['alamat_perusahaan'],0,1,'L');
$pdf->Cell(75,8,'PIC/Penanggung Jawab',0,0,'L'); $pdf->Cell(0,8,': '.$res['cp_perusahaan'],0,1,'L');
$pdf->Cell(75,8,'Durasi Kerja Praktik',0,0,'L'); $pdf->Cell(0,8,': '.$date,0,1,'L');
$pdf->Cell(75,8,'Daftar Pekerjaan',0,0,'L'); $pdf->Cell(0,8,': ',0,1,'L');
$pdf->Cell(0,8,'        - '.$res['job_desc'],0,1,'L');
$pdf->Cell(0,8,'        - ',0,1,'L');
$pdf->Cell(0,8,'        - ',0,1,'L');
$pdf->Cell(0,8,'',0,1,'L');
$pdf->Cell(0,8,'',0,1,'L');
$pdf->Cell(0,8,'',0,1,'L');
$pdf->Cell(30,8,'Mengetahui,',0,0,'L'); $pdf->Cell(0,8,'Pemohon,                           ',0,1,'R');
$pdf->Cell(0,8,'Koordinator KP',0,1,'L');
$pdf->Cell(0,8,'',0,1,'L');
$pdf->Cell(0,8,'',0,1,'L');
$pdf->Cell(0,8,'...........................................',0,0,'L');
$pdf->Cell(0,8,'...........................................',0,1,'R');
$pdf->Output();
?>