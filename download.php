<?php
session_start();
if($_SESSION['last_statPengajuan']!="ACCEPT") header("Location: index.php");
include('koneksi.php');
$id = $_SESSION['id'];
$sql = "SELECT id_lamaran, nim, nama, sks, no_kontak, job_desc, nama_perusahaan, telpon_perusahaan, alamat_perusahaan, cp_perusahaan, startdate, enddate 
	FROM lamaran, perusahaan 
	WHERE google_id='".$id."' AND lamaran.id_perusahaan = perusahaan.id_perusahaan AND status_pengajuan='ACCEPT'
	ORDER BY tanggal_input DESC";
$res = $conn->query($sql);
$res = $res->fetch_assoc();

if(substr($res['nim'],0,2)=="71")
    $prog_studi = "TEKNIK INFORMATIKA";
else if(substr($res['nim'],0,2)=="72")
    $prog_studi = "SISTEM INFORMASI";

$date="";

$i=0;
$spos=0;
$job_desc[0]=$res['job_desc'];

while($lpos=strpos($res['job_desc'],"\n",$spos))
{
	$job_desc[$i]=substr($res['job_desc'],$spos,($lpos-$spos)+1);
	$spos=$lpos+1;
	$i++;
}
if($spos>0) $job_desc[count($job_desc)]=substr($res['job_desc'],$spos);

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

$periode = substr($res['id_lamaran'],1,5);

$sql="SELECT id_lamaran FROM lamaran WHERE status_pengajuan='ACCEPT' AND (id_lamaran LIKE 'A".$periode."%' OR id_lamaran LIKE 'B".$periode."%') ORDER BY tanggal_input ASC";
$res2 = $conn->query($sql);

$pos = 0;
$no_lamaran = 1;
while($row = $res2->fetch_assoc())
{
	if($res['id_lamaran']==$row['id_lamaran']) break;
	$no_lamaran++;
}

require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();

//$pdf->SetFont('Times','',14);
$pdf->Image('logo.jpg',15,12,25);
//$pdf->Cell(0,10,'NO: TI/2016/0001',0,0,'R');
$pdf->SetFont('Times','B',11);
$pdf->Cell(35,6,'',0,0,'L'); $pdf->Cell(0,6,'UNIVERSITAS KRISTEN DUTA WACANA',0, 1, 'L');
$pdf->Cell(0,1,'',0,1,'L');
$pdf->Cell(35,4,'',0,0,'L'); $pdf->Cell(0,4,'FAKULTAS TEKNOLOGI INFORMASI',0, 1, 'L'); $pdf->SetFont('Times','B',18); $pdf->Cell(0,2,'KPTI',0,1,'R'); $pdf->SetFont('Times','B',11);
$pdf->Cell(35,4,'',0,0,'L'); $pdf->Cell(0,4,'PROGRAM STUDI '.$prog_studi,0, 1, 'L'); $pdf->SetFont('Times','B',18); $pdf->Cell(0,2,'01',0,1,'R'); $pdf->SetFont('Times','B',11);
$pdf->Cell(35,6,'',0,1,'L');
$pdf->SetFont('Times','B',14);
$pdf->Cell(35,6,'',0,0,'L'); $pdf->Cell(0,6,'LEMBAR PENGAJUAN SURAT KETERANGAN',0, 0, 'L'); $pdf->SetFont('Times','B',18); $pdf->Cell(0,6,str_pad($no_lamaran,4,"0",STR_PAD_LEFT),0,1,'R'); $pdf->SetFont('Times','B',14);
$pdf->Cell(35,6,'',0,0,'L'); $pdf->Cell(0,6,'MAGANG/KERJA PRAKTIK',0, 1, 'L');
$pdf->Cell(0,10,'',0,1,'L');

