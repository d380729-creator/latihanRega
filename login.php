<?php
session_start();

// Koneksi database
$host="localhost"; $user="root"; $pass=""; $db="latihan_login";
$koneksi=mysqli_connect($host,$user,$pass,$db);
if(!$koneksi) die("Koneksi gagal: ".mysqli_connect_error());

if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=mysqli_real_escape_string($koneksi,$_POST['email']);
    $password=mysqli_real_escape_string($koneksi,$_POST['password']);

    // Admin hardcode
    if($email=="admin@example.com" && $password=="admin123"){
        $_SESSION['email']=$email;
        $_SESSION['role']="admin";
        header("Location: dashboard_admin.php");
        exit;
    }

    // User database
    $query="SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result=mysqli_query($koneksi,$query);
    if(mysqli_num_rows($result)==1){
        $data=mysqli_fetch_assoc($result);
        $_SESSION['email']=$data['email'];
        $_SESSION['role']="user";
        header("Location: dashboard_user.php");
        exit;
    } else {
        echo "<script>alert('Email atau password salah'); window.location='index.php';</script>";
        exit;
    }
}
?>
