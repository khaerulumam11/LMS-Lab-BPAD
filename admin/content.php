<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";

// Bagian User
if ($_GET[module]=='home'){
  include "sidebar.php";
  include "modul/mod_home/home.php";
}
elseif ($_GET[module]=='modul'){
  include "sidebar.php";
  include "modul/mod_modul/modul.php";
}
elseif ($_GET[module]=='soal'){
  include "sidebar.php";
  include "modul/mod_soal/soal.php";
}
elseif ($_GET[module]=='profil'){
  include "sidebar.php";
  include "modul/mod_profil/profil.php";
}
elseif ($_GET[module]=='komentar'){
  include "sidebar.php";
  include "modul/mod_komentar/komentar.php";
}
elseif ($_GET[module]=='hasilujian'){
  include "sidebar.php";
  include "modul/mod_hasilujian/hasilujian.php";
}
elseif ($_GET[module]=='hasilujianakhir'){
  include "sidebar.php";
  include "modul/mod_hasilujianakhir/hasilujianakhir.php";
}
elseif ($_GET[module]=='modulprak'){
  include "sidebar.php";
  include "modul/mod_modulprak/modulprak.php";
}
elseif ($_GET[module]=='pengaturanujian'){
  include "sidebar.php";
  include "modul/mod_pengaturanujian/pengaturanujian.php";
}
elseif  ($_GET[module]=='panduan') {
	include "sidebar.php";
	include "modul/mod_panduan/panduan.php";
}
elseif ($_GET[module]=='users') {
	include "sidebar.php";
	include "modul/mod_users/users.php";
}
// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
