<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light text-center py-5">

    <img src="assets/ne.jpg.jpeg" width="95" height="95" class="rounded-circle mb-3">

    <h1 class="fw-bold mb-4">
        Regha Kasep
    </h1>

    <a href="logout.php" class="btn btn-danger">
        Keluar
    </a>

</body>
</html>
