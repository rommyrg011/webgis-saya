<?php
include '../function.php';
if($_SESSION['status'] =="login"){

} else {
		header('location:../');
}
?>

<?php include './template/header.php'; ?>
<style>
    .dash {
        text-decoration: none;
        color: black;
    }
    .dash:hover{
        color: blue;
    }
</style>
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
                        <h1 class="mt-3">TPS</h1>
                        <div class="alert alert-secondary">
                        <a class="dash" href="./">Dashboard</a> / TPS
                          </div>
                          <div class="col-md-12">
                            <a href="tps_tambah" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah</a>
                        </div>

                        <script>
                            //membuat alert auto close
                            window.setTimeout(function() {
                            $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove(); 
                            });
                        }, 2000);

                            
                        </script>

<?php
                                //jika berhasil insert
                        if(isset($_SESSION['notif'])){
                            
                            ?>
                            <div class="alert alert-success">
                                <?php echo $_SESSION['notif']; ?>
                            </div>
                            <!-- <meta http-equiv="refresh" content="2; url=kodeakses.php"> -->

                        <?php
                        unset($_SESSION['notif']);
                        }

//edit stock barang
if(isset($_POST['editstock'])){
    $idbr = $_POST['id_barang'];
    $nama = $_POST['namabarang'];
    $stt = $_POST['stock'];
    $stg = $_POST['stock_g'];
    $har = $_POST['harga'];
  
    $updatestockbarang = mysqli_query($koneksi, "update stockbarang set namabarang='$nama', stock='$stt', stock_g='$stg', harga='$har' where id_barang='$idbr'");
    if($updatestockbarang){
        echo ' 
        <div class="alert alert-success">
        Berhasil di edit
    </div>';
    } else {
      echo '
          <script>alert("Gagal");
          window.location.href="stock.php"
          </script>';
    }
  }

  if(isset($_POST['hapusstock'])){
    $ida = $_POST['id_barang'];
    
    $h = mysqli_query($koneksi, "delete from stockbarang where id_barang='$ida'");
    if($h){
        echo ' 
        <div class="alert alert-success">
        Berhasil Dihapus
    </div>';
		} else {
			echo '
			<script>alert("Gagal");
			window.location.href="stock.php"
			</script>';
        }
    }
                        ?>

                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data TPS
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kecamatan</th>
                                            <th>Tipe</th>
                                            <th>Nama TPS</th>
                                            <th>Lokasi</th>
                                            <th>Kapasitas</th>
                                            <th>Ukuran</th>
                                            <th>Operasional</th>
                                            <th>Jam Angkut</th>
                                            <th>Alat Angkut</th>
                                            <th>Lattitude</th>
                                            <th>Longitude</th>
                                            <th>Maps Direction</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                    $tampiltps = mysqli_query($koneksi, "select * from tps order by id_tps DESC");
                                    $i= 1;
                                    while($data=mysqli_fetch_array($tampiltps)){
                                        $idtps = $data['id_tps'];
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
                                        
                                    
                                        ?>
                                        <tr>
                                            <td><?=$i++; ?></td>
                                            <td><?=$kec; ?></td>
                                            <td><?=$tipe; ?></td>
                                            <td><?=$namatps; ?></td>
                                            <td>
                                            <?php if(strlen($alamat) > 30){
                                                echo substr($alamat, 0, 30) . '...';
                                            }else {
                                                echo $alamat;
                                            } $alamat; ?>
                                            </td>
                                            <td><?=$kapasitas; ?></td>
                                            <td><?=$ukuran; ?></td>
                                            <td><?=$jamop; ?></td>
                                            <td><?=$jaman; ?></td>
                                            <td><?=$alat; ?></td>
                                            <td><?=$lat; ?></td>
                                            <td><?=$long; ?></td>
                                            <td><?php if(strlen($mapsd) > 35){
                                                echo substr($mapsd, 0, 35) . '...';
                                            }else {
                                                echo $mapsd;
                                            } $mapsd; ?></td>
                                            <td></td>
                                        </tr>                                  
<!-- The Modal -->
<div class="modal" id="edit<?=$id_barang;?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Stock Barang</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form method="post">
      <div class="modal-body">
        <label>Nama Barang :</label>
        <input type="text" name="namabarang" value="<?=$namabarang;?>" class="form-control mb-2" required>
        <label>Stock Beruntung :</label>
        <input type="number" name="stock" value="<?= $stock;?>" class="form-control mb-2" required>
        <label for="">Stock Gambut</label>
        <input type="number" name="stock_g" class="form-control mb-2" value="<?=$stock_g; ?>" required>
        <label> Harga :</label>
        <input type="text" name="harga" value="<?= $harga;?>" class="form-control mb-2" required>
        <input type="hidden" name="id_barang" value="<?=$id_barang;?>">
        <button type="submit" class="btn btn-primary" name="editstock">Submit</button>
      </div>
</form>
        </div>
            </div>
                </div>

                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <?php include './template/script.php'; ?>
    </body>
</html>
