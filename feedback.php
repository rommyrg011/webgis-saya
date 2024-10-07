<?php include 'templates/head.php'; ?>
  <body class="about-page">
<?php include 'templates/navbar.php'; ?>
<?php include 'koneksi.php'; ?>
    <main class="main">
      <!-- Page Title -->
      <div
        class="page-title dark-background"
        style="background-image: url(assets/img/page-title-bg.jpg)"
      >
        <div class="container position-relative">
          <h1>Feedback</h1>
        </div>
      </div>
      <!-- End Page Title -->

      <!-- Stats Counter Section -->
      <section id="stats-counter" class="stats-counter section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          
      <h2>Feedback</h2>
      <?php
//tambah feedback
if(isset($_POST['tfeedback'])){
	$nama_l = $_POST['nama_lengkap'];
  $ket = $_POST['keterangan'];
  $tps = $_POST['tps'];

	$feed = mysqli_query($koneksi, "insert into feedback (nama_lengkap, tps, keterangan) values
	('$nama_l', '$tps', '$ket')");
		if($feed){
      echo '
			<center> <div class="container">
        <div class="alert alert-success alert-dismissible fade show">
        <center><h4>Terimakasih atas umpan baliknya</h4></center>
    </div>
        </div>
    </center>
    <meta http-equiv="refresh" content="3; url=feedback"/>';
		} else {
			echo '
			<script>alert("Gagal");
			window.location.href="feedback"
			</script>';
		}
	}

  ?>
       <br>
       <form method="post">
              <div class="row gy-4">
                <div class="md-6">
                  <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required autocomplete="off">
                </div>

                <div class="md-6">
                  <select type="text" name="tps" class="form-select">
                    <option hidden> -- Pilih TPS --</option>
                            <?php
                            $ambil = mysqli_query($koneksi, "select * from tps");
                            while ($data = mysqli_fetch_array($ambil)) {
                                $n = $data['nama_tps'];
                            ?>
                                <option><?= $n; ?></option>
                            <?php } ?>
                  </select>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="keterangan" rows="6" placeholder="Keterangan" required autocomplete="off"></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-warning" name="tfeedback"><i class="bi bi-chat-left-dots-fill"></i> Kirim</button>
                </div>
                </form>
              </div>                
        </div>
        
      </section>
                
      <!-- /Stats Counter Section -->
      
    </main>

    <?php include 'templates/footer.php'; ?>

    <?php include 'templates/js.php'; ?>

