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
                        ?>

                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Kecamatan
                            </div>
                            <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-striped table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kecamatan</th>
                                            <th>Luas Wilayah</th>
                                            <th>Penduduk</th>
                                            <th>Kepadatan</th>
                                            <th>Lattitude</th>
                                            <th>Longitude</th>
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
                       "url": "ajax/ajax_kecamatan?action=dataKecamatan",
                       "dataType": "json",
                       "type": "POST"
                     },
              "columns": [
                  { "data": "no" },
                  { "data": "nama_kec" },
                  { "data": "luas_w" },
                  { "data": "penduduk" },
                  { "data": "kepadatan" },
                  { "data": "lattitude" },
                  { "data": "longitude" },
                  { "data": "aksi" }
              ]  

          });
        });

</script>
        <?php include './template/script.php'; ?>
    </body>
</html>
