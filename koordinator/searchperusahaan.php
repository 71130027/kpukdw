<?php
include('header.php');
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('kpukdw');
    $searchperusahaan = $_POST['searchperusahaan']; 
    // gets value sent over search form
     $no=1;
    $min_length = 3;
    echo '<div class="continer"><div class="row">';  
    // you can set minimum length of the searchperusahaan if you want
     
    if(strlen($searchperusahaan) >= $min_length){ // if searchperusahaan length is more or equal minimum length then
         
        $searchperusahaan = htmlspecialchars($searchperusahaan); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $searchperusahaan = mysql_real_escape_string($searchperusahaan);
        // makes sure nobody uses SQL injection
         
         $raw_results = mysql_query("SELECT * FROM perusahaan WHERE (`nama_perusahaan` LIKE '%".$searchperusahaan."%') OR (`cp_perusahaan` LIKE '%".$searchperusahaan."%') OR (`telpon_perusahaan` LIKE '%".$searchperusahaan."%') OR (`alamat_perusahaan` LIKE '%".$searchperusahaan."%')") or die(mysql_error());
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$searchperusahaan%' is what we're looking for, % means anything, for example if $searchperusahaan is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$searchperusahaan'
        // or if you want to match just full word so "gogohello" is out use '% $searchperusahaan %' ...OR ... '$searchperusahaan %' ... OR ... '% $searchperusahaan'
         
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             echo "<table class = 'styletable'>
  <tr>
    <th>Nomor</th>
    <th>Nama Perusahaan</th>
    <th>Contact Person Perusahaan</th>
    <th>Telepon Perusahaan</th>
    <th>Alamat Perusahaan</th>
    <th>Status</th>
    <th>Aktif</th>
    <th>Blacklist</th>
    <th>Action</th>
  </tr> ";
            while($data = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             ?>
                <tr>
      <td><font face=tahoma size=2><?php echo $no;?></font></td>
      <td><font face=tahoma size=2><?php echo $data['nama_perusahaan']; ?></font></td>
      <td><font face=tahoma size=2><?php echo $data['cp_perusahaan']; ?></font></td>
      <td><font face=tahoma size=2><?php echo $data['telpon_perusahaan']; ?></font></td>
      <td><font face=tahoma size=2><?php echo $data['alamat_perusahaan']; ?></font></td>
      <td><font face=tahoma size=2><?php echo $data['status']; ?></font></td>
      <?php 
      
      echo "<td><a href='editperusahaan.php?id=".$data['id_perusahaan']."'><button>".$data['aktif']."</button></a></td></font></td>";
      echo "<td><a href='edit2perusahaan.php?id=".$data['id_perusahaan']."'><button>".$data['list']."</button></a></td></font></td>";
      echo "<td><a href='deleteperusahaan.php?id=".$data['id_perusahaan']."'><button>Delete</button></a></td></font></td>";
      
      


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