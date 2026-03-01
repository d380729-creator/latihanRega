<?php
$connection = mysqli_connect("localhost", "root", "", "latihan_login");

if (!$connection) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
