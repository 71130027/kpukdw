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
$id_perusahaan=$_POST['id_perusahaan'];
$job_desc=$_POST['job_desc'];
$divisi=$_POST['divisi'];
$query3=mysql_query("update joblist set id_perusahaan='$id_perusahaan', divisi='$divisi' , job_desc='$job_desc' where id_job='$id'");
if($query3)
{
header('location:joblist.php');
}
}
$query1=mysql_query("select joblist.id_job, joblist.id_perusahaan, joblist.divisi , joblist.job_desc, perusahaan.nama_perusahaan from joblist,perusahaan where id_job='$id' and joblist.id_perusahaan = perusahaan.id_perusahaan");
$query2=mysql_fetch_array($query1);
$ini = $query2['id_perusahaan'];
?>
<div class="continer">
    <div class="divider" id="section1"></div>
    <div class="row">   
<form id="download" action="" method="post" enctype="multipart/form-data">
    <pre>Nama Perusahaan :             </pre>   
    <?php
    $sql = "SELECT id_perusahaan, nama_perusahaan FROM perusahaan  where aktif = 'Aktif' and list = 'Whitelist' and id_perusahaan != $ini";
    $result = mysql_query($sql);

    echo "<select style='width:300px;' name='id_perusahaan'>";
    echo "<option value='" . $query2['id_perusahaan'] ."' selected>" . $query2['nama_perusahaan'] ."</option>";
    while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['id_perusahaan'] ."'>" . $row['nama_perusahaan'] ."</option>";
    }
    echo "</select>";
    ?>
    <br><br>
    <pre>Divisi :                      </pre>   
    <input style="width:300px;" type="text" name="divisi" value="<?php echo $query2['divisi']; ?>" required>
    <br><br>
    <pre>Job Description :             </pre>   
    <textarea rows="4" cols="40" name="job_desc"><?php echo ($query2['job_desc']); ?></textarea>
    <br><br>
    <input type='submit' value='update' name='submit'>
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
</html>