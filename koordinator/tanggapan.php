<?php
  include('header.php');
?>
<body>
<div class="continer">
<div class = 'row'>
<?php
$query=mysql_connect("localhost","root","");
mysql_select_db("kpukdw",$query);
if(isset($_GET['id']))
{
$id=$_GET['id'];

$query1=mysql_query("select * from lamaran, perusahaan where id_lamaran='$id' and (perusahaan.id_perusahaan = lamaran.id_perusahaan or perusahaan.id_perusahaan = lamaran.kpc1 or perusahaan.id_perusahaan = lamaran.kpc2)");
$query2=mysql_fetch_array($query1);
  $tipe = $query2['tipe'];
?>

 <div id="download">

    <pre>NIM :                         </pre>
    <input style="width:300px;" type="text" name="nim" value="<?php echo $query2['nim']; ?>" disabled>
    <br><br>
    <pre>Nama :                        </pre>
    <input style="width:300px;" type="text" name="nim" value="<?php echo $query2['nama']; ?>" disabled>
    <br><br>
    
        <?php
        echo "<form  action='terimalamaran.php?id=".$query2['id_lamaran']."' method='post' enctype='multipart/form-data'>";
            if($tipe=='C'){
                $query3=mysql_query("SELECT id_perusahaan, kpc1, kpc2, job_desc, kpc1_jd, kpc2_jd from lamaran where id_lamaran = '".$query2['id_lamaran']."'");
                $query4=mysql_fetch_assoc($query3);
            
                for($angka=1;$angka<=3;$angka++){
                    if($angka==1){
                        $id_perusahaan=$query4['id_perusahaan'];
                    }
                    else if($angka==2){
                        if($query4['kpc1']!=NULL) $id_perusahaan=$query4['kpc1'];
                        else break;
                    }
                    else if($angka==3){
                        if($query4['kpc2']!=NULL) $id_perusahaan=$query4['kpc2'];
                        else break;
                    }
                    $query5=mysql_query("SELECT nama_perusahaan, cp_perusahaan, alamat_perusahaan, telpon_perusahaan from perusahaan where id_perusahaan='$id_perusahaan'");
                    $query6=mysql_fetch_assoc($query5);

                    switch($angka)
                    {
                        case 1: $job_desc=$query4['job_desc']; break;
                        case 2: $job_desc=$query4['kpc1_jd']; break;
                        case 3: $job_desc=$query4['kpc2_jd']; break;
                    }
                    echo'<div style="background-color:white; margin-top:10px;margin-bottom:10px; display:inline-block"><input type="radio" name="prioritas" value="'.$angka.'"><br>';
                    ?>
                    <input type="radio" value="none" name="prioritas" hidden default>
                    <pre>Nama Perusahaan :             </pre>
                    <input style="width:300px;" type="text" name="nim" value="<?php echo $query6['nama_perusahaan']; ?>" disabled>
                    <br><br>
                    <pre>Contact Person Perusahaan :   </pre>
                    <input style="width:300px;" type="text" name="nim" value="<?php echo $query6['cp_perusahaan']; ?>" disabled>
                    <br><br>
                    <pre>Alamat Perusahaan :           </pre>
                    <input style="width:300px;" type="text" name="nim" value="<?php echo $query6['alamat_perusahaan']; ?>" disabled>
                    <br><br>
                    <pre>Telpon Perusahaan :           </pre>
                    <input style="width:300px;" type="text" name="nim" value="<?php echo $query6['telpon_perusahaan']; ?>" disabled>
                    <br><br>
                    <pre>Job Description :           </pre>
                    <textarea rows="4" cols="40" disabled><?php echo $job_desc; ?></textarea>
                    </div>
                    <br><br>

                    <?php
                }

            }

        ?>

    <?php
    }
    ?>
    <pre>Tipe :                        </pre>
    <input style="width:300px;" type="text" name="nim" value="<?php echo $query2['tipe']; ?>" disabled>
    <br><br>
    <pre>SKS :                         </pre>
    <input style="width:300px;" type="text" name="nim" value="<?php echo $query2['sks']; ?>" disabled>
    <br><br>
    <?php

        if($tipe=="C"){
            ?>
            <pre>Deskripsi Diri :              </pre>
            <textarea rows="4" cols="40" disabled><?php echo ($query2['desc_diri']); ?></textarea>
            <br><br>
            <pre>Keahlian :                    </pre>
            <textarea rows="4" cols="40" disabled><?php echo ($query2['keahlian']); ?></textarea>
            <br><br>
            <pre>Mini Project :                </pre>
            <textarea rows="4" cols="40" disabled><?php echo ($query2['mini_project']); ?></textarea>
            <br><br>
        <?php
    }

    ?>
    <pre>Status Pengajuan :            </pre>
    <input style="width:300px;"type="text" name="nim" value="<?php echo $query2['status_pengajuan']; ?>" disabled>
    <br><br>
    <input type='submit' value='Accept' name='submit'>
    <input type='submit' value='Decline' name='submit'>
    </form>
    
    </div>
  </div>
  </div>


</body>
<div id="footer">
  <div class="containerb" style="height: 60px">
    <div>
    <p class="text-muted" style="margin-bottom: 0;">&copy 2016 Teknik Informatika UKDW
    
    </p>
    </div>
        
      </div>
</div>