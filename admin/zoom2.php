<?php
  include "../config/koneksi.php";
		$view=mysqli_query($config,"SELECT * FROM tbl_modulprak WHERE id_modul='$_GET[id]'");
		$t=mysqli_fetch_array($view);
		echo "<h2>Nama Modul :
		$t[nama_modul]</h2></br>";
          if ($t['gambar']!=''){
              echo "<img src='../foto/$t[gambar]'>";
          }
		echo "<h2>Link : $t[link]</h2>";

?>
