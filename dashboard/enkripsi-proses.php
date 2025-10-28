<?php
session_start();
include "../config.php";   //memasukan koneksi
if (empty($_SESSION['username'])) {
    header("location:../index.php");
}

include "AES.php"; //memasukan file AES

if (isset($_POST['enkripsi_now'])) {
    $user           = $_SESSION['username'];
    $key            = $mysqli->real_escape_string(substr(md5($_POST["pwdfile"]), 0, 16));
    $deskripsi      = $mysqli->real_escape_string($_POST['desc']);

    $file_tmpname   = $_FILES['file']['tmp_name'];
    //untuk nama file url
    $file           = rand(1000, 100000) . "-" . $_FILES['file']['name'];
    $new_file_name  = strtolower($file);
    $final_file     = str_replace(' ', '-', $new_file_name);
    //untuk nama file
    $filename       = rand(1000, 100000) . "-" . pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
    $new_filename   = strtolower($filename);
    $finalfile      = str_replace(' ', '-', $new_filename);
    $size           = filesize($file_tmpname);
    $size2          = (filesize($file_tmpname)) / 1024;
    $info           = pathinfo($final_file);
    $file_source    = fopen($file_tmpname, 'rb');
    $ext            = $info["extension"];

    if ($ext == "docx" || $ext == "doc" || $ext == "txt" || $ext == "pdf" || $ext == "xls" || $ext == "xlsx" || $ext == "ppt" || $ext == "pptx") {
    } else {
        echo ("<script language='javascript'>
          window.location.href='enkripsi.php';
          window.alert('Maaf, file yang bisa dienkrip hanya word, excel, text, ppt ataupun pdf.');
          </script>");
        exit();
    }

    if ($size2 > 5084) {
        echo ("<script language='javascript'>
          window.location.href='home.php?enkripsi';
          window.alert('Maaf, file tidak bisa lebih besar dari 5MB.');
          </script>");
        exit();
    }

    $sql1   = "INSERT INTO file VALUES ('', '$user', '$final_file', '$finalfile.rda', '', '$size2', '$key', now(), '1', '$deskripsi')";
    $query1  = $mysqli->query($sql1) or die(mysqli_error($mysqli));

    $sql2   = "select * from file where file_url =''";
    $query2  = $mysqli->query($sql2) or die(mysqli_error($mysqli));

    $url   = $finalfile . ".rda";
    $file_url = "file_enkripsi/$url";

    $sql3   = "UPDATE file SET file_url ='$file_url' WHERE file_url=''";
    $query3  = $mysqli->query($sql3) or die(mysqli_error($mysqli));

    $file_output        = fopen($file_url, 'wb');

    $mod    = $size % 16;
    if ($mod == 0) {
        $banyak = $size / 16;
    } else {
        $banyak = ($size - $mod) / 16;
        $banyak = $banyak + 1;
    }

    // if (is_uploaded_file($file_tmpname)) {
    //     ini_set('max_execution_time', -1);
    //     ini_set('memory_limit', -1);
    //     $aes = new AES($key);

    //     for ($bawah = 0; $bawah < $banyak; $bawah++) {
    //         $putaran = $bawah + 1;
    //         echo "<b>Proses ke-{$putaran}:</b><br>";
    //         $data    = fread($file_source, 16);
    //         echo "<b>Text :</b> $data<br>";
    //         $cipher  = $aes->enkripsi($data);
    //         echo "$aes->output<br>";
    //         fwrite($file_output, $cipher);
    //     }
    //     fclose($file_source);
    //     fclose($file_output);

    //     // echo ("<script language='javascript'>
    //     //   window.location.href='dekripsi.php';
    //     //   window.alert('Enkripsi Berhasil :)');
    //     //   </script>");
    // } else {
    //     // echo ("<script language='javascript'>
    //     //   window.location.href='enkripsi.php';
    //     //   window.alert('Enkripsi File mengalami masalah :(');
    //     //   </script>");
    // }
}

?>

<!DOCTYPE html>
<html>
<?php
$user = $_SESSION['username'];
$query = $mysqli->query("SELECT fullname,job_title,last_activity FROM users WHERE username='$user'");
$data = mysqli_fetch_array($query);
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Proses Enkripsi</title>
    <link rel="icon" href="../assets/assets2/img/logosmd.png">

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/assets2/css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #007f5c;">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard/index.php">
                <div class="sidebar-brand-icon">
                    <img src="../assets/assets2/img/logosmd.png" width="35" height="35">
                </div>
                <div class="sidebar-brand-text mx-3">Enkrpsi-Namo Buaya</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../dashboard/index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
            Metode AES 128
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="enkripsi.php" aria-expanded="true">
                    <i class="fas fa-fw fa-lock"></i>
                    <span>Enkripsi AES</span>
                </a>

                <a class="nav-link collapsed" href="dekripsi.php" aria-expanded="true">
                    <i class="fas fa-fw fa-lock-open"></i>
                    <span>Dekripsi AES</span>
                </a>

                <a class="nav-link collapsed" href="file.php" aria-expanded="true">
                    <i class="fas fa-fw fa-file"></i>
                    <span>File</span>
                </a>
                <hr class="sidebar-divider">
            </li>
            <div class="sidebar-heading">
            Metode Triple DES
      </div>
      <li class="nav-item">
                <a class="nav-link collapsed" href="enkripsi2.php" aria-expanded="true">
                    <i class="fas fa-fw fa-lock"></i>
                    <span>Enkripsi Triple DES</span>
                </a>
                <hr class="sidebar-divider">
           
                <a class="nav-link collapsed" href="tentang.php" aria-expanded="true">
                    <i class="fas fa-fw fa-info"></i>
                    <span>Tentang Aplikasi</span>
                </a>

                <a class="nav-link collapsed" href="bantuan.php" aria-expanded="true">
                    <i class="fas fa-fw fa-question-circle"></i>
                    <span>Bantuan</span>
                </a>
                <a class="nav-link collapsed" href="visi_misi.php" aria-expanded="true">
                     <i class="fas fa-fw fa-book"></i>
                     <span>Visi & Misi </span>
                </a>
                <hr class="sidebar-divider">
            </li>
        </ul>


        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <h1 class="h4 mb-0 ml-2 text-gray-800">Enkripsi - implementasi Keamanan Sistem Informasi Desa Namo Buaya Menggunakan Metode 
                    AES128-bit</h1>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $data['fullname']; ?></span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-info fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Tentang Aplikasi
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-question-circle fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Bantuan
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Pastikan data yang sudah anda proses telah disimpan!</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                    <a class="btn btn-primary" href="logout.php">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </nav>
                <!-- End of Topbar -->

                <div class="container-fluid">
                    <div class="alert alert-success" role="alert">
                        <i><img src="../assets/assets2/img/logosmd.png" class="mb-1 mr-2" width="25"></i>
                        implementasi Keamanan Sistem Informasi Desa Namo Buaya Menggunakan Metode 
  AES128-bit - Proses Enkripsi
                    </div>
                    <a href="file.php" class="btn btn-success mb-2"><i class="fas fa-arrow-right mr-2"></i>Lihat Hasil</a>
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Proses Enkripsi</h6>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <?php
                                    if (is_uploaded_file($file_tmpname)) {
                                        ini_set('max_execution_time', -1);
                                        ini_set('memory_limit', -1);
                                        $aes = new AES($key);

                                        for ($bawah = 0; $bawah < $banyak; $bawah++) {
                                            $putaran = $bawah + 1;
                                            echo "<b>Proses ke-{$putaran}:</b><br>";
                                            $data = fread($file_source, 16);
                                            echo "<b>Text :</b> $data<br>";
                                            $cipher = $aes->enkripsi($data);
                                            echo "$aes->output<br>";
                                            fwrite($file_output, $cipher);
                                        }
                                        fclose($file_source);
                                        fclose($file_output);

                                        // echo ("<script language='javascript'>
                                        //   window.location.href='dekripsi.php';
                                        //   window.alert('Enkripsi Berhasil :)');
                                        //   
                                        // </script>");
                                    } else {
                                        // echo ("<script language='javascript'>
                                        //   window.location.href='enkripsi.php';
                                        //   window.alert('Enkripsi File mengalami masalah :(');
                                        //   
                                        // </script>");
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Enkripsi-Namo Buaya 2024</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery-2.1.4.min.js"></script>
    <script src="../assets/js/essential-plugins.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/pace.min.js"></script>
    <script src="../assets/js/main.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>