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
                        <h1 class="mt-3">Feedback</h1>
                        <div class="alert alert-secondary">
                        <a class="dash" href="./">Dashboard</a> / Feedback
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
// hapus feedback
if(isset($_POST['hapusfeed'])){
    $ida = $_POST['id_feedback'];
    
    $h = mysqli_query($koneksi, "delete from feedback where id_feedback='$ida'");
    if($h){
        echo ' 
        <div class="alert alert-success">
        Berhasil
    </div>';
		} else {
			echo '
			<script>alert("Gagal");
			window.location.href="feedback"
			</script>';
        }
    }
                       
            ?>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Feedback
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama lengkap</th>
                                            <th>Nama TPS</th>
                                            <th>Saran / Masukan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                    $tampilfeed = mysqli_query($koneksi, "select * from feedback order by id_feedback DESC");
                                    $i= 1;
                                    while($data=mysqli_fetch_array($tampilfeed)){
                                        // $idf = $data['id'];
                                        $nma = $data['nama_lengkap'];
                                        $tps = $data['tps'];
                                        $feed = $data['keterangan'];
                                        $idf = $data['id_feedback'];
                                        ?>
                                        <tr>
                                            <td><?=$i++; ?></td>
                                            <td><?=$nma; ?></td>
                                            <td><?=$tps; ?></td>
                                            <td><?=$feed; ?></td>
                                            <td>
                                            <button type="button" class="btn btn-sm btn-circle btn-danger btn-hapus">
                                                    <i class="fas fa-trash" data-bs-toggle="modal" data-bs-target="#delete<?=$idf;?>">
                                                </button></i>
                                            </td>
                                        </tr>
<!-- kepunyaan button Delete -->                                       
<!-- The Modal -->
<div class="modal" id="delete<?=$idf;?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Hapus Feedback</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form method="post">
      <div class="modal-body">
        Yakin anda ingin menghapus <?=$nma;?> ? 
        <input type="hidden" name="id_feedback" value="<?=$idf;?>">
        <br>
        <br>
        <button type="submit" class="btn btn-danger" name="hapusfeed">Hapus</button>
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
