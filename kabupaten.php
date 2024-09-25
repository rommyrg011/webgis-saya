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
       <table class="table table-striped table-sm table-bordered" data-bs-theme="dark">
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
            <!-- menampilkan data serverside processing -->
            </tbody>
         </table>
       </div> <!-- End of table-responsive -->
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
                       "url": "ajax/ajax_kabupaten.php?action=dataKecamatan",
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
                  { "data": "longitude" }
              ]  

          });
        });

    

</script>
        
      </section>
      <!-- /Stats Counter Section -->
      
    </main>

    <?php include 'templates/footer.php'; ?>

    <?php include 'templates/js.php'; ?>
    