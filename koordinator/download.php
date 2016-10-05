<?php
  include('header.php');
?>
<body>



<div class="continer">
	<div class="divider" id="section1"></div>
	<div class="row">	
  <form id="download"action="upload.php" method="post" enctype="multipart/form-data">
    <pre>Nama file :               </pre>   
    <input type="text" name="filename" required>
    <br>
    <pre>Deskripsi file :          </pre>
    <input type="text" name="filedesc" required>
    <br>
    <pre>File :</pre><br>
    <script>
    $(document).ready(function() {
    $('input:radio[name=uploadmethod]').click(function() {
        var checkval = $('input:radio[name=uploadmethod]:checked').val();
        $('#urllink').prop('disabled', !(checkval == 'url'));
    });
});
    </script>
        <script>
    $(document).ready(function() {
    $('input:radio[name=uploadmethod]').click(function() {
        var checkval = $('input:radio[name=uploadmethod]:checked').val();
        $('#fileToUpload').prop('disabled', !(checkval == 'uploadfile'));
    });
});
    </script>
    <input type="radio" name="uploadmethod" value="url" checked><pre>Link :                 </pre>
    <input type="url" name="fileurl" id="urllink" required>
    <br>
    <input type="radio" name="uploadmethod" value="uploadfile"><input type="file" name="fileToUpload" id="fileToUpload" disabled>
    <br>
    <input type="submit" value="Upload" name="submit">
  </form>						
	</div><!--/row-->
  <div class = "row">

<table class = "lamaran">
  <tr>
    <th>ID</th>
    <th>Input Date</th>
    <th>NIM</th>
    <th>Nama</th>
    <th>Nama Perusahaan/Instansi</th>
    <th>Contact Person Perusahaan/Instansi</th>
    <th>Nomor Telpon Perusahaan/Instansi</th>
    <th>Job Desc</th>
    <th>Tipe</th>
    <th>SKS</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  <tr>
    <td>1</td>
    <td>11/7/2016</td>
    <td>71130030</td>
    <td>Jonathan Aditya</td>
    <td>Perusahaan Diusahakan Mengusahakan</td>
    <td>abc@gmail.com</td>
    <td>(0274) 555333</td>
    <td>Cuci Piring</td>
    <td><select disabled>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
</select></td>
  <td>117</td>
  <td>Accepted</td>
  <td><button>Edit</button></td>
    
  </tr>
  <tr>
    <td>1</td>
    <td>11/7/2016</td>
    <td>71130030</td>
    <td>Jonathan Aditya</td>
    <td>Perusahaan Diusahakan Mengusahakan</td>
    <td>abc@gmail.com</td>
    <td>(0274) 555333</td>
    <td>Cuci Piring</td>
    <td><select disabled>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
</select></td>
  <td>117</td>
  <td>Accepted</td>
  <td><button>Edit</button></td>
    
  </tr>
  <tr>
    <td>1</td>
    <td>11/7/2016</td>
    <td>71130030</td>
    <td>Jonathan Aditya</td>
    <td>Perusahaan Diusahakan Mengusahakan</td>
    <td>abc@gmail.com</td>
    <td>(0274) 555333</td>
    <td>Cuci Piring</td>
    <td><select disabled>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
</select></td>
  <td>117</td>
  <td>Accepted</td>
  <td><button>Edit</button></td>
    
  </tr>
</table>
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