$pdf->SetFont('Times','',11);
$pdf->Cell(0,8,'Yang bertanda tangan di bawah ini:',0,1,'L');
$pdf->SetFont('Times','B',11);
$pdf->Cell(15,7,'',0,0,'L'); $pdf->Cell(40,7,'Nama',0,0,'L'); $pdf->SetFont('Times','',11); $pdf->Cell(0,7,': '.$res['nama'],0,1,'L');
$pdf->SetFont('Times','B',11);
$pdf->Cell(15,7,'',0,0,'L'); $pdf->Cell(40,7,'NIM',0,0,'L'); $pdf->SetFont('Times','',11); $pdf->Cell(0,7,': '.$res['nim'],0,1,'L');
$pdf->SetFont('Times','B',11);
$pdf->Cell(15,7,'',0,0,'L'); $pdf->Cell(40,7,'No.Telepon/HP',0,0,'L'); $pdf->SetFont('Times','',11); $pdf->Cell(0,7,': '.$res['no_kontak'],0,1,'L');
$pdf->SetFont('Times','B',11);
$pdf->Cell(15,7,'',0,0,'L'); $pdf->Cell(40,7,'Program Studi',0,0,'L'); $pdf->SetFont('Times','',11); $pdf->Cell(0,7,': '.$prog_studi,0,1,'L');
$pdf->SetFont('Times','B',11);
$pdf->Cell(15,7,'',0,0,'L'); $pdf->Cell(40,7,'Jumlah SKS',0,0,'L'); $pdf->SetFont('Times','',11); $pdf->Cell(0,7,': '.$res['sks'],0,1,'L');
$pdf->SetFont('Times','BI',11);
$pdf->Cell(15,3,'',0,0,'L'); $pdf->Cell(30,3,'(lulus tanpa D dan E)',0,1,'L');
$pdf->Cell(0,3,'',0,1,'L');
$pdf->SetFont('Times','',11);
$pdf->Cell(0,7,'Dengan ini mengajukan permohonan pembuatan Surat Keterangan Magang/Kerja Praktik di:',0,1,'L');
$pdf->SetFont('Times','B',11);
$pdf->Cell(15,7,'',0,0,'L'); $pdf->Cell(75,7,'Nama Perusahaan/Instansi/Lembaga',0,0,'L'); $pdf->SetFont('Times','',11); $pdf->Cell(0,8,': '.$res['nama_perusahaan'],0,1,'L');
$pdf->SetFont('Times','B',11);
$pdf->Cell(15,7,'',0,0,'L'); $pdf->Cell(75,7,'Alamat Surat Tujuan',0,0,'L'); $pdf->SetFont('Times','',11); $pdf->Cell(0,8,': '.$res['alamat_perusahaan'],0,1,'L');
$pdf->SetFont('Times','B',11);
$pdf->Cell(15,7,'',0,0,'L'); $pdf->Cell(75,7,'No. Telepon Perusahaan/Instansi/Lembaga',0,0,'L'); $pdf->SetFont('Times','',11); $pdf->Cell(0,8,': '.$res['telpon_perusahaan'],0,1,'L');
$pdf->SetFont('Times','B',11);
$pdf->Cell(15,7,'',0,0,'L'); $pdf->Cell(75,7,'Nama PIC/Penanggung Jawab',0,0,'L'); $pdf->SetFont('Times','',11); $pdf->Cell(0,8,': '.$res['cp_perusahaan'],0,1,'L');
$pdf->SetFont('Times','B',11);
$pdf->Cell(15,7,'',0,0,'L'); $pdf->Cell(75,7,'Durasi Kerja Praktik',0,0,'L'); $pdf->SetFont('Times','',11); $pdf->Cell(0,8,': '.$date,0,1,'L');
$pdf->SetFont('Times','B',11);
$pdf->Cell(15,7,'',0,0,'L'); $pdf->Cell(75,7,'Daftar Pekerjaan',0,0,'L'); $pdf->SetFont('Times','',11); $pdf->Cell(0,8,': ',0,1,'L');

$pdf->SetFont('Times','B',11);
for($i=0;$i<count($job_desc);$i++)
{
	$pdf->Cell(25,7,'',0,0,'L'); $pdf->Cell(0,8,'- '.$job_desc[$i],0,1,'L');
}

$pdf->Cell(0,12,'',0,1,'L');

$date = date('j')." ";
switch(date('m'))
{
	case "01": $date = $date."Januari "; break;
	case "02": $date = $date."Februari "; break;
	case "03": $date = $date."Maret "; break;
	case "04": $date = $date."April "; break;
	case "05": $date = $date."Mei "; break;
	case "06": $date = $date."Juni "; break;
	case "07": $date = $date."Juli "; break;
	case "08": $date = $date."Agustus "; break;
	case "09": $date = $date."September "; break;
	case "10": $date = $date."Oktober "; break;
	case "11": $date = $date."November "; break;
	case "12": $date = $date."Desember "; break;
}
$date = $date.date('Y');

$pdf->Cell(130,8,'',0,0,'L'); $pdf->Cell(0,8,'Yogyakarta, '.$date,0,1,'L');
$pdf->Cell(130,8,'Mengetahui,',0,0,'L'); $pdf->Cell(0,8,'Pemohon,                           ',0,1,'L');
$pdf->Cell(0,8,'Koordinator KP',0,1,'L');
$pdf->Cell(0,12,'',0,1,'L');
$pdf->Cell(130,8,'...........................................',0,0,'L'); $pdf->Cell(-20,8,$res['nama'],0,1,'L');
$pdf->Output();
?>