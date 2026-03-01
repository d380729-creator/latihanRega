<?php
require_once __DIR__ . '/../koneksi.php';

$id = $_GET['id'];

// ambil data lama
$data = mysqli_query($connection, "SELECT * FROM buku WHERE id_buku='$id'");
$row  = mysqli_fetch_assoc($data);

$image_lama = $row['image'];

if (isset($_POST['simpan'])) {
    $judul    = $_POST['judul_buku'];
    $penerbit = $_POST['penerbit'];
    $tahun    = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori'];
    $stok     = $_POST['stok'];

    // ================= IMAGE =================
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmp   = $_FILES['image']['tmp_name'];

        $ext   = pathinfo($image, PATHINFO_EXTENSION);
        $image = uniqid() . "." . $ext;

        // hapus foto lama (kecuali default)
        if ($image_lama != "default.jpg") {
            $path = "../uploads/buku/" . $image_lama;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        // simpan foto baru
        move_uploaded_file($tmp, "../uploads/buku/" . $image);
    } else {
        // tidak upload foto baru
        $image = $image_lama;
    }

    // ================= UPDATE =================
    $query = mysqli_query(
        $connection,
        "UPDATE buku SET
            judul_buku   = '$judul',
            penerbit     = '$penerbit',
            tahun_terbit = '$tahun',
            kategori     = '$kategori',
            stok         = '$stok',
            image        = '$image'
         WHERE id_buku = '$id'"
    );

    if ($query) {
        header("Location: kelola_buku.php");
        exit;
    } else {
        echo "Gagal update data";
    }
}
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h3>Edit Buku</h3>
    <hr>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Judul Buku</label>
            <input type="text" name="judul_buku" class="form-control"
                   value="<?= $row['judul_buku'] ?>" required>
        </div>

        <div class="form-group">
            <label>Penerbit</label>
            <input type="text" name="penerbit" class="form-control"
                   value="<?= $row['penerbit'] ?>" required>
        </div>

        <div class="form-group">
            <label>Tahun Terbit</label>
            <input type="text" name="tahun_terbit" class="form-control"
                   value="<?= $row['tahun_terbit'] ?>" required>
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control"
                   value="<?= $row['kategori'] ?>" required>
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="text" name="stok" class="form-control"
                   value="<?= $row['stok'] ?>" required>
        </div>

        <div class="form-group">
            <label>Cover Saat Ini</label><br>
            <img src="../uploads/buku/<?= $row['image'] ?>" width="120">
        </div>

        <div class="form-group">
            <label>Ganti Cover (opsional)</label>
            <input type="file" name="image" class="form-control-file">
        </div>

        <button type="submit" name="simpan" class="btn btn-primary">
            Update
        </button>
        <a href="kelola_buku.php" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>

</body>
</html>
