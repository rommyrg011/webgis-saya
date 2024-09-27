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
$id_tps = $_GET['id'];
$tampiltps = mysqli_query($koneksi, "select * from tps where id_tps= '$id_tps'");
while($data=mysqli_fetch_array($tampiltps)){
    $kec = $data['kecamatan'];
    $namatps = $data['nama_tps'];
    $alamat = $data['alamat'];
    $kapasitas = $data['kapasitas'];
    $ukuran = $data['ukuran_bangunan'];
    $jamop = $data['jam_operasional'];
    $jaman = $data['jam_angkutan'];
    $alat = $data['alat_angkutan'];
    $lat = $data['lattitude'];
    $long = $data['longitude'];
    $mapsd = $data['maps_direction'];
    $tipe = $data['tipe'];

    $gambar = $data['image'];// ambil gambar dari folder
    if($gambar==null){
    //Jika tidak ada gambar
        $img = 'No Photo';
    } else {
                                            //jika ada gambar
        $img = '<img src="../../images/'.$gambar.'" class="zoomx">';
    }
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
                        <h1 class="mt-3">Edit tps</h1>
                        <div class="alert alert-secondary">
                            Edit tps
                          </div>
                        
<div class="card-header mb-4">
    <div class="container mt-3">
    <form method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="mb-3 mt-3">
        <label>Nama Kecamatan :</label>
        <input type="text" class="form-control" name="kecamatan" placeholder="Nama Kecamatan" value="<?=$kec;?>" style="text-transform: uppercase;" required>
        </div>
        
        <div class="mb-3">
        <label>Tipe :</label>
        <input type="text" class="form-control" name="tipe" placeholder="Nama TPS" value="<?=$tipe;?>" required>
        </div>

        <div class="mb-3">
        <label>Nama TPS :</label>
        <input type="text" class="form-control" name="nama_tps" placeholder="Nama TPS" value="<?=$namatps;?>" required>
        </div>

        <div class="mb-3">
        <label>Lokasi :</label>
        <input type="text" class="form-control" name="alamat" placeholder="Lokasi" value="<?=$alamat;?>" required>
        </div>

        <div class="mb-3">
        <label>Kapasitas:</label>
        <input type="text" class="form-control" name="kapasitas" placeholder="Kapasitas" value="<?=$kapasitas;?>" required>
        </div>
        <div class="mb-3">
        <label>Ukuran_bangunan:</label>
        <input type="text" class="form-control" name="ukuran_bangunan" placeholder="Ukuran Bangunan" value="<?=$ukuran;?>" required>
        </div>
        <div class="mb-3">
        <label>Jam Operasional:</label>
        <input type="text" class="form-control" name="jam_operasional" placeholder="Jam Operasional" value="<?=$jamop;?>" required>
        </div>
        <div class="mb-3">
        <label>Jam Angkutan:</label>
        <input type="text" class="form-control" name="jam_angkutan" placeholder="Jam Angkutan" value="<?=$jaman;?>" required>
        </div>
        <div class="mb-3">
        <label>Alat Angkutan:</label>
        <select type="text" class="form-select" name="alat_angkutan">
            <option hidden><?=$alat;?></option>
            <?php
            $ambilangkut = mysqli_query($koneksi, "select * from alat");
            while($aa=mysqli_fetch_array($ambilangkut)){
                $na = $aa['nama_alat'];
                ?>
                <option><?=$na;?></option>
            <?php } ?>
            
        </select>
        </div>
        <div class="mb-3">
        <label>Lattitude:</label>
        <input type="text" class="form-control" name="lattitude" placeholder="Lattitude" value="<?=$lat;?>" required>
        </div>
        <div class="mb-3">
        <label>Longitude:</label>
        <input type="text" class="form-control" name="longitude" placeholder="Longitude" value="<?=$long;?>" required>
        </div>
        <div class="mb-3">
        <label>Maps Direction:</label>
        <!-- <p>Catatan ! Jika linknya terlalu panjang bisa di perpendek melalui Short Url</p> -->
        <input type="text" class="form-control" name="maps_direction" placeholder="Maps Direction" value="<?=$mapsd;?>" required>
        </div>
        <label class="mb-2">Foto TPS:</label>
        <br>
        <?=$img;?>
        <input type="file" name="file" class="form-control mt-3">
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
