<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Ambil user berdasarkan email
$query = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");
$data  = mysqli_fetch_assoc($query);

if ($data && password_verify($password, $data['password'])) {
    $_SESSION['login'] = true;
    $_SESSION['id']    = $data['id'];
    $_SESSION['nama']  = $data['nama'];
    $_SESSION['role']  = $data['role'];

    // Redirect berdasarkan role
    if ($data['role'] == 'admin') {
        header("Location: admin/dashboard.php");
    } else {
        header("Location: user/dashboard.php");
    }
    exit;
} else {
    echo "Login gagal! Email atau password salah.";
}
?>
