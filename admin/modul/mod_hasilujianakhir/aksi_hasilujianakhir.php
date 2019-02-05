<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

if ($module=='hasilujianakhir' AND $act=='hapus') {
	mysqli_query($config,"DELETE FROM tbl_nilaiakhir WHERE id_nilai='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

?>
