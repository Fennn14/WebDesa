<?php
session_start();
include('../config.php');

if (empty($_SESSION['username'])) {
    header("location:../index.php");
}

$encryptedResult = '';
$decryptedResult = '';
$errorMessage = '';
$downloadLinkDecrypt = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'encrypt') {
        $file = $_FILES['file']['tmp_name'];
        $key = $_POST['key'];

        // Enkripsi
        $cipher = "des-ede3";
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));

        $data = file_get_contents($file);
        $encrypted = openssl_encrypt($data, $cipher, $key, OPENSSL_RAW_DATA, $iv);

        // Gabungkan IV dan data terenkripsi
        $output = base64_encode($iv . $encrypted);
        
        // Simpan ke file
        $filename = 'encrypted_' . time() . '.enc'; // Simpan dengan ekstensi .enc
        file_put_contents($filename, $output);
        $encryptedResult = $output;
        $downloadLink = $filename; // Link untuk diunduh

    } elseif ($_POST['action'] == 'decrypt') {
        // Jika mengupload file terenkripsi
        if (isset($_FILES['encrypted_file']) && $_FILES['encrypted_file']['error'] == 0) {
            $encrypted_data = file_get_contents($_FILES['encrypted_file']['tmp_name']);
            $encrypted_data = base64_decode($encrypted_data);
        } else {
            $encrypted_data = base64_decode($_POST['encrypted_data']);
        }

        $key = $_POST['key_decrypt'];
        $cipher = "des-ede3";

        // Pisahkan IV dan data terenkripsi
        $iv_length = openssl_cipher_iv_length($cipher);
        $iv = substr($encrypted_data, 0, $iv_length);
        $encrypted = substr($encrypted_data, $iv_length);

        // Dekripsi data
        $decrypted = openssl_decrypt($encrypted, $cipher, $key, OPENSSL_RAW_DATA, $iv);
        $decryptedResult = $decrypted;

        // Simpan hasil dekripsi ke file
        $decryptFilename = 'decrypted_' . time() . '.docx'; // Ganti sesuai dengan format file asli
        file_put_contents($decryptFilename, $decrypted); // Simpan hasil dekripsi ke file
        $downloadLinkDecrypt = $decryptFilename; // Link untuk diunduh
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Enkripsi dan Dekripsi - Triple DES</title>
    <link rel="icon" href="../assets/assets2/img/logosmd.png">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../assets/assets2/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<div id="wrapper">
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
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <h1 class="h4 mb-0 ml-2 text-gray-800">Enkripsi dan Dekripsi - Triple DES</h1>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username']; ?></span>
                            <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Enkripsi</h6></div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputFile">File yang akan dienkripsi</label>
                                <input type="file" name="file" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="inputKey">Kunci Enkripsi</label>
                                <input type="text" name="key" class="form-control" placeholder="Masukkan kunci" required>
                            </div>
                            <button type="submit" name="action" value="encrypt" class="btn btn-success">Enkripsi</button>
                        </form>
                        <?php if (isset($downloadLink)): ?>
                            <h3 class="mt-3">Hasil Enkripsi:</h3>
                            <a href="<?= $downloadLink ?>" class="btn btn-primary mt-2" download>Unduh File Enkripsi</a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Dekripsi</h6></div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputEncryptedFile">Unggah File Terenkripsi</label>
                                <input type="file" name="encrypted_file" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="inputKeyDecrypt">Kunci Dekripsi</label>
                                <input type="text" name="key_decrypt" class="form-control" placeholder="Masukkan kunci" required>
                            </div>
                            <button type="submit" name="action" value="decrypt" class="btn btn-info">Dekripsi</button>
                        </form>
                        <?php if (isset($downloadLinkDecrypt)): ?>
                            <h3 class="mt-3">File Dekripsi Siap Diunduh:</h3>
                            <a href="<?= $downloadLinkDecrypt ?>" class="btn btn-primary mt-2" download>Unduh File Dekripsi</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto"><span>Copyright &copy; Implementasi Metode Triple DES 2024</span></div>
                </div>
            </footer>
        </div>
    </div>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
