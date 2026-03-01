<?php
require_once __DIR__ . '/../koneksi.php';

$id = $_GET['id'];

// ambil data user lama
$data = mysqli_query($connection, "SELECT * FROM users WHERE id_user='$id'");
$row  = mysqli_fetch_assoc($data);

// cek jika form disubmit
if(isset($_POST['simpan'])) {
    $nama   = mysqli_real_escape_string($connection, $_POST['nama']);
    $nis    = mysqli_real_escape_string($connection, $_POST['nis']);
    $alamat = mysqli_real_escape_string($connection, $_POST['alamat']);
    $no_hp  = mysqli_real_escape_string($connection, $_POST['no_hp']);

    // query update
    $query = mysqli_query(
        $connection,
        "UPDATE users SET
            nama   = '$nama',
            nis    = '$nis',
            alamat = '$alamat',
            no_hp  = '$no_hp'
         WHERE id_user = '$id'"
    );

    if ($query) {
        header("Location: kelola_anggota.php");
        exit;
    } else {
        echo "Gagal update data: " . mysqli_error($connection);
    }
}
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Anggota</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h3>Edit Anggota</h3>
    <hr>

    <form method="POST">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control"
                   value="<?= $row['nama'] ?>" required>
        </div>

        <div class="form-group">
            <label>NIS</label>
            <input type="text" name="nis" class="form-control"
                   value="<?= $row['nis'] ?>" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required><?= $row['alamat'] ?></textarea>
        </div>

        <div class="form-group">
            <label>No. HP</label>
            <input type="text" name="no_hp" class="form-control"
                   value="<?= $row['no_hp'] ?>" required>
        </div>

        <button type="submit" name="simpan" class="btn btn-primary">
            Update
        </button>
        <a href="kelola_anggota.php" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>

</body>
</html>
