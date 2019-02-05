<style>
.column {
  float: left;
  width: 50%;
  height: 30%;
  padding: 0 10px;
  margin-bottom: 20px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 40%) {
  .column {
    width: 100%;
    height: 30%;
    display: block;
    margin-bottom: 50px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}

input[type=text], input[type=password] {
  width: auto;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: auto;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
  padding-left: 300px;
  padding-right: 300px;

}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 100%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)}
  to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
  from {transform: scale(0)}
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 100%) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>

  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      <!--   <h3 class="page-header"> Peraturan </h3> -->

                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          List Modul
                        </div>
                        <div class="panel-body">

<?php
if (empty($_SESSION[username]) AND empty($_SESSION[passuser])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
echo '<div class="row"">';
$qry=mysqli_query($config,"SELECT * FROM tbl_modul,tbl_modulprak  where tbl_modul.keterangan = 'Y' AND tbl_modul.id_modulprak = tbl_modulprak.id_modul");
while ($t=mysqli_fetch_array($qry)) {
  echo '
  <div class="column">
    <div class="card">
    <h2><b>'.$t[nama_modul].'</b></h2><br>
    <img src="foto/'.$t[gambar].'" width="450" hight="300"/><br><br>
    <a><button id ="myBtn[]" class="btn btn-primary" style="width:60%"">'.$t[pilihan_tes].'</button></a>
    </div>
    </div>';
	//echo '<table><tr><th>Waktu Anda</th></tr>
		//  <tr><td align=center><span style="font-size:18px"><span id="menit"></span>:<span id="detik"></span></span> </td></tr></table>';
?>
 <div id="id01[]" class="modal">
   <form class="modal-content animate" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <h2><?php echo $t[nama_modul] ?></h2>
    </div>

    <div class="container" style="margin-left:10%">

      <label for="psw"><b>Masukkan Password <?php echo $t[pilihan_tes] ?></b></label><br>
      <input type="password" style="width:50%" placeholder="Enter Password" name="psw" required><br>
      <input type="hidden" style="width:50%" name="pil_tes" value="<?php echo $t[pilihan_tes]; ?>"><br>
      <input type="hidden" style="width:50%" name="id" value="<?php echo $t[id_modul]; ?>"><br>

      <button style="width:50%" name="submit" type="submit">Submit</button>
    </div>
  </div>


</form>

<?php } } ?>
 </div>
</div>
<?php
include "config/koneksi.php";

if (isset($_POST['submit'])) {
	// code...
$pass=$_POST['psw'];
$id=$_POST['id'];
$pil_tes=$_POST['pil_tes'];

$qry=mysqli_query($config,"SELECT * FROM tbl_modul WHERE id_modul='$id'");
$r=mysqli_fetch_array($qry);

if ($pil_tes == "Tes Awal") {
  // code...
if ($pass == $r['password']) {
	// code...
	echo '<script language="javascript">
	alert("Selamat Mengerjakann dan Kerjakan Yang Teliti!!");
	</script>';
	header('location:media.php?hal=soal&id='.$id.'');
}
else {
	echo '<script language="javascript">
	alert("Password Modul Salah");
	</script>';
}
}
if ($pil_tes == "Tes Akhir") {
  // code...
if ($pass == $r['password']) {
	// code...
	echo '<script language="javascript">
	alert("Selamat Mengerjakann dan Kerjakan Yang Teliti!!");
	</script>';
	header('location:media.php?hal=soal_akhir&id='.$id.'');
}
else {
	echo '<script language="javascript">
	alert("Password Modul Salah");
	</script>';
}
}
}
?>
                        <div class="panel-footer">

                        </div>
                    </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        <script type="text/javascript">
        // Get the modal
        var modal = document.getElementById('id01[]');
        document.getElementById("myBtn[]").addEventListener("click", myFunction);

        // When the user clicks anywhere outside of the modal, close it

        function myFunction() {
         modal.style.display = "block";
        }

        window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
  }

        </script>
