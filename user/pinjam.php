<?php
session_start();
require_once __DIR__ . '/../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

// ================= CEK LOGIN =================
if (!isset($_SESSION['login']) || !isset($_SESSION['id_user'])) {
    header("Location: ../index.php");
    exit;
}

// ================= CEK PARAMETER =================
if (!isset($_GET['id_buku'])) {
    header("Location: dashboard.php");
    exit;
}

$id_user = $_SESSION['id_user'];
$id_buku = mysqli_real_escape_string($connection, $_GET['id_buku']);

// ================= CEK APAKAH MASIH PUNYA PINJAMAN =================
$cek_pinjam = mysqli_query($connection, "
    SELECT * FROM transaksi 
    WHERE id_user='$id_user' 
    AND status_transaksi='Dipinjam'
");

if (mysqli_num_rows($cek_pinjam) > 0) {
    echo "<script>
            alert('Kamu masih punya buku yang belum dikembalikan!');
            window.location='dashboard.php';
          </script>";
    exit;
}

// ================= CEK STOK =================
$cek_buku = mysqli_query($connection, "
    SELECT * FROM buku WHERE id_buku='$id_buku'
");

$buku = mysqli_fetch_assoc($cek_buku);

if (!$buku || $buku['stok'] <= 0) {
    echo "<script>
            alert('Stok buku habis!');
            window.location='dashboard.php';
          </script>";
    exit;
}

// ================= PROSES PINJAM =================
$tanggal_pinjam = date('Y-m-d H:i:s');

$insert = mysqli_query($connection, "
    INSERT INTO transaksi
    (id_user, id_buku, tanggal_pinjam, tanggal_kembali, status_transaksi)
    VALUES
    ('$id_user', '$id_buku', '$tanggal_pinjam', NULL, 'Dipinjam')
");

if ($insert) {

    // kurangi stok
    mysqli_query($connection, "
        UPDATE buku SET stok = stok - 1 
        WHERE id_buku='$id_buku'
    ");

    echo "<script>
            alert('📚 Buku berhasil dipinjam!');
            window.location='dashboard.php';
          </script>";
} else {
    echo "Gagal meminjam: " . mysqli_error($connection);
}
exit;
?>