<?php
// Mulai session
session_start();

// Data koneksi
$host = "localhost";      // biasanya localhost
$user = "root";           // user MySQL
$pass = "";               // password MySQL, biasanya kosong
$db   = "latihan_login";  // nama database kamu

// Koneksi ke database
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
