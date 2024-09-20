<?php
include '../function.php';
if($_SESSION['status'] =="login"){

} else {
		header('location:../');
}
?>

<?php include './template/header.php'; ?>
    <body class="sb-nav-fixed">
        <?php include './template/navbar.php'; ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <?php include './template/sidebar.php'; ?>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-3">Tambah Alat Angkut</h1>
                        <div class="alert alert-secondary">
                            Tambah Alat Angkut
                          </div>
                        
<div class="card-header mb-4">
    <div class="container mt-3">
    <form method="post">
        <div class="mb-3 mt-3">
        <label>Nama Alat :</label>
        <input type="text" class="form-control" name="nama_alat" placeholder="Nama Alat" required>
        </div>
        
        <button type="submit" class="btn btn-primary" name="tambahalat">Simpan</button>
  </form>
  <br>
</div>
                    </div>
                </main>
            </div>
        </div>
        <?php include './template/script.php'; ?>
    </body>
</html>
