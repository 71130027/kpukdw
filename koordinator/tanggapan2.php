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

$query1=mysql_query("select * from lamaran, perusahaan where id_lamaran='$id' and perusahaan.id_perusahaan = lamaran.id_perusahaan");
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
    <pre>Nama Perusahaan :             </pre>
    <input style="width:300px;" type="text" name="nim" value="<?php echo $query2['nama_perusahaan']; ?>" disabled>
    <br><br>
    <pre>Contact Person Perusahaan :   </pre>
    <input style="width:300px;" type="text" name="nim" value="<?php echo $query2['cp_perusahaan']; ?>" disabled>
    <br><br>
    <pre>Alamat Perusahaan :           </pre>
    <input style="width:300px;" type="text" name="nim" value="<?php echo $query2['alamat_perusahaan']; ?>" disabled>
    <br><br>
    <pre>Telpon Perusahaan :           </pre>
    <input style="width:300px;" type="text" name="nim" value="<?php echo $query2['telpon_perusahaan']; ?>" disabled>
    <br><br>
    <pre>Tipe :                        </pre>
    <input style="width:300px;" type="text" name="nim" value="<?php echo $query2['tipe']; ?>" disabled>
    <br><br>
    <pre>SKS :                         </pre>
    <input style="width:300px;" type="text" name="nim" value="<?php echo $query2['sks']; ?>" disabled>
    <br><br>
    <pre>Job Description :             </pre>
    <textarea rows="4" cols="40" disabled><?php echo ($query2['job_desc']); ?></textarea>
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

    <pre>Surat Keterangan :            </pre>
    <input style="width:300px;" type="text" name="surat_keterangan" value="<?php echo $query2['surat_keterangan']; ?>" disabled>
    <br><br>
    <pre>Status Registrasi :           </pre>
    <input style="width:300px;" type="text" name="nim" value="<?php echo $query2['status_registrasi']; ?>" disabled>
    <br><br>
    <?php
    echo "<form  action='terimalamaran2.php?id=".$query2['id_lamaran']."' method='post' enctype='multipart/form-data'>";
    ?>
    <pre>Dosen Pembimbing :            </pre>
    <?php
    $sql = "SELECT * FROM dosen";
    $result = mysql_query($sql);

    echo "<select style='width:300px;' name='dosen'>";
    while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['dosen_pembimbing'] ."'>" . $row['nama'] ."</option>";
    }
    echo "</select>";
    ?>    <br><br>
    <input type='submit' value='Accept' name='submit'>
    <input type='submit' value='Decline' name='submit'>
    </form>
    </div>
  </div>
  </div>

<?php
}
?>
</body>
<div id="footer">
  <div class="containerb" style="height: 60px">
    <div>
    <p class="text-muted" style="margin-bottom: 0;">&copy 2016 Teknik Informatika UKDW
    
    </p>
    </div>
        
      </div>
</div>