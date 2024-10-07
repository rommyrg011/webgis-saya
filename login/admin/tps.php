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

    .dash {
        text-decoration: none;
        color: black;
    }
    .dash:hover {
        color: blue;
    }
	.gambar {
    width: 100px;
    border: 2px solid black;
    }
    .gambar:hover {
    transform: scale(1.9);
    transition: 0.3s ease;
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
                        ?>

                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data TPS
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                            <table class="table table-striped table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>foto</th>
                                            <th>Tipe</th>
                                            <th>Kecamatan</th>
                                            
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
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script>
      
      $(function(){
           $('.table').DataTable({
              "processing": true,
              "serverSide": true,
              "ajax":{
                       "url": "ajax/ajax_tps?action=dataTps",
                       "dataType": "json",
                       "type": "POST"
                     },
              "columns": [
                  { "data": "no" },
                  { "data": "image" },
                  { "data": "tipe" },
                  { "data": "nama_tps" },
                  { "data": "kecamatan" },
                  { "data": "alamat" },
                  { "data": "kapasitas" },
                  { "data": "ukuran_bangunan" },
                  { "data": "jam_operasional" },
                  { "data": "alat_angkutan" },
                  { "data": "jam_angkutan" },
                  { "data": "lattitude" },
                  { "data": "longitude" },
                  { "data": "maps_direction" },
                  { "data": "aksi" }
              ]  

          });
        });

</script>
        <?php include './template/script.php'; ?>
    </body>
</html>
