<?php
require_once __DIR__ . '/../koneksi.php';

if (isset($_POST['simpan'])) {
    $judul    = $_POST['judul_buku'];
    $penerbit = $_POST['penerbit'];
    $tahun    = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori'];
    $stok     = $_POST['stok'];

    // ================= IMAGE =================
    $image = $_FILES['image']['name'];
    $tmp   = $_FILES['image']['tmp_name'];

    if ($image != "") {
        $ext   = pathinfo($image, PATHINFO_EXTENSION);
        $image = uniqid() . "." . $ext;
        move_uploaded_file($tmp, "../uploads/buku/" . $image);
    } else {
        $image = "default.jpg";
    }

    // ================= QUERY =================
    $query = mysqli_query(
        $connection,
        "INSERT INTO buku 
        (judul_buku, penerbit, tahun_terbit, kategori, stok, status, image)
        VALUES 
        ('$judul', '$penerbit', '$tahun', '$kategori', '$stok', 'tersedia', '$image')"
    );

    if ($query) {
        header("Location: kelola_buku.php");
        exit;
    } else {
        echo "Gagal menyimpan data";
    }
}
?>


<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h3>Tambah Buku</h3>
    <hr>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Judul Buku</label>
            <input type="text" name="judul_buku" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Penerbit</label>
            <input type="text" name="penerbit" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Tahun Terbit</label>
            <input type="text" name="tahun_terbit" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" required>
        </div>

        <div class="form-group">
            <label>stok</label>
            <input type="text" name="stok" class="form-control" required>
        </div>

        <div class="form-group">
        <label>Cover Buku</label>
        <input type="file" name="image" class="form-control-file">
    </div>

        <button type="submit" name="simpan" class="btn btn-primary">
            Simpan
        </button>
        <a href="kelola_buku.php" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>

</body>
</html>
