<?php
session_start();
include "../config.php";

$id_file = mysqli_real_escape_string($mysqli, $_GET['id_file']);

$get_file_query = "SELECT file_name_source, file_name_finish FROM file WHERE id_file='$id_file'";
$get_file_result = mysqli_query($mysqli, $get_file_query);

// Lakukan pengecekan apakah file ditemukan atau tidak
if (mysqli_num_rows($get_file_result) > 0) {
    $delete_query = "DELETE FROM file WHERE id_file='$id_file'";
    $query = mysqli_query($mysqli, $delete_query);

    if ($query) {
        echo "<script language='javascript'>
               window.open('hapus.php', '_blank');
               window.location.href='dekripsi.php';
               alert('Berhasil Menghapus File.');
               </script>";
        header('location: file.php');
        exit; // Memastikan tidak ada output lagi setelah header
    } else {
        echo "<script language='javascript'>
               window.open('hapus.php', '_blank');
               window.location.href='dekripsi.php';
               alert('Gagal Menghapus File.');
               </script>";
        header('location: file.php');
        exit;
    }
} else {
    // Kasus jika file tidak ditemukan
    echo "<script language='javascript'>
           window.open('hapus.php', '_blank');
           window.location.href='dekripsi.php';
           alert('File tidak ditemukan.');
           </script>";
    header('location: file.php');
    exit;
}
?>
