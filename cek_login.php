<?php
include "config/koneksi.php";

if (isset($_POST['submit'])) {
	// code...
$username=$_POST['username'];
$password=$_POST['password'];

$qry=mysqli_query($config,"SELECT * FROM tbl_user WHERE username='$username' AND password='$password'");
$r=mysqli_fetch_array($qry);

if ($username == $r['username'] && $password == $r['password']) {
	// code...
	session_start();
	$_SESSION['username']= $r['username'];
	$_SESSION['iduser']= $r['id_user'];
	header('location:media.php?hal=home');
}
else {
	echo '<script language="javascript">
	alert("Userid atau Password Yang anda Masukkan Salah atau Acount Sudah Diblokir");
	window.location="index.php";
	</script>';
	exit();
}
}
?>
