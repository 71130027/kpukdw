<?php
include('header.php');
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('kpukdw');
    $searchlamaran = $_POST['searchlamaran']; 
    // gets value sent over search form
     $no=1;
    $min_length = 3;
    echo '<div class="continer"><div class="row">';  
    // you can set minimum length of the searchlamaran if you want
     
    if(strlen($searchlamaran) >= $min_length){ // if searchlamaran length is more or equal minimum length then
         
        $searchlamaran = htmlspecialchars($searchlamaran); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $searchlamaran = mysql_real_escape_string($searchlamaran);
        // makes sure nobody uses SQL injection
         
         $raw_results = mysql_query("SELECT * FROM lamaran,perusahaan WHERE perusahaan.id_perusahaan = lamaran.id_perusahaan AND (perusahaan.nama_perusahaan LIKE '%".$searchlamaran."%' OR perusahaan.cp_perusahaan LIKE '%".$searchlamaran."%' OR perusahaan.telpon_perusahaan LIKE '%".$searchlamaran."%' OR lamaran.nim LIKE '%".$searchlamaran."%' OR lamaran.nama LIKE '%".$searchlamaran."%')") or die(mysql_error());
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$searchlamaran%' is what we're looking for, % means anything, for example if $searchlamaran is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$searchlamaran'
        // or if you want to match just full word so "gogohello" is out use '% $searchlamaran %' ...OR ... '$searchlamaran %' ... OR ... '% $searchlamaran'
         
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             echo "<table class = 'styletable'>
  <tr>
    <th>Nomor</th>
    <th>NIM</th>
    <th>Nama</th>
    <th>Nama Perusahaan</th>
    <th>Telepon Perusahaan</th>
    <th>Contact Person Perusahaan</th>
    <th>Action</th>
  </tr> ";
            while($data = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             ?>
                <tr>
      <td><font face=tahoma size=2><?php echo $no;?></font></td>
      <td><font face=tahoma size=2><?php echo $data['nim']; ?></font></td>
      <td><font face=tahoma size=2><?php echo $data['nama']; ?></font></td>
      <td><font face=tahoma size=2><?php echo $data['nama_perusahaan']; ?></font></td>
      <td><font face=tahoma size=2><?php echo $data['telpon_perusahaan']; ?></font></td>
      <td><font face=tahoma size=2><?php echo $data['cp_perusahaan']; ?></font></td>
      <?php 
      if($data['status_pengajuan']=="PENDING")
       echo "<td><a href='tanggapan.php?id=".$data['id_lamaran']."'><button>Detail</button></a></td></font></td>";
      else if($data['status_registrasi']=="PENDING")
       echo "<td><a href='tanggapan2.php?id=".$data['id_lamaran']."'><button>Detail</button></a></td></font></td>";
      else if($data['status_registrasi']=="ACCEPT"){
       if($data['status_kp']=="NONE")
       echo "<td><a href='tanggapan3.php?id=".$data['id_lamaran']."'><button>Detail</button></a></td></font></td>";
        else
          echo "<td><a href='tanggapan4.php?id=".$data['id_lamaran']."'><button>Detail</button></a></td></font></td>";
      }
      else
          echo "<td><a href='tanggapan5.php?id=".$data['id_lamaran']."'><button>Detail</button></a></td></font></td>";


      ?>
      
    </tr>
  <?php
    $no++;    
  }
  echo "</table>";
}
            }
             
        
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    
?>
</div>
</div>
<div id="footer">
  <div class="containerb" style="height: 60px">
    <div>
    <p class="text-muted" style="margin-bottom: 0;">&copy 2016 Teknik Informatika UKDW
    
    </p>
    </div>
        
      </div>
</div>