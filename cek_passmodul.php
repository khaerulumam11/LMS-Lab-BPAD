<?php
include "config/koneksi.php";

if (isset($_POST['submit'])) {
	// code...
$psw=$_POST['psw'];
$id=$_POST['id'];

$qry=mysqli_query($config,"SELECT * FROM tbl_modul WHERE id_modul='$id'");
$r=mysqli_fetch_array($qry);

if ($psw == $r['password']) {
	// code...
	echo '<script language="javascript">
	alert("Selamat Mengerjakann dan Kerjakan Yang Teliti!!");
	</script>';
	header('location:media.php?hal=soal');
}
else {
	echo '<script language="javascript">
	alert("Password Modul Salah");
	</script>';
}
}
?>
