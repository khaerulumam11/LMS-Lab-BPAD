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
if ($module=='modulprak' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file;

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadBanner($nama_file_unik);
  mysqli_query($config,"INSERT INTO tbl_modulprak(nama_modul,gambar,link,matkul)
  				VALUES('$_POST[nama]',
                       '$nama_file_unik',
                       '$_POST[link]','$_POST[pilihan_matkul]')");
  }
  else{
  mysqli_query($config,"INSERT INTO tbl_modulprak(nama_modul,link,matkul)
  				VALUES('$_POST[nama]',
             '$_POST[link]','$_POST[pilihan_matkul]')");
  }
    header('location:../../media.php?module='.$module);
}
//Hapus Soal
elseif ($module=='modulprak' AND $act=='hapus') {
	mysqli_query($config,"DELETE FROM tbl_modulprak WHERE id_modul='$_GET[id]'");
    header('location:../../media.php?module='.$module);
}
// Update soal
elseif ($module=='modulprak' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file;

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($config,"UPDATE tbl_modulprak SET nama_modul       = '$_POST[nama]',
                                   			 link  = '$_POST[link]', matkul = '$_POST[pilihan_matkul]'
                             WHERE id_modul   = '$_POST[id]'");
  }
  else{
    UploadBanner($nama_file_unik);
    mysqli_query($config,"UPDATE tbl_modulprak SET nama_modul       = '$_POST[nama]',
                                   			 link  = '$_POST[link]' ,
                                   gambar      = '$nama_file_unik',matkul = '$_POST[pilihan_matkul]'
                             WHERE id_modul   = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
//Pengaktifan dan Pengnonaktifan
elseif ($module=='modulprak' AND $act=='nonaktif'){
$aktif='N';
    mysqli_query($config,"UPDATE tbl_modulprak SET status  = '$aktif'  WHERE id_modul='$_GET[id]'");
  header('location:../../media.php?module='.$module);
  echo "tes";

 }
elseif ($module=='modulprak' AND $act=='aktif'){
$aktif='Y';
    mysqli_query($config,"UPDATE tbl_modulprak SET status  = '$aktif'  WHERE id_modul='$_GET[id]'");
  header('location:../../media.php?module='.$module);
  echo "tes";

 }

}
?>
