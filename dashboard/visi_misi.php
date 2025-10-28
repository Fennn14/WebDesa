<?php
session_start();
include('../config.php');
if (empty($_SESSION['username'])) {
    header("location:../index.php");
}
$last = $_SESSION['username'];
$sqlupdate = "UPDATE users SET last_activity=now() WHERE username='$last'";
$queryupdate = $mysqli->query($sqlupdate);
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

    <title>Visi & Misi</title>
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
                <div class="sidebar-brand-text mx-3">Enkripsi Desa</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
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

            <!-- Heading -->
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
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <h1 class="h4 mb-0 ml-2 text-gray-800">Visi & Misi -Implementasi Keamanan Sistem Informasi Desa Namo Buaya Menggunakan Metode AES128-bit</h1>

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
                                <a class="dropdown-item" href="tentang.php">
                                    <i class="fas fa-info fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Tentang Aplikasi
                                </a>
                                <a class="dropdown-item" href="bantuan.php">
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
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Visi & Misi Desa</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Visi & Misi </h6>
                                </div>
                                <div class="card-body">
                                    <h5>Visi</h5>
                                    <p>Menjadi aplikasi keamanan sistem informasi desa terdepan di Indonesia.</p>
                                    <h5>Misi</h5>
                                    <p>1. Mengimplementasikan teknologi enkripsi AES128-bit untuk pengamanan data.</p>
                                    <p>2. Memberikan kemudahan dalam pengelolaan file digital desa.</p>
                                    <p>3. Mendorong adopsi teknologi informasi di tingkat desa.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="text-center">
                            <span>Implementasi Keamanan Sistem Informasi Desa Namo Buaya Menggunakan Metode AES128-bit &copy; <?php echo date('Y'); ?></span>
                        </div>
                    </
