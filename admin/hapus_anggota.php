<?php
require_once __DIR__ . '/../koneksi.php';

// cek apakah id ada
if (!isset($_GET['id'])) {
    header("Location: kelola_anggota.php");
    exit;
}

$id = mysqli_real_escape_string($connection, $_GET['id']);

// cek dulu apakah data ada
$data = mysqli_query($connection, "SELECT * FROM users WHERE id_user='$id'");
$row  = mysqli_fetch_assoc($data);

if (!$row) {
    header("Location: kelola_anggota.php");
    exit;
}

// hapus data anggota
$query = mysqli_query($connection, "DELETE FROM users WHERE id_user='$id'");

if ($query) {
    header("Location: kelola_anggota.php?pesan=hapus");
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($connection);
}
?>