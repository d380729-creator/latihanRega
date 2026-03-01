<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}
require_once __DIR__ . '/../koneksi.php';
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
  <a class="navbar-brand" href="#">SELAMAT DATANG users</a>
    <form class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-light my-2 my-sm-0 mr-2" type="submit">
    Search
  </button>

  <a href="../logout.php" class="btn btn-danger my-2 my-sm-0">
    Logout
  </a>
</form>

    </div>
  </div>
</nav>

<div class="row no-gutters mt-5 vh-100">
  <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
    <ul class="nav flex-column ml-3 mb5">
  <li class="nav-item">
    <a class="nav-link active text-white" href="#"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
    <hr class="bg-secondary">
  </li>
  <li class="nav-item">
  <a href="#submenuKategori" class="nav-link text-white" data-toggle="collapse" aria-expanded="false">
    <i class="fa fa-book" aria-hidden="true"></i> Kategori
    <i class="fa fa-caret-down float-right mt-1"></i>
  </a>
  <div class="collapse" id="submenuKategori">
    <ul class="nav flex-column ml-3">
      <li class="nav-item">
        <a href="manga.php" class="nav-link text-white">Manga</a>
      </li>
      <li class="nav-item">
        <a href="sekolah.php" class="nav-link text-white">Sekolah</a>
      </li>
      <li class="nav-item">
        <a href="kategori3.php" class="nav-link text-white">Kategori 3</a>
      </li>
    </ul>
  </div>
  <hr class="bg-secondary">
</li>


</ul>
  </div>
  <div class="col-md-10 p-5 pt-2">
    <h3><i class="fa fa-tachometer mr-2"></i>Daftar Buku</h3>
<hr>

<table class="table table-bordered table-striped">
<thead class="thead-dark">
<tr>
    <th>No</th>
    <th>Cover</th>
    <th>Judul</th>
    <th>Penerbit</th>
    <th>Tahun</th>
    <th>Kategori</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>

<?php
$no = 1;
$query = mysqli_query($connection, "SELECT * FROM buku");

while ($buku = mysqli_fetch_assoc($query)) {
?>
<tr>
    <td><?= $no++; ?></td>

    <td>
        <img src="../uploads/buku/<?= $buku['image'] ?>"
             width="50" height="70"
             style="object-fit:cover;border-radius:4px;">
    </td>

    <td><?= $buku['judul_buku']; ?></td>
    <td><?= $buku['penerbit']; ?></td>
    <td><?= $buku['tahun_terbit']; ?></td>
    <td><?= $buku['kategori']; ?></td>

    <td>
        <?= ($buku['stok'] > 0) 
            ? '<span class="badge badge-success">Tersedia</span>' 
            : '<span class="badge badge-danger">Habis</span>'; ?>
    </td>

    <td>
        <?php if ($buku['stok'] > 0) { ?>
            <a href="pinjam.php?id_buku=<?= $buku['id_buku']; ?>"
               class="btn btn-success btn-sm">
               Pinjam
            </a>
        <?php } else { ?>
            <button class="btn btn-secondary btn-sm" disabled>
                Tidak Bisa
            </button>
        <?php } ?>
    </td>
</tr>
<?php } ?>

</tbody>
</table>
</div>

</body>
</html>


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