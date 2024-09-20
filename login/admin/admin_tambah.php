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
                        <h1 class="mt-3">Tambah Administrator</h1>
                        <div class="alert alert-secondary">
                            Tambah Administrator
                          </div>
                        
<div class="card-header mb-4">
    <div class="container mt-3">
    <form method="post">
        <div class="mb-3 mt-3">
        <label>Nama Lengkap :</label>
        <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required>
        </div>
        
        <div class="mb-3">
        <label>Username :</label>
        <input type="text" class="form-control" name="username" placeholder="Username" required>
        </div>
        <div class="mb-3">
        <label>Password :</label>
        <input type="password" class="form-control" name="password" placeholder="password" required>
        </div>
        <input type="hidden" name="level" value="admin">
        <button type="submit" class="btn btn-primary" name="tambahadmin">Simpan</button>
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
