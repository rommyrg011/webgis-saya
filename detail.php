<?php include 'templates/head.php'; ?>
  <body class="about-page">
<?php include 'templates/navbar.php'; ?>
<?php include 'koneksi.php'; ?>

<?php
                                    $id =$_GET['id_tps'];
                                    $tampil = mysqli_query($koneksi, "SELECT * FROM tps WHERE id_tps='$id'");
                                    while($data = mysqli_fetch_array($tampil)){
                                        $namatp = $data['nama_tps'];
                                        $kec = $data['kecamatan'];
                                        $alamat = $data['alamat'];
                                        $kapasitas = $data['kapasitas'];
                                        $ukuran = $data['ukuran_bangunan'];
                                        $jamop = $data['jam_operasional'];
                                        $jaman = $data['jam_angkutan'];
                                        $alat = $data['alat_angkutan'];
                                        $lat = $data['lattitude'];
                                        $long = $data['longitude'];
                                        $mapsd = $data['maps_direction'];
                                        $gambar = $data['image'];// ambil gambar dari folder
                                        if($gambar==null){
                                            //Jika tidak ada gambar
                                            $img = '<p class="no-photo">No Photo</p>';
                                        } else {
                                            //jika ada gambar
                                            $img = '<img src="images/'.$gambar.'" class="zoomable">';
                                        }
                                    
                                    ?>
    <main class="main">
      <!-- Page Title -->
      <div
        class="page-title dark-background"
        
      >
      
        <div class="container position-relative">
          <h1>INFORMASI TPS</h1>
        </div>
      </div>
      <!-- End Page Title -->

      <!-- About Section -->
    <section id="about" class="about section">

   
                                    
<style>
.zoomable:hover {
  transform: scale(1.1);
  transition: 0.3s ease;
}

.no-photo {
  text-align: right; /* Geser teks ke kanan */
  font-style: italic; /* Opsional: tambahkan gaya font jika diinginkan */
  color: #666; /* Opsional: tambahkan warna font jika diinginkan */
  font-size: 50px; /* Sesuaikan ukuran font sesuai kebutuhan */
  margin-top: 180px; /* Geser teks ke bawah dengan margin atas */
  margin-right: 80px; /* untuk menggeser kalimat no photo sedikit ke kiri */
}
.button-container {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}
.our-story, .link{
  font-size: 16px;
  font-weight: bold;
  font-style: italic;
}
img {
  border:5px solid #d8c585;
}
.btn-warning{
  font-style: italic;
  font-weight: bold;
}
</style>
                                    
<div class="container">

<div class="row position-relative">

  <div class="col-lg-7 about-img" data-aos="zoom-out" data-aos-delay="200"><?=$img;?></div>
 
  <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
    <h3 class="inner-title"><center><?=$namatp; ?></center></h3>
   
    <div class="our-story">
      <h4>Kecamatan</h4>
      <p><?=$kec ; ?></p>
      <hr>
      <h4>TPS</h4>
      <p><?=$namatp ; ?></p>
      <hr>
      <h4>Lokasi</h4>
      <p><?=$alamat ; ?></p>
      <hr>
      <h4>Kapasitas</h4>
      <p><?=$kapasitas ; ?></p>
      <hr>
      <h4>Ukuran Bangunan</h4>
      <p><?=$ukuran ; ?></p>
      <hr>
      <h4>Jam Operasional</h4>
      <p><?=$jamop ; ?></p>
      <hr>
      <h4>Jam Pengangkutan</h4>
      <p><?=$jaman ; ?></p>
      <hr>
      <h4>ALat Angkutan</h4>
      <p><?=$alat ; ?></p>
      <hr>
      <h4>Lattitude</h4>
      <p><?=$lat ; ?></p>
      <hr>
      <h4>Longitude</h4>
      <p><?=$long ; ?></p>
      <hr>
      <br>
      <div class="link">
        <!-- Tombol untuk mendapatkan arah -->
    <center><button class="btn btn-warning" onclick="getDirections()">Dapatkan Arah</button></center>
      </div>
      <script>
        // Fungsi untuk mendapatkan lokasi pengguna berada dan mengarahkan ke Google Maps
        function getDirections() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    // Koordinat pengguna
                    var userLat = position.coords.latitude;
                    var userLong = position.coords.longitude;
                    
                    // Koordinat tujuan (misalnya TPS)
                    var destinationLat = <?php echo $lat; ?>;
                    var destinationLong = <?php echo $long; ?>;
                    
                    // Membuat URL untuk arah dari lokasi pengguna ke tujuan
                    var mapsUrl = `https://www.google.com/maps/dir/?api=1&origin=${userLat},${userLong}&destination=${destinationLat},${destinationLong}&travelmode=driving`;
                    
                    // Mengarahkan pengguna ke Google Maps dengan URL
                    window.open(mapsUrl, '_blank');
                }, function(error) {
                    alert('Tidak dapat menemukan lokasi Anda.');
                });
            } else {
                alert('Geolocation tidak didukung oleh website ini.');
            }
        }
    </script>
      <br>
      <?php
    }
   ?>
      <ul>
        <li><i class="bi bi-check-circle"></i> <span>Membuang sampah pada tempatnya, aku bisa menjaga lingkungan</span></li>
        <li><i class="bi bi-check-circle"></i> <span>Mari jaga bumi kita, maka bumi akan menjaga kita</span></li>
        <li><i class="bi bi-check-circle"></i> <span>Kebersihan sebagian dari iman</span></li>
      </ul>

    </div>
  </div>

</div>

</div>
<div class="button-container">
<a href="data_tps.php" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Kembali Ke awal</a>
    </div>
</section><!-- /About Section -->
    </main>

    <?php include 'templates/footer.php'; ?>

    <?php include 'templates/js.php'; ?>

 