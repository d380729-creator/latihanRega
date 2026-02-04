<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard User - Perpustakaan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { min-height: 100vh; }
    .sidebar {
      width: 250px;
      min-height: 100vh;
    }
    .menu-link {
      display: block;
      padding: 12px 16px;
      color: #333;
      text-decoration: none;
      border-radius: 8px;
      margin-bottom: 6px;
    }
    .menu-link:hover {
      background: #0d6efd;
      color: #fff;
    }
    .book-card img {
      height: 200px;
      object-fit: cover;
    }
  </style>
</head>
<body class="bg-light">

<div class="d-flex">

  <!-- SIDEBAR -->
  <div class="sidebar bg-white p-3 shadow-sm">
    <a href="dashboard.php" class="menu-link text-danger">🚪 kembali</a>
  </div>

  <!-- KONTEN UTAMA -->
  <div class="flex-fill p-4">
    <h3 class="mb-3">📘 Buku pplg</h3>
    <p class="text-muted">Buku yang paling sering dipinjam</p>

    <div class="row g-4">
      <div class="col-md-3">
        <div class="card book-card">
          <img src="#" class="card-img-top">
          <div class="card-body">
            <h6 class="card-title">Aden Si Anak CI I O</h6>
            <p class="small text-muted">Dipinjam 987x</p>
            <a href="detail_buku.php" class="btn btn-primary btn-sm w-100">Detail</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card book-card">
          <img src="image/bacok.jpeg" class="card-img-top">
          <div class="card-body">
            <h6 class="card-title">Bacok Si Ratu Tidur</h6>
            <p class="small text-muted">Dipinjam 1x</p>
            <a href="detail_buku.php" class="btn btn-primary btn-sm w-100">Detail</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card book-card">
          <img src="image/aang.jpeg" class="card-img-top">
          <div class="card-body">
            <h6 class="card-title">Kisah Cinta Si Aang 4 Element</h6>
            <p class="small text-muted">Dipinjam 9999x</p>
            <a href="detail_buku.php" class="btn btn-primary btn-sm w-100">Detail</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card book-card">
          <img src="https://via.placeholder.com/200x300" class="card-img-top">
          <div class="card-body">
            <h6 class="card-title">Algoritma & Logika</h6>
            <p class="small text-muted">Dipinjam 76x</p>
            <a href="detail_buku.php" class="btn btn-primary btn-sm w-100">Detail</a>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>
<script>
function toggleKategori(e) {
  e.preventDefault();
  const menu = document.getElementById("kategoriMenu");
  menu.style.display = (menu.style.display === "none") ? "block" : "none";
}
</script>

</body>
</html>