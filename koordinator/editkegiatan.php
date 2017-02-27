<?php
  include('header.php');
?>
<body>
<?php
$query=mysql_connect("localhost","root","");
mysql_select_db("kpukdw",$query);
if(isset($_GET['id']))
{
$id=$_GET['id'];
if(isset($_POST['submit']))
{
$spendaftarank = $_POST['spendaftarankp']; 
$spendaftarankp = strtotime($spendaftarank);
$spendaftarankps = date('Y-m-d', $spendaftarankp);
$ependaftarank = $_POST['ependaftarankp']; 
$ependaftarankp = strtotime($ependaftarank);
$ependaftarankps = date('Y-m-d', $ependaftarankp);
$sregistrasik = $_POST['sregistrasikp']; 
$sregistrasikp = strtotime($sregistrasik);
$sregistrasikps = date('Y-m-d', $sregistrasikp);
$eregistrasik = $_POST['eregistrasikp']; 
$eregistrasikp = strtotime($eregistrasik);
$eregistrasikps = date('Y-m-d', $eregistrasikp);
$sprosesk = $_POST['sproseskp']; 
$sproseskp = strtotime($sprosesk);
$sproseskps = date('Y-m-d', $sproseskp);
$eprosesk = $_POST['eproseskp']; 
$eproseskp = strtotime($eprosesk);
$eproseskps = date('Y-m-d', $eproseskp);
$smonitoringk = $_POST['smonitoringkp']; 
$smonitoringkp = strtotime($smonitoringk);
$smonitoringkps = date('Y-m-d', $smonitoringkp);
$emonitoringk = $_POST['emonitoringkp']; 
$emonitoringkp = strtotime($emonitoringk);
$emonitoringkps = date('Y-m-d', $emonitoringkp);
$sdafujiank = $_POST['sdafujiankp']; 
$sdafujiankp = strtotime($sdafujiank);
$sdafujiankps = date('Y-m-d', $sdafujiankp);
$edafujiank = $_POST['edafujiankp']; 
$edafujiankp = strtotime($edafujiank);
$edafujiankps = date('Y-m-d', $edafujiankp);
$sujiank = $_POST['sujiankp']; 
$sujiankp = strtotime($sujiank);
$sujiankps = date('Y-m-d', $sujiankp);
$eujiank = $_POST['eujiankp']; 
$eujiankp = strtotime($eujiank);
$eujiankps = date('Y-m-d', $eujiankp);
$semester = $_POST['semester'];
$year1 = $_POST['year1'];
$query3=mysql_query("update jadwal set semester='$semester', tahun='$year1', spendaftarankp='$spendaftarankps', ependaftarankp='$ependaftarankps',sregistrasikp='$sregistrasikps',eregistrasikp='$eregistrasikps', sproseskp='$sproseskps', eproseskp='$eproseskps', smonitoringkp='$smonitoringkps', emonitoringkp='$emonitoringkps', sdafujiankp='$sdafujiankps', edafujiankp='$edafujiankps',sujiankp='$sujiankps',eujiankp='$eujiankps' where id_jadwal='$id'");
if($query3)
{
header('location:kegiatan.php');
}
else
{
 header('location:kegiatan.php');   
}
}
$query1=mysql_query("select * from jadwal where id_jadwal='$id'");
$query2=mysql_fetch_array($query1);

?>
<div class="continer">
    <div class="divider" id="section1"></div>
    <div class="row"> 

<form id="download"action="" method="post" enctype="multipart/form-data">
   
    <?php
    echo '
    <pre>Semester :                    </pre>
    <select name="semester">
    <option value="Ganjil"'; if ($query2['semester'] == 'Ganjil') { echo '
    selected'; } echo '>Ganjil</option>
    <option value="Genap"'; if ($query2['semester'] == 'Genap') { echo '
    selected'; } echo ">Genap</option>
    
    <br><br>
    ";
    ?>
    
    </select>
    <br><br>
    <pre>Tahun Ajaran :                </pre>
    <select id="year1" name="year1">
    <?PHP
    $thn = date('Y');
    $i = 2000;
    while($i <= $thn)
    {
        $th_ajaran = $i + 1;
        $th_ajaran = $i . "/" . $th_ajaran;
        if($query2['tahun'] == $th_ajaran)
            { 
            echo '<option value="'.$th_ajaran .'" selected>'.$th_ajaran .'</option>';
            }
        else
            {
            echo '<option value="'.$th_ajaran .'">'.$th_ajaran .'</option>';
            }
        $i++;
    }
    ?>
    </select>
    <br><br>
    <pre>Mulai Pendaftaran KP :        </pre>
    <input type="date" name="spendaftarankp" value="<?php echo $query2['spendaftarankp']; ?>" required>
    <br><br>
    <pre>Akhir Pendaftaran KP :        </pre>
    <input type="date" name="ependaftarankp" value="<?php echo $query2['ependaftarankp'];?>" required>
    <br><br>
    <pre>Mulai Registrasi KP :         </pre>
    <input type="date" name="sregistrasikp" value="<?php echo $query2['sregistrasikp'];?>" required>
    <br><br>
    <pre>Akhir Registrasi KP:          </pre>
    <input type="date" name="eregistrasikp" value="<?php echo $query2['eregistrasikp'];?>" required>
    <br><br>
    <pre>Mulai Proses KP :             </pre>
    <input type="date" name="sproseskp" value="<?php echo $query2['sproseskp'];?>" required>
    <br><br>
    <pre>Akhir Proses KP :             </pre>
    <input type="date" name="eproseskp" value="<?php echo $query2['eproseskp'];?>" required>
    <br><br>
    <pre>Mulai Monitoring KP :         </pre>
    <input type="date" name="smonitoringkp" value="<?php echo $query2['smonitoringkp'];?>" required>
    <br><br>
    <pre>Akhir Monitoring KP :         </pre>
    <input type="date" name="emonitoringkp" value="<?php echo $query2['emonitoringkp'];?>" required>
    <br><br>
    <pre>Mulai Daftar Ujian KP :       </pre>
    <input type="date" name="sdafujiankp" value="<?php echo $query2['sdafujiankp'];?>" required>
    <br><br>
    <pre>Akhir Daftar Ujian KP :       </pre>
    <input type="date" name="edafujiankp" value="<?php echo $query2['edafujiankp'];?>" required>
    <br><br>
    <pre>Mulai Ujian KP :              </pre>
    <input type="date" name="sujiankp" value="<?php echo $query2['sujiankp'];?>" required>
    <br><br>
    <pre>Akhir Ujian KP :              </pre>
    <input type="date" name="eujiankp" value="<?php echo $query2['eujiankp'];?>" required>
    <br><br>
    <input type="submit" value="update" name="submit">
  </form>       
<?php
}
?>
</div><!--/container-->
</div>
<div id="footer">
  <div class="containerb" style="height: 60px">
    <div>
    <p class="text-muted" style="margin-bottom: 0;">&copy 2016 Teknik Informatika UKDW
    
    </p>
    </div>
        
      </div>
</div>
</body>