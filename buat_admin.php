<?php
include 'koneksi.php';

$pass1 = password_hash('regha', PASSWORD_DEFAULT);
$pass2 = password_hash('umar', PASSWORD_DEFAULT);

$sql = "INSERT INTO users (email, nama, password, role) VALUES
('regha@gmail.com', 'Admin', '$pass1', 'admin'),
('umar@gmail.com', 'Admin 2', '$pass2', 'admin')";

if (mysqli_query($connection, $sql)) {
    echo "2 Admin berhasil dibuat!";
} else {
    echo "Gagal: " . mysqli_error($connection);
}
