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
                        <h1 class="mt-3">Kecamatan</h1>
                        <div class="alert alert-secondary">
                        <a class="dash" href="./">Dashboard</a> / Kecamatan
                          </div>
                          <div class="col-md-12">
                            <a href="kecamatan_tambah" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah</a>
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

//edit kecamatan
if(isset($_POST['editkecamatan'])){
    $nama_kec = $_POST['nama_kec'];
    $luas_w = $_POST['luas_w'];
    $penduduk = $_POST['penduduk'];
    $kepadatan = $_POST['kepadatan'];
    $lattitude = $_POST['lattitude'];
    $longitude = $_POST['longitude'];
    $id_k = $_POST['id_kec'];
  
    $editkec = mysqli_query($koneksi, "update kecamatan set nama_kec = '$nama_kec', luas_w = '$luas_w', penduduk = '$penduduk',
    kepadatan = '$kepadatan', lattitude = '$lattitude', longitude ='$longitude' where id_kec = '$id_k'");
    if($editkec){
        echo ' 
        <div class="alert alert-success">
        Berhasil di edit
    </div>';
    } else {
      echo '
          <script>alert("Gagal");
          window.location.href="kecamatan"
          </script>';
    }
  }

  if(isset($_POST['hapuskecamatan'])){
    $idk = $_POST['id_kec'];
    
    $h = mysqli_query($koneksi, "delete from kecamatan where id_kec='$idk'");
    if($h){
        echo ' 
        <div class="alert alert-success">
        Berhasil Dihapus
    </div>';
		} else {
			echo '
			<script>alert("Gagal");
			window.location.href="kecamatan"
			</script>';
        }
    }
                        ?>

                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Kecamatan
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kecamatan</th>
                                            <th>Luas Wilayah</th>
                                            <th>Penduduk</th>
                                            <th>Kepadatan</th>
                                            <th>Lattitude</th>
                                            <th>Longitude</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                    $tampilkec = mysqli_query($koneksi, "select * from kecamatan order by id_kec DESC");
                                    $i= 1;
                                    while($data=mysqli_fetch_array($tampilkec)){
                                        $nama_kec = $data['nama_kec'];
                                        $luas_kec = $data['luas_w'];
                                        $penduduk = $data['penduduk'];
                                        $kepadatan = $data['kepadatan'];
                                        $lattitude = $data['lattitude'];
                                        $longitude = $data['longitude'];
                                        $id_ke = $data['id_kec'];
                                    
                                        ?>
                                        <tr>
                                            <td><?=$i++; ?></td>
                                            <td><?=$nama_kec; ?></td>
                                            <td><?=$luas_kec; ?></td>
                                            <td><?=$penduduk; ?></td>
                                            <td><?=$kepadatan;?></td>
                                            <td><?=$lattitude; ?></td>
                                            <td><?=$longitude; ?></td>
                                            <td><button type="button" class="btn btn-sm btn-circle btn-warning">
                                                        <i class="fas fa-edit" data-bs-toggle="modal" data-bs-target="#editk<?= $id_ke; ?>">
                                                    </button></i>
                                                    <button type="button" class="btn btn-sm btn-circle btn-danger btn-hapus">
                                                        <i class="fas fa-trash" data-bs-toggle="modal" data-bs-target="#delete<?= $id_ke; ?>">
                                                    </button></i></td>
                                        </tr>                                  
<!-- The Modal -->
<div class="modal" id="editk<?= $id_ke;?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Kecamatan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form method="post">
      <div class="modal-body">
        <input type="hidden" name="id_kec" value="<?=$id_ke;?>"> 
        <label>Nama Kecamatan :</label>
        <input type="text" name="nama_kec" value="<?=$nama_kec;?>" class="form-control mb-2" required>

        <label>Luas Wilayah :</label>
        <input type="text" name="luas_w" value="<?= $luas_kec;?>" class="form-control mb-2" required>


        <label> Penduduk :</label>
        <input type="text" name="penduduk" value="<?= $penduduk;?>" class="form-control mb-2" required>

        <label> Kepadatan :</label>
        <input type="text" name="kepadatan" value="<?= $kepadatan;?>" class="form-control mb-2" required>

        <label> Lattitude :</label>
        <input type="text" name="lattitude" value="<?= $lattitude;?>" class="form-control mb-2" required>

        <label> Longitude :</label>
        <input type="text" name="longitude" value="<?= $longitude;?>" class="form-control mb-2" required>
        
        <button type="submit" class="btn btn-primary" name="editkecamatan">Submit</button>
      </div>
</form>
        </div>
            </div>
                </div>

<!-- The Modal -->
<div class="modal" id="delete<?=$id_ke;?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Hapus Kecamatan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form method="post">
      <div class="modal-body">
        Yakin anda ingin menghapus <?=$nama_kec;?> ? 
        <input type="hidden" name="id_kec" value="<?=$id_ke;?>">
        <br>
        <br>
        <button type="submit" class="btn btn-danger" name="hapuskecamatan">Hapus</button>
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
