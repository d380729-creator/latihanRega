<?php
require_once __DIR__ . '/../koneksi.php';

$id = $_GET['id'];

// 1. Ambil nama image
$data = mysqli_query($connection, "SELECT image FROM buku WHERE id_buku='$id'");
$row  = mysqli_fetch_assoc($data);

$image = $row['image'];

// 2. Hapus file (kecuali default)
if ($image != 'default.jpg') {
    $path = "../uploads/buku/" . $image;
    if (file_exists($path)) {
        unlink($path);
    }
}

// 3. Hapus data buku
mysqli_query($connection, "DELETE FROM buku WHERE id_buku='$id'");

// 4. Kembali
header("Location: kelola_buku.php");
exit;
