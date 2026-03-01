<?php
include '../koneksi.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../font/css/font-awesome.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
       <div class="container-fluid">
  <a class="navbar-brand" href="#">SELAMAT DATANG</a>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
  </div>
</nav>

<div class="row no-gutters mt-5 vh-100">
  <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
    <ul class="nav flex-column ml-3 mb5">
  <li class="nav-item">
    <a class="nav-link active text-white" href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
    <hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="kelola_buku.php"><i class="fa fa-book" aria-hidden="true"></i> Kelola Buku</a>
    <hr class="bg-secondary"> 
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="#"><i class="fa fa-users" aria-hidden="true"></i> Kelola Anggota</a>
    <hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="#">Data Peminjam</a>
    <hr class="bg-secondary">
  </li>
</ul>
  </div>
  <div class="col-md-10 p-5 pt-2">
    <h3><i class="fa fa-users" aria-hidden="true"></i> Data Anggota</h3><hr>
    <a href="tambah_buku.php" class="btn btn-primary mb-3">
  <i class="fa fa-plus-square mr-2"></i> Tambah Buku
</a>
      <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">id anggota</th>
      <th scope="col">nama_anggota</th>
      <th scope="col">nisn</th>
      <th scope="col">alamat</th>
      <th scope="col">no telepon</th>
      <th scope="col">aksi</th>
    </tr>
  </thead>
  <tbody>
<?php
$no = 1;
$query = mysqli_query($connection, "SELECT * FROM users WHERE role='user'");

while ($row = mysqli_fetch_assoc($query)) {
?>
<tr>
  <td><?= $no++ ?></td>
  <td><?= $row['nama'] ?></td>
  <td><?= $row['nis'] ?></td>
  <td><?= $row['alamat'] ?></td>
  <td><?= $row['no_hp'] ?></td>
  <td class="text-center">
    <a href="edit_anggota.php?id=<?= $row['id_user'] ?>" class="btn btn-sm btn-success">
      Edit
    </a>
    <a href="hapus_anggota.php?id=<?= $row['id_user'] ?>" 
       class="btn btn-sm btn-danger"
       onclick="return confirm('Yakin hapus anggota ini?')">
      Hapus
    </a>
  </td>
</tr>
<?php } ?>
</tbody>


</table>

</div>

  </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>