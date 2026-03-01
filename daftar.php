<?php
session_start();
require_once 'koneksi.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama   = mysqli_real_escape_string($connection, $_POST['nama']);
    $email  = mysqli_real_escape_string($connection, $_POST['email']);
    $nis   = mysqli_real_escape_string($connection, $_POST['nis']);
    $alamat = mysqli_real_escape_string($connection, $_POST['alamat']);
    $no_hp  = mysqli_real_escape_string($connection, $_POST['no_hp']);

    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // Validasi wajib
    if (empty($nama) || empty($email) || empty($nis) || empty($alamat) || empty($no_hp)) {
        $error = "Semua data anggota wajib diisi!";
    }
    // Validasi password
    elseif ($password !== $password_confirm) {
        $error = "Password dan konfirmasi password tidak sama!";
    }
    // Cek email
    else {
        $cek = mysqli_query($connection, "SELECT id_user FROM users WHERE email='$email'");
        if (mysqli_num_rows($cek) > 0) {
            $error = "Email sudah terdaftar!";
        } else {

            // Hash password
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // Insert data
            $insert = mysqli_query($connection, "
                INSERT INTO users 
                (nama, email, password, role, nis, alamat, no_hp)
                VALUES
                ('$nama', '$email', '$password_hash', 'user', '$nis', '$alamat', '$no_hp')
            ");

            if ($insert) {
                $success = "Akun berhasil dibuat! Silakan <a href='index.php'>login</a>.";
            } else {
                $error = "Gagal menyimpan data: " . mysqli_error($connection);
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Akun</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
    body {
        height: 80vh;
        display: flex;
        align-items: center;
        background-color: #f5f5f5;
    }
    .form-login {
        max-width: 330px;
        margin: auto;
    }
</style>
</head>
<body>
<div class="container">
    <form class="form-login" method="POST" action="">
        <h3 class="fw-normal text-center mb-3">Daftar Akun</h3>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>

        <input type="email" name="email" class="form-control mb-2" placeholder="E-mail" required>
        <input type="nama" name="nama" class="form-control mb-2" placeholder="nama" required>
        <input type="nis" name="nis" class="form-control mb-2" placeholder="nis" required>
        <input type="alamat" name="alamat" class="form-control mb-2" placeholder="alamat" required>
        <input type="no_hp" name="no_hp" class="form-control mb-2" placeholder="no_hp" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
        <input type="password" name="password_confirm" class="form-control mb-2" placeholder="Konfirmasi Password" required>

        <button type="submit" class="btn btn-primary w-100 mb-2">Daftar</button>

        <p class="text-center">Sudah punya akun? <a href="index.php">Masuk</a></p>
    </form>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
