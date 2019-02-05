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
                          Kelola Tes Awal dan Tes Akhir Praktikum
                        </div>
                        <div class="panel-body">



<script language="JavaScript">
function bukajendela(url) {
 window.open(url, "window_baru", "width=800,height=500,left=120,top=10,resizable=1,scrollbars=1");
}
</script>

<?php
include "../../../config/koneksi.php";
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_modul/aksi_modul.php";
switch($_GET[act]){
  // Tampil Soal
  default:
    echo "<h2>Tes Awal dan Tes Akhir Praktikum</h2>";
  // Tombol Tambah Soal
  echo "<div style='text-align:left;padding-left:30px;'>
          <input class='btn btn-primary' type=button value='Tambah Tes Awal/Akhir Modul Praktikum'
          onclick=\"window.location.href='?module=modul&act=tambahsoal';\">";
  //Form Pencarian Data

  //Tampil Data Soal
     echo" <table class='table table-striped table-bordered table-hover' style ='margin-top:20px'>
          <tr><th>No</th><th>Modul</th><th>Status</th><th>Aksi</th><th>View</th><th>Pilihan Tes</th><th>Password</th><th></th></tr>";
    $tampil=mysqli_query($config,"SELECT * FROM tbl_modul,tbl_modulprak where tbl_modul.id_modulprak = tbl_modulprak.id_modul ORDER BY tbl_modul.id_modul DESC");
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){
    $soal=$r[nama_modul];
       echo "<tr><td>$no</td>
             <td>$soal</td>
       <td align='center'>$r[keterangan]</td>
             <td>
        <a href=?module=modul&act=editsoal&id_modul=$r[id_modul]><i class='fa fa-pencil-square-o'></i></a> |
        <a href=$aksi?module=modul&act=hapus&id_modul=$r[id_modul]><i class='fa fa-trash'></i></a></td>
        <td> <a href='#' onclick=\"bukajendela('zoom1.php?id=$r[id_modul]')\"><i class='fa fa-eye'></i></a></td>
           <td align='center'>$r[pilihan_tes]</td>
           <td align='center'>$r[password]</td>";

        if ($r[keterangan]=="Y") {
          echo"<td><input type=button class='btn btn-default' value='Non Aktifkan' onclick=\"window.location.href='$aksi?module=modul&act=nonaktif&id=$r[id_modul]';\"></td>";

        }else {
          echo"<td align='center'><input class='btn btn-success' type=button value='Aktifkan' onclick=\"window.location.href='$aksi?module=modul&act=aktif&id=$r[id_modul]';\"></td>";
        }

        echo"   </td>
    </tr>";
      $no++;
    }
    echo "</table>";
    break;

  // Form Tambah Soal
  case "tambahsoal":
    echo "<h2>Tambah Modul Praktikum</h2>
          <form method=POST class='form-horizontal' action='$aksi?module=modul&act=input'>

          <div class='form-group'>
          <label for='inputEmail3' class='col-sm-2 control-label'>Pilihan Modul</label>
          <div class='col-sm-4'>
          <select name='pilihan_modul' class='form-control'>
          <option value='0' disabled selected>--Pilihan Modul--</option>";
          $tampil1=mysqli_query($config,"SELECT * FROM tbl_modulprak");
          while ($r1=mysqli_fetch_array($tampil1)){
          echo "<option value='$r1[id_modul]'>$r1[nama_modul]&nbsp$r1[matkul]</option>";
          };
          echo "
          </select>
          </div>
          </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Pilihan Tes</label>
                          <div class='col-sm-4'>
                            <select name='pilihan_tes' class='form-control'>
                            <option value = '0' disabled selected>--Pilihan Tes--</option>
                            <option value='Tes Awal'>Tes Awal</option>
                            <option value='Tes Akhir'>Tes Akhir</option>
                            </select>

                          </div>
                          </div>

                          <div class='form-group'>
                            <label for='inputEmail3' class='col-sm-2 control-label'>Password</label>
                            <div class='col-sm-4'>
                            <input type='text' name='password' class='form-control'>
                            </div>

                        </div>

                        <div class='form-group'>
                          <div class='col-sm-4'>
                          <center>
                        <input type=submit name=submit value=Simpan class='btn btn-primary'>
                        <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
                        </center>
                        </div>
                        </div>
                  </form>";
     break;

  // Form Edit Soal
  case "editsoal":
    $edit=mysqli_query($config,"SELECT * FROM tbl_modul,tbl_modulprak WHERE tbl_modul.id_modul='$_GET[id_modul]' AND tbl_modul.id_modulprak = tbl_modulprak.id_modul");
    $r=mysqli_fetch_array($edit);

    echo "<h2>Edit Modul</h2>
          <form method=POST action=$aksi?module=modul&act=update class='form-horizontal'>
          <input type=hidden name=id_modul value='$r[id_modul]'>

          <div class='form-group'>
          <label for='inputEmail3' class='col-sm-2 control-label'>Pilihan Modul</label>
          <div class='col-sm-4'>
          <select name='pilihan_modul' class='form-control'>
          <option value='$r[id_modul]' selected>$r[nama_modul]</option>";
          $tampil1=mysqli_query($config,"SELECT * FROM tbl_modulprak");
          while ($r1=mysqli_fetch_array($tampil1)){
          echo "<option value='$r1[id_modul]'>$r1[nama_modul]</option>";
          };
          echo "
          </select>
          </div>
          </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Pilihan Tes</label>
                          <div class='col-sm-4'>
                            <select name='pilihan_tes' class='form-control'>
                            <option value = '$r[pilihan_tes]' >$r[pilihan_tes]</option>
                            <option value='Tes Awal'>Tes Awal</option>
                            <option value='Tes Akhir'>Tes Akhir</option>
                            </select>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Password</label>
                          <div class='col-sm-4'>
                          <input type='text' name='password' class='form-control' value='$r[password]'>
                          </div>

                      </div>


                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'></label>
                          <div class='col-sm-4'>
                        <input type=submit name=submit value=Simpan class='btn btn-primary'>
                        <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
                        </div>
                        </div>

        </form>";
    break;

  // case "viewsoal":
  //   $view=mysqli_query($config,"SELECT * FROM tbl_soal WHERE id_soal='$_GET[id]'");
  //   $t=mysqli_fetch_array($view);
  //   echo "<h2>Soal :</h2>
  //   $t[soal]</br>";
  //         if ($t[gambar]!=''){
  //             echo "<img src='../foto/$t[gambar]'>";
  //         }
  //   echo"<h2>Jawaban :</h2>
  //   a. $t[a] </br>
  //   b. $t[b] </br>
  //   c. $t[c] </br>
  //   d. $t[d] </br>";
  // break;

  case "carisoal":
       echo"<h2>Berikut adalah  Hasil Pencarian Yang ditemukan</h2>
     <table class='table table-striped table-bordered table-hover'>
          <tr><th>no</th><th>Pertanyaan</th><th>Status</th><th>aksi</th><th>Status</th><th>View</th></tr>";
    $tampil=mysqli_query($config,"SELECT * FROM tbl_modul,tbl_modulprak WHERE nama_modul LIKE '%$_POST[cari]%' AND tbl_modul.id_modulprak = tbl_modulprak.id_modul");
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nama_modul]</td>
       <td align='center'>$r[status]</td>
             <td>
        <a href=?module=modul&act=editsoal&id_modul=$r[id_modul]><i class='fa fa-pencil-square-o'></i></a>|
        <a href=$aksi?module=modul&act=hapus&id_modul=$r[id_modul]><i class='fa fa-trash'></i></a></td>";
        if ($r[aktif]=="Y") {
          echo"<td><input class='btn btn-default' type=button value='Non Aktifkan' onclick=\"window.location.href='$aksi?module=modul&act=nonaktif&id_modul=$r[id_modul]';\"></td>";

        }else {
          echo"<td align='center'><input class='btn btn-success' type=button value='Aktifkan' onclick=\"window.location.href='$aksi?module=modul&act=aktif&id_modul=$r[id_modul]';\"></td>";
        }

        echo"   </td>
    <td><a href=?module=soal&act=viewsoal&id=$r[id_modul]><i class='fa fa-eye'></i></a></a></td>

    </tr>";
      $no++;
    }
    echo "</table>";
    break;


  }
}
?>

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


<script type="text/javascript">
  var $ = jQuery;
  $('#knc_jawaban').val('<?php echo $r['knc_jawaban'];?>');
</script>
