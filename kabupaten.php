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
          <h1>Kabupaten / Kota</h1>
        </div>
      </div>
      <!-- End Page Title -->

      <!-- Stats Counter Section -->
      <section id="stats-counter" class="stats-counter section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          
      <h2>Peta Kabupaten Kota Banjarmasin</h2>
       <br>
       <div id="mapid"></div>
       <br> 
       <hr width="100%" noshade size="10%">
       <br>
       <h2>Daftar Kabupaten / Kota</h2>
       <!-- Wrap table with table-responsive div for responsiveness -->
       <div class="table-responsive">
         <table id="example" class="table table-bordered table-sm" style="width:100%" data-bs-theme="dark">
          <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kecamatan</th>
                    <th>Luas Wilayah</th>
                    <th>Penduduk</th>
                    <th>Kepadatan</th>
                    <th>Lattitude</th>
                    <th>Longitude</th>
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
            
                ?>
                <tr>
                    <td><?=$i++; ?></td>
                    <td><?=$nama_kec; ?></td>
                    <td><?=$luas_kec; ?></td>
                    <td><?=$penduduk; ?></td>
                    <td><?=$kepadatan;?></td>
                    <td><?=$lattitude; ?></td>
                    <td><?=$longitude; ?></td>
                </tr>
               <?php } ?>
            </tbody>
         </table>
       </div> <!-- End of table-responsive -->
        </div>
        
      </section>
      <!-- /Stats Counter Section -->
      
    </main>

    <?php include 'templates/footer.php'; ?>

    <?php include 'templates/js.php'; ?>
