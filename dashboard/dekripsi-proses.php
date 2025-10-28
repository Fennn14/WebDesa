<?php
session_start();
include "../config.php";   //memasukan koneksi
include "AES.php"; //memasukan file AES

$idfile = $_POST['fileid'];
$pwdfile = md5($_POST["pwdfile"]);
$pwdfile = substr($pwdfile, 0, 16);

$query = "SELECT password, file_url, file_name_source, file_size FROM file WHERE id_file=? AND password=?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ss", $idfile, $pwdfile);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($key, $file_path, $file_name, $size);
    $stmt->fetch();

    $file_size = filesize($file_path);

    $query2 = "UPDATE file SET status='2' WHERE id_file=?";
    $stmt2 = $mysqli->prepare($query2);
    $stmt2->bind_param("s", $idfile);
    $stmt2->execute();

    $mod = $file_size % 16;

    $aes = new AES($key); // Pastikan kelas AES terdefinisi dengan baik

    $fopen1 = fopen($file_path, "rb");
    $cache = "file_dekripsi/$file_name";
    $fopen2 = fopen($cache, "wb");

    $banyak = ($mod == 0) ? $file_size / 16 : floor($file_size / 16) + 1;

    ini_set('max_execution_time', -1);
    ini_set('memory_limit', -1);

    for ($bawah = 0; $bawah < $banyak; $bawah++) {
        $filedata = fread($fopen1, 16);
        $plain = $aes->dekripsi($filedata);
        fwrite($fopen2, $plain);
    }

    fclose($fopen1);
    fclose($fopen2);

    if (file_exists($cache)) {
        // Berhasil didekripsi
        echo ("<script language='javascript'>
               window.open('download.php?file=$cache', '_blank');
               window.location.href='file.php';
               window.alert('Berhasil mendekripsi file.');
               </script>");
    } else {
        // Gagal menulis file dekripsi
        echo ("<script language='javascript'>
               window.alert('Gagal mendekripsi file.');
               window.location.href='file.php';
               </script>");
    }
} else {
    // Password tidak sesuai
    echo ("<script language='javascript'>
           window.location.href='dekripsi-file.php?id_file=$idfile';
           window.alert('Maaf, Password tidak sesuai.');
           </script>");
}

$stmt->close();
$stmt2->close();
$mysqli->close();
?>
