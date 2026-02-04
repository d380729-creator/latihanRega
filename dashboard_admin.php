<?php
session_start();
if(!isset($_SESSION['email']) || $_SESSION['role']!="admin"){
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { min-height: 100vh; }
.sidebar { width: 250px; min-height: 100vh; }
.menu-link { display: block; padding: 12px 16px; color: #333; text-decoration: none; border-radius: 8px; margin-bottom: 6px; }
.menu-link:hover { background: #0d6efd; color: #fff; }
.book-card img { height: 200px; object-fit: cover; }
</style>
</head>
<body class="bg-light">
<div class="d-flex">
  <div class="sidebar bg-white p-3 shadow-sm">
    <h5 class="mb-4">📚 Menu Admin</h5>
    <a href="dashboard_admin.php" class="menu-link">🏠 Dashboard</a>
    <a href="#" class="menu-link" onclick="toggleKategori(event)">📖 Kategori</a>
    <div id="kategoriMenu" class="ms-3" style="display:none;">
      <a href="pplg.php" class="menu-link">📘 pplg</a>
      <a href="buku.php?kategori=komputer" class="menu-link">💻 Komputer</a>
      <a href="buku.php?kategori=sejarah" class="menu-link">📜 Sejarah</a>
    </div>
    <a href="peminjaman.php" class="menu-link">📕 Peminjaman</a>
    <a href="riwayat.php" class="menu-link">🕘 Riwayat</a>
    <a href="logout.php" class="menu-link text-danger">🚪 Logout</a>
  </div>

  <div class="flex-fill p-4">
    <h3>Selamat Datang Admin: <?php echo $_SESSION['email']; ?></h3>
    <hr>
    <h4>📘 Buku Populer</h4>
    <div class="row g-4 mt-2">
      <!-- Contoh buku, bisa ditambah -->
      <div class="col-md-3">
        <div class="card book-card">
          <img src="image/besot.jpeg" class="card-img-top">
          <div class="card-body">
            <h6 class="card-title">Aden Si Anak CI I O</h6>
            <p class="small text-muted">Dipinjam 987x</p>
            <a href="detail_buku.php" class="btn btn-primary btn-sm w-100">Detail</a>
          </div>
        </div>
      </div>
      <!-- Buku lainnya sama seperti contoh -->
    </div>
  </div>
</div>
<script>
function toggleKategori(e){
  e.preventDefault();
  const menu=document.getElementById("kategoriMenu");
  menu.style.display=(menu.style.display==="none")?"block":"none";
}
</script>
</body>
</html>
