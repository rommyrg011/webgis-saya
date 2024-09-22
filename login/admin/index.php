<?php
include '../function.php';
if($_SESSION['status'] =="login"){

} else {
		header('location:../');
}

$h = mysqli_query($koneksi, "select * from user");
$a = mysqli_num_rows($h);

$b = mysqli_query($koneksi, "select * from kecamatan");
$c = mysqli_num_rows($b);

$d = mysqli_query($koneksi, "select * from alat");
$e = mysqli_num_rows($d);

$f = mysqli_query($koneksi, "select * from tps");
$g = mysqli_num_rows($f);

// $h2 = mysqli_query($koneksi, "select * from peminjaman where status='dipinjam'");
// $p = mysqli_num_rows($h2);

// $h3 = mysqli_query($koneksi, "select * from peminjaman where status='kembali'");
// $pe = mysqli_num_rows($h3);
?>

<?php include './template/header.php'; ?>
<style>
    a {
        text-decoration: none;
        color: white;
    }
    a:hover{
        color: white;
    }
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
                        <h1 class="mt-3">Dashboard</h1>
                        <div class="alert alert-secondary">
                            <a class="dash" href="./">Dashboard</a>
                          </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><center>Pengguna <h1 align="center"><a href="administrator.php"><?=$a; ?></a></h1></center></div>
                                    <div class="card d-flex align-items-center justify-content-between">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><center>Kecamatan <h1 align="center"><a href="kecamatan.php"><?=$c;?></a></h1></center></div>
                                    <div class="card d-flex align-items-center justify-content-between">  
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"><center>Alat Angkut <h1 align="center"><a href="alatangkut.php"><?=$e;?></a></h1></center></div>
                                    <div class="card d-flex align-items-center justify-content-between">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"><center>TPS <h1 align="center"><a href="tps.php"><?=$g;?></a></h1></center></div>
                                    <div class="card d-flex align-items-center justify-content-between">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
        
        <?php include './template/script.php'; ?>
    </body>
</html>
