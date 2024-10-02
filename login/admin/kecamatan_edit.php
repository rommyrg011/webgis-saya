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

.zoomx {
    width: 180px;
    border: 2px solid black;
}
.zoomx:hover {
    transform: scale(1.5);
    transition: 0.3s ease;
}
</style>
<?php
$id_kec = $_GET['id'];
$tampilkec = mysqli_query($koneksi, "select * from kecamatan where id_kec='$id_kec' order by id_kec DESC");
                                    $i= 1;
                                    while($data=mysqli_fetch_array($tampilkec)){
                                        $nama_kec = $data['nama_kec'];
                                        $luas_w = $data['luas_w'];
                                        $penduduk = $data['penduduk'];
                                        $kepadatan = $data['kepadatan'];
                                        $lattitude = $data['lattitude'];
                                        $longitude = $data['longitude'];
                                        $id_kec = $data['id_kec'];
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
                        <h1 class="mt-3">Edit Kecamatan</h1>
                        <div class="alert alert-secondary">
                            Edit Kecamatan
                          </div>
                        
<div class="card-header mb-4">
    <div class="container mt-3">
    <form method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="mb-3 mt-3">
        <input type="hidden" name="id_kec" value="<?=$id_kec;?>">
        <label>Kecamatan :</label>
        <input type="text" class="form-control" name="nama_kec" placeholder="Kecamatan" value="<?=$nama_kec;?>" style="text-transform: uppercase;" required>
        </div>
        
        <div class="mb-3">
        <label>Luas Wilayah :</label>
        <input type="text" class="form-control" name="luas_w" placeholder="Luas Wilayah" value="<?=$luas_w;?>" required>
        </div>

        <div class="mb-3">
        <label>Penduduk :</label>
        <input type="text" class="form-control" name="penduduk" placeholder="Penduduk" value="<?=$penduduk;?>" required>
        </div>

        <div class="mb-3">
        <label>Kepadatan :</label>
        <input type="text" class="form-control" name="kepadatan" placeholder=Kepadatan value="<?=$kepadatan;?>" required>
        </div>

        <div class="mb-3">
        <label>Lattitude:</label>
        <input type="text" class="form-control" name="lattitude" placeholder="Lattitude" value="<?=$lattitude;?>" required>
        </div>

        <div class="mb-3">
        <label>Longitude:</label>
        <input type="text" class="form-control" name="longitude" placeholder="Longitude" value="<?=$longitude;?>" required>
        </div>

        <button type="submit" class="btn btn-primary" name="editkecamatan">Simpan</button>
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
