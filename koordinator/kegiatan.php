<?php
  include('header.php');
?>
<body>

<?php
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('kpukdw');
$tahun = $spendaftarankp = $ependaftarankp = $sregistrasikp = $eregistrasikp = $sproseskp = $eproseskp = $smonitoringkp = $emonitoringkp = $sdafujiankp = $edafujiankp = $sujiankp = $eujiankp = "";
  ?>

<div class="continer">
	<div class="divider" id="section1"></div>
	<div class="row">	
  <form id="download"action="inskeg.php" method="post" enctype="multipart/form-data">
    <pre>Semester :                    </pre>   
    <select  name="semester">
    <option value = "Ganjil">Ganjil</option>
    <option value = "Genap">Genap</option>
    </select>
    <br><br>
    <pre>Tahun Ajaran :                </pre>
    <select id="year1" name="year1">
    <?PHP
    $thn = date('Y')+2;
    $i = date('Y')-2;
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
    <input type="date" name="spendaftarankp" value="<?php echo $spendaftarankp;?>" required>
    <br><br>
    <pre>Akhir Pendaftaran KP :        </pre>
    <input type="date" name="ependaftarankp" value="<?php echo $ependaftarankp;?>" required>
    <br><br>
    <pre>Mulai Registrasi KP :         </pre>
    <input type="date" name="sregistrasikp" value="<?php echo $sregistrasikp;?>" required>
    <br><br>
    <pre>Akhir Registrasi KP:          </pre>
    <input type="date" name="eregistrasikp" value="<?php echo $eregistrasikp;?>" required>
    <br><br>
    <pre>Mulai Proses KP :             </pre>
    <input type="date" name="sproseskp" value="<?php echo $sproseskp;?>" required>
    <br><br>
    <pre>Akhir Proses KP :             </pre>
    <input type="date" name="eproseskp" value="<?php echo $eproseskp;?>" required>
    <br><br>
    <pre>Mulai Monitoring KP :         </pre>
    <input type="date" name="smonitoringkp" value="<?php echo $smonitoringkp;?>" required>
    <br><br>
    <pre>Akhir Monitoring KP :         </pre>
    <input type="date" name="emonitoringkp" value="<?php echo $emonitoringkp;?>" required>
    <br><br>
    <pre>Mulai Daftar Ujian KP :       </pre>
    <input type="date" name="sdafujiankp" value="<?php echo $sdafujiankp;?>" required>
    <br><br>
    <pre>Akhir Daftar Ujian KP :       </pre>
    <input type="date" name="edafujiankp" value="<?php echo $edafujiankp;?>" required>
    <br><br>
    <pre>Mulai Ujian KP :              </pre>
    <input type="date" name="sujiankp" value="<?php echo $sujiankp;?>" required>
    <br><br>
    <pre>Akhir Ujian KP :              </pre>
    <input type="date" name="eujiankp" value="<?php echo $eujiankp;?>" required>
    <br><br>
    <input type="submit" value="Submit" name="submit">
  </form>						
	</div><!--/row-->
  <div class = "row">
  <?php
$sql = mysql_query("SELECT * FROM jadwal");
  
  if(mysql_num_rows($sql)>0){

echo "<table class = 'styletable'>
  <tr>
    <th>Semester</th>
    <th>Tahun AJaran</th>
    <th>Mulai Pendaftaran KP</th>
    <th>Akhir Pendaftaran KP</th>
    <th>Mulai Registrasi KP</th>
    <th>Akhir Registrasi KP</th>
    <th>Mulai Proses KP</th>
    <th>Akhir Proses KP</th>
    <th>Mulai Monitoring KP</th>
    <th>Akhir Monitoring KP</th>
    <th>Mulai Daftar Ujian KP</th>
    <th>Akhir Daftar Ujian KP</th>
    <th>Mulai Ujian KP</th>
    <th>Akhir Ujian KP</th>
    <th colspan='2'>Action</th>
  </tr> ";
  
  $sql = mysql_query("SELECT * FROM jadwal order by id_jadwal");

  while($data = mysql_fetch_array($sql)){
  
  ?>
    <tr>
      <td><font face=tahoma size=2><?php echo $data['semester']; ?></font></td>
      <td><font face=tahoma size=2><?php echo $data['tahun']; ?></font></td>
      <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['spendaftarankp'])); ?></font></td>
      <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['ependaftarankp'])); ?></font></td>
      <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['sregistrasikp'])); ?></font></td>
      <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['eregistrasikp'])); ?></font></td>
      <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['sproseskp'])); ?></font></td>
      <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['eproseskp'])); ?></font></td>
      <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['smonitoringkp'])); ?></font></td>
      <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['emonitoringkp'])); ?></font></td>
      <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['sdafujiankp'])); ?></font></td>
      <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['edafujiankp'])); ?></font></td>
      <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['sujiankp'])); ?></font></td>
      <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['eujiankp'])); ?></font></td>
      <?php 
      
      echo "<td><a href='editkegiatan.php?id=".$data['id_jadwal']."'><button>Edit</button></a></td></font></td>";
      echo "<td><a href='deletekegiatan.php?id=".$data['id_jadwal']."'><button>Delete</button></a></td></font></td>";
      
      


      ?>
    </tr>

  <?php
        
  }
  echo "</table>";
}
?>
  </div>
</div><!--/container-->
<div id="footer">
  <div class="containerb" style="height: 60px">
    <div>
    <p class="text-muted" style="margin-bottom: 0;">&copy 2016 Teknik Informatika UKDW
    
    </p>
    </div>
        
      </div>
</div>