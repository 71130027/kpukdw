<?php
  include('header.php');
?>
<body>

<?php
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('kpukdw');
$searchlamaran = "";
  ?>
<div class="continer">
<div id="search">
  <form id="download" action="searchlamaran.php" method="post" enctype="multipart/form-data">
  <pre>                                                                                                              </pre>
  <input type="text" name="searchlamaran" value="<?php echo $searchlamaran;?>">
  <input type="submit" name="submit" value="Search">
  </form>
  </div>
  <div class="divider" id="section1"></div>
 
  <div class = 'row'>

<?php





// find out how many rows are in the table 
$sql = mysql_query("SELECT count(*) FROM lamaran, perusahaan where lamaran.id_perusahaan = perusahaan.id_perusahaan AND lamaran.status_registrasi = 'PENDING' order by lamaran.tanggal_input");
$r = mysql_fetch_row($sql);
$numrows = $r[0];

// number of rows to show per page
$rowsperpage = 1;
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;

// get the info from the db 
$result = mysql_query("SELECT * FROM lamaran, perusahaan where lamaran.id_perusahaan = perusahaan.id_perusahaan AND lamaran.status_registrasi = 'PENDING' order by lamaran.tanggal_input LIMIT $offset, $rowsperpage");
$no =1;
  if(mysql_num_rows($result)>0){
echo "<table class = 'styletable'>
  <tr>
    <th>Nomor</th>
    <th>NIM</th>
    <th>Nama</th>
    <th>Nama Perusahaan</th>
    <th>Action</th>
  </tr> ";

// while there are rows to be fetched...
while($data = mysql_fetch_array($result)){
  ?>
    <tr>
      <td><font face=tahoma size=2><?php echo $no;?></font></td>
      <td><font face=tahoma size=2><?php echo $data['nim']; ?></font></td>
      <td><font face=tahoma size=2><?php echo $data['nama']; ?></font></td>
      <td><font face=tahoma size=2><?php echo $data['nama_perusahaan']; ?></font></td>
      <?php 
      echo "<td><a href='tanggapan2.php?id=".$data['id_lamaran']."'><button>Detail</button></a></td></font></td>";
      
      


      ?>
      
    </tr>
  <?php
    $no++;    
  }// end while
echo "</table>";
}
?>
  
<?php 
/******  build the pagination links ******/
// range of num links to show
$range = 3;
if($totalpages > 0){
?>
<div class="pagination">
<?php
// if not on page 1, don't show back links
if ($currentpage > 1) {
   // show << link to go back to page 1
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a> ";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a> ";
} // end if 

// loop to show links to range of pages around current page
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $totalpages)) {
      // if we're on current page...
      if ($x == $currentpage) {
         // 'highlight' it but don't make a link
         echo " [<b>$x</b>] ";
      // if not current page...
      } else {
         // make it a link
         echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
      } // end else
   } // end if 
} // end for
                 
// if not on last page, show forward and last page links        

if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a> ";
   // echo forward link for lastpage
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a> ";
} // end if
}?>
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
































