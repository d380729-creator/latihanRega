<?php
session_start();

// akun contoh (tanpa database)
$email_benar = "regha@example.com";
$password_benar = "12345";

// ambil dari form
$email = $_POST['email'];
$password = $_POST['password'];

if ($email === $email_benar && $password === $password_benar) {
    $_SESSION['login'] = true;
    $_SESSION['email'] = $email;

    header("Location: dashboard.php");
    exit;
} else {
    echo "Login gagal! <a href='index.php'>Kembali</a>";
}
