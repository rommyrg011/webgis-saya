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
                        <h1 class="mt-3">Administrator</h1>
                        <div class="alert alert-secondary">
                        <a class="dash" href="./">Dashboard</a> / Administrator
                          </div>
                          <div class="col-md-12">
                            <a href="admin_tambah.php" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah</a>
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
                        <?php
                        //hapus admin
if(isset($_POST['hapusadmin'])){
    $ida = $_POST['id_user'];
    
    $h = mysqli_query($koneksi, "delete from user where id_user='$ida'");
    if($h){
        echo ' 
        <div class="alert alert-success">
        Berhasil
    </div>';
		} else {
			echo '
			<script>alert("Gagal");
			window.location.href="administrator.php"
			</script>';
        }
    }
                       
            ?>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Administrator
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama lengkap</th>
                                            <th>Username</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                    $tampiladmin = mysqli_query($koneksi, "select * from user where level='admin' order by id_user DESC");
                                    $i= 1;
                                    while($data=mysqli_fetch_array($tampiladmin)){
                                        // $idadmin = $data['id'];
                                        $nma = $data['nama_lengkap'];
                                        $user = $data['username'];
                                        $idadmin = $data['id_user'];
                                        ?>
                                        <tr>
                                            <td><?=$i++; ?></td>
                                            <td><?=$nma; ?></td>
                                            <td><?=$user; ?></td>
                                            <td>
                                            <button type="button" class="btn btn-sm btn-circle btn-danger btn-hapus">
                                                    <i class="fas fa-trash" data-bs-toggle="modal" data-bs-target="#delete<?=$idadmin;?>">
                                                </button></i>
                                            </td>
                                        </tr>
<!-- kepunyaan button Delete -->                                       
<!-- The Modal -->
<div class="modal" id="delete<?=$idadmin;?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Hapus Administrator</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form method="post">
      <div class="modal-body">
        Yakin anda ingin menghapus <?=$nma;?> ? 
        <input type="hidden" name="id_user" value="<?=$idadmin;?>">
        <br>
        <br>
        <button type="submit" class="btn btn-danger" name="hapusadmin">Hapus</button>
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
