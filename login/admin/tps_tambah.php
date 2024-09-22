<?php
include '../function.php';
if($_SESSION['status'] =="login"){

} else {
		header('location:../');
}
?>
<style>
    p {
        font-size: 12px;
        font-style: italic;
        font-weight: bold;
        color: red;
    }
</style>

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
                        <h1 class="mt-3">Tambah tps</h1>
                        <div class="alert alert-secondary">
                            Tambah tps
                          </div>
                        
<div class="card-header mb-4">
    <div class="container mt-3">
    <form method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="mb-3 mt-3">
        <label>Nama Kecamatan :</label>
        <input type="text" class="form-control" name="kecamatan" placeholder="Nama Kecamatan" style="text-transform: uppercase;" required>
        </div>
        
        <div class="mb-3">
        <label>Nama TPS :</label>
        <input type="text" class="form-control" name="nama_tps" placeholder="Nama TPS" required>
        </div>

        <div class="mb-3">
        <label>Lokasi :</label>
        <input type="text" class="form-control" name="alamat" placeholder="Lokasi" required>
        </div>

        <div class="mb-3">
        <label>Kapasitas:</label>
        <input type="text" class="form-control" name="kapasitas" placeholder="Kapasitas" required>
        </div>
        <div class="mb-3">
        <label>Ukuran_bangunan:</label>
        <input type="text" class="form-control" name="ukuran_bangunan" placeholder="Ukuran Bangunan" required>
        </div>
        <div class="mb-3">
        <label>Jam Operasional:</label>
        <input type="text" class="form-control" name="jam_operasional" placeholder="Jam Operasional" required>
        </div>
        <div class="mb-3">
        <label>Jam Angkutan:</label>
        <input type="text" class="form-control" name="jam_angkutan" placeholder="Jam Angkutan" required>
        </div>
        <div class="mb-3">
        <label>Alat Angkutan:</label>
        <input type="text" class="form-control" name="alat_angkutan" placeholder="Alat Angkutan" required>
        </div>
        <div class="mb-3">
        <label>Lattitude:</label>
        <input type="text" class="form-control" name="lattitude" placeholder="Lattitude" required>
        </div>
        <div class="mb-3">
        <label>Longitude:</label>
        <input type="text" class="form-control" name="longitude" placeholder="Longitude" required>
        </div>
        <div class="mb-3">
        <label>Maps Direction:</label>
        <!-- <p>Catatan ! Jika linknya terlalu panjang bisa di perpendek melalui Short Url</p> -->
        <input type="text" class="form-control" name="maps_direction" placeholder="Maps Direction" required>
        </div>
        <label>Foto TPS:</label>
        <input type="file" name="file" class="form-control mb-3">
        </div>
        <button type="submit" class="btn btn-primary" name="tambahtps">Simpan</button>
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
