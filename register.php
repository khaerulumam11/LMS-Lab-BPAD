
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Ujian Online</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php
include "config/koneksi.php";
if(isset($_POST['submit'])){
    $simpan="INSERT INTO tbl_user SET username='$_POST[username]',
                                      password='$_POST[password]',
                                      nama='$_POST[nama]',
                                      nim='$_POST[nim]',
                                      kelas='$_POST[kelas]',
                                      tgl_lahir='$_POST[tgl_lahir]',
                                      jk='$_POST[jk]'";
    mysqli_query($config,$simpan);
    echo '<script language="javascript">
    alert("Anda Berhasil Melakukan Registrasi");
    window.location="index.php";
    </script>';
    exit();
}
?>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">

                <div class="login-panel panel panel-default">
                    <br>
                    <center>

                    </center>
                    <div class="panel-heading">
                        <h3 class="panel-title">Register</h3>
                    </div>
                    <div class="panel-body">
                        <div id="loading" style="text-align: center"></div>
                        <form name="form" action="" id="loginF" method="post" >

                            <fieldset>
                               <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                                </div>

                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="number" class="form-control" id="nim" name="nim" placeholder="NIM">
                                </div>

                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="kelas" id="kelas" class="form-control" >
                                      <option selected>---Pilih---</option>
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
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="YYYY-MM-DD">
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jk" id="jk" class="form-control">
                                      <option selected>----Pilih----</option>
                                      <option value="Laki-Laki">Laki-Laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>


                                <div class="checkbox">
                                    <label>
                                        Sudah punya akun ? masuk <a href="login.php">disini</a>
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->


                                 <input type="submit"  class="btn btn-lg btn-success btn-block" name="submit" value="Kirim">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>



</body>

</html>
