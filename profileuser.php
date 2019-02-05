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
                           Profile
                        </div>
                        <div class="panel-body">

<?php
	include "config/koneksi.php";
	$qry=mysqli_query($config,"SELECT * FROM tbl_user WHERE id_user='$_SESSION[iduser]'");
	$t=mysqli_fetch_array($qry);

  if(isset($_POST['submit'])){
    $update="UPDATE tbl_user set username='".$_POST['username']."',password='".$_POST['password']."',nama='".$_POST['nama']."',tgl_lahir='".$_POST['tgl_lahir']."',jk='".$_POST['jk']."',nim='".$_POST['nim']."',kelas='".$_POST['kelas']."' where id_user='".$_SESSION['iduser']."' ";
    mysqli_query($config,$update);

    echo '<script language="javascript">
    alert("Anda Berhasil Merubah data");
    window.location="media.php?hal=profiluser";
    </script>';
    exit();
}
?>

<form name="form1" method="post" action="">
  <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $t['username'] ?>">

                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $t['nama'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="number" class="form-control" id="nim" name="nim" placeholder="NIM" value="<?php echo $t['nim'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="kelas" id="kelas" class="form-control" >
                                      <option selected><?php echo $t['kelas'] ?></option>
                                      <option>---Pilih---</option>
                                      <option value="SI-41-01">SI-41-01</option>
                                      <option value="SI-41-02">SI-41-02</option>
                                      <option value="SI-41-03">SI-41-03</option>
                                      <option value="SI-41-04">SI-41-04</option>
                                      <option value="SI-41-05">SI-41-05</option>
                                      <option value="SI-41-06">SI-41-06</option>
                                      <option value="SI-41-07">SI-41-07</option>
                                      <option value="SI-41-08">SI-41-08</option>
                                      <option value="SI-41-INT">SI-41-INT</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Tgl Lahir</label>
                                    <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="YYYY-MM-DD" value="<?php echo $t['tgl_lahir'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jk" id="jk" class="form-control">
                                      <option selected><?php echo $t['jk'] ?></option>
                                      <option>----Pilih----</option>
                                      <option value="Laki-Laki">Laki-Laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <input type="submit"  class="btn btn-lg btn-success btn-block" name="submit" value="Kirim">

</form>
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

<script type="text/javascript">
  var $ = jQuery;
  $('#jk').val('<?php echo $t['jk'];?>');
  $('#agama').val('<?php echo $t['agama'];?>');
  $('#kwgn').val('<?php echo $t['kwgn'];?>');

</script>
