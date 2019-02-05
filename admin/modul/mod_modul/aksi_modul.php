<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";


$module=$_GET[module];
$act=$_GET[act];

// Input soal
if ($module=='modul' AND $act=='input'){

  // Apabila ada gambar yang diupload
  mysqli_query($config,"INSERT INTO tbl_modul(id_modulprak,pilihan_tes,password)
  				VALUES('$_POST[pilihan_modul]','$_POST[pilihan_tes]','$_POST[password]')");
    header('location:../../media.php?module='.$module);
}
//Hapus Soal
elseif ($module=='modul' AND $act=='hapus') {
	mysqli_query($config,"DELETE FROM tbl_modul WHERE id_modul='$_GET[id_modul]'");
    header('location:../../media.php?module='.$module);
}
// Update soal
elseif ($module=='modul' AND $act=='update'){
    mysqli_query($config,"UPDATE tbl_modul SET id_modulprak       = '$_POST[pilihan_modul]', pilihan_tes = '$_POST[pilihan_tes]', password = '$_POST[password]'

                             WHERE id_modul   = '$_POST[id_modul]'");

  header('location:../../media.php?module='.$module);
}
//Pengaktifan dan Pengnonaktifan
elseif ($module=='modul' AND $act=='nonaktif'){
$aktif='N';
    mysqli_query($config,"UPDATE tbl_modul SET keterangan  = '$aktif'  WHERE tbl_modul.id_modul='$_GET[id]'");
  header('location:../../media.php?module='.$module);
  echo "tes";

 }
elseif ($module=='modul' AND $act=='aktif'){
$aktif='Y';
    mysqli_query($config,"UPDATE tbl_modul SET keterangan  = '$aktif'  WHERE tbl_modul.id_modul='$_GET[id]'");
  header('location:../../media.php?module='.$module);
  echo "tes";

 }

}
?>
