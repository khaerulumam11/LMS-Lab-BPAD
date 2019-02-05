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
                          Kelola Modul Praktikum
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
$aksi="modul/mod_modulprak/aksi_modulprak.php";
switch($_GET[act]){
  // Tampil Soal
  default:
    echo "<h2>Modul Praktikum</h2>";
  // Tombol Tambah Soal
  echo "<div style='text-align:left;padding-left:30px;'>
          <input class='btn btn-primary' type=button value='Tambah Modul Praktikum'
          onclick=\"window.location.href='?module=modulprak&act=tambahmodul';\">";


  //Form Pencarian Data
  //Tampil Data Soal
     echo" <table class='table table-striped table-bordered table-hover' style='margin-top:20px'>
          <tr><th>No</th><th>Nama Modul</th><th>Status</th><th>Aksi</th><th>View</th><th>Link</th><th></th></tr>";
    $tampil=mysqli_query($config,"SELECT * FROM tbl_modulprak ORDER BY id_modul DESC");
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){
    $soal=substr($r[soal],0,78);
       echo "<tr><td>$no</td>
             <td>$r[nama_modul]</td>
       <td align='center'>$r[status]</td>
             <td>
        <a href=?module=modulprak&act=editsoal&id=$r[id_modul]><i class='fa fa-pencil-square-o'></i></a> |
        <a href=$aksi?module=modulprak&act=hapus&id=$r[id_modul]><i class='fa fa-trash'></i></a></td>
        <td> <a href='#' onclick=\"bukajendela('zoom2.php?id=$r[id_modul]')\"><i class='fa fa-eye'></i></a></td>
        <td> $r[link] </td>";
        if ($r[status]=="Y") {
          echo"<td><input type=button class='btn btn-default' value='Non Aktifkan' onclick=\"window.location.href='$aksi?module=modulprak&act=nonaktif&id=$r[id_modul]';\"></td>";

        }else {
          echo"<td align='center'><input class='btn btn-success' type=button value='Aktifkan' onclick=\"window.location.href='$aksi?module=modulprak&act=aktif&id=$r[id_modul]';\"></td>";
        }

        echo"   </td>
    </tr>";
      $no++;
    }
    echo "</table>";
    break;


  // Form Tambah Soal
  case "tambahmodul":
    echo "<h2>Tambah Modul</h2>
          <form method=POST class='form-horizontal' action='$aksi?module=modulprak&act=input' enctype='multipart/form-data'>


                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Nama Modul</label>
                          <div class='col-sm-10'>
                            <textarea name='nama' style='width: 500px; height: 100px;'></textarea>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Nama Mata Kuliah</label>
                          <div class='col-sm-10'>
                          <select name='pilihan_matkul' class='form-control' style='width: 500px;'>
                          <option value='0' disabled selected>--Pilihan Matkul--</option>
                          <option value='RPB'>Rekayasa Proses Bisnis</option>
                          <option value='APSI'>Analisis Perancangan Sistem Informasi</option>
                          </select>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Gambar</label>
                          <div class='col-sm-10'>
                            <input type=file name='fupload' size=100>
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 1000 px
                          </div>
                        </div>


                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Link</label>
                          <div class='col-sm-10'>
                            <textarea name='link' style='width: 500px; height: 100px;'></textarea>
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


  // Form Edit Soal
  case "editsoal":
    $edit=mysqli_query($config,"SELECT * FROM tbl_modulprak WHERE id_modul='$_GET[id]'");
    $r=mysqli_fetch_array($edit);

    echo "<h2>Edit Soal</h2>
          <form method=POST action=$aksi?module=modulprak&act=update class='form-horizontal' enctype='multipart/form-data'>
          <input type=hidden name=id value='$r[id_modul]'>

          <div class='form-group'>
          <label for='inputEmail3' class='col-sm-2 control-label'>Pilihan Modul</label>
          <div class='col-sm-4'>
          <select name='pilihan_matkul' class='form-control'>";
          $tampil1=mysqli_query($config,"SELECT * FROM tbl_modulprak");
          while ($r1=mysqli_fetch_array($tampil1)){
          echo "<option value='$r1[matkul]' selected>$r1[matkul]</option>";
          };
          echo "
          <option value ='RPB'>Rekayasa Proses Bisnis</option>
          <option value ='APSI'>Analisis Perancangan Sistem Informasi</option>
          </select>
          </div>
          </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Nama Modul</label>
                          <div class='col-sm-10'>
                            <textarea name='nama' style='width: 500px; height: 100px;'>$r[nama_modul]</textarea>
                          </div>
                        </div>";
                        if ($r[gambar]!=''){

                        echo "
                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'></label>
                          <div class='col-sm-10'>
                            <img src='../foto/$r[gambar]'>
                          </div>
                        </div>

                        ";
                        }

                        echo"
                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Gambar</label>
                          <div class='col-sm-10'>
                            <input type=file name='fupload' size=100>
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 1000 px
                          </div>
                        </div>


                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Link</label>
                          <div class='col-sm-10'>
                            <textarea name='link' style='width: 500px; height: 100px;'>$r[link]</textarea>
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

  case "viewsoal":
    $view=mysqli_query($config,"SELECT * FROM tbl_modulprak WHERE id_modul='$_GET[id]'");
    $t=mysqli_fetch_array($view);
    echo "<h2>Nama Modul :</h2>
    $t[nama_modul]</br>";
          if ($t[gambar]!=''){
              echo "<img src='../foto/$t[gambar]'>";
          }
    echo"<h2>Link :
   $t[link] </h2> </br>";
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
