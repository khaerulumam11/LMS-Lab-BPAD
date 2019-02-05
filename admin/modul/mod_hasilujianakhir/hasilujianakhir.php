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
                          Hasil Ujian
                        </div>
                        <div class="panel-body">
                          <?php
$aksi="modul/mod_hasilujian/aksi_hasilujianakhir.php";
switch($_GET[act]){
  // Tampil Hasil Ujian Users
  default:
      $tampil = mysqli_query($config,"SELECT * FROM tbl_nilaiakhir,tbl_user,tbl_modul WHERE tbl_nilaiakhir.id_user=tbl_user.id_user AND tbl_nilaiakhir.id_modul = tbl_modul.id_modul");
      echo "<h2>Hasil Tes Ujian User</h2>
        <table class='table table-striped table-bordered table-hover'>
          <tr><th>No</th><th>Nama</th><th>NIM</th><th>Kelas</th><th>Benar</th><th>Salah</th><th>Kosong</th><th>Nilai</th><th>Modul</th><th>Tanggal</th><th>Keterangan</th><th>aksi</th></tr>";
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){
    $tgl = tgl_indo($r[tanggal]);

       echo "<tr><td>$no</td>
            <td>$r[nama]</td>
            <td>$r[nim]</td>
            <td>$r[kelas]</td>
            <td>$r[benar]</td>
        <td>$r[salah]</td>
        <td>$r[kosong]</td>
        <td>$r[score]</td>
        <td>$r[nama_modul]</td>
        <td>$tgl</td>
        <td>$r[keterangan]</td>
   <td><input type=button value='Hapus' class='btn btn-danger' onclick=\"window.location.href='$aksi?module=hasilujianakhir&act=hapus&id=$r[id_nilai]';\">
   </td>
      </tr>";
      $no++;
    }
    echo "
    </table><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
    break;
}
?>

<a href='../admin/export_excel.php' class='btn btn-primary'>Download Nilai Tes Akhir</a>


                        </div>
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
