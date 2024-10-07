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
          <h1>Tentang</h1>
        </div>
      </div>
      <!-- End Page Title -->

      <!-- Alt Services Section -->
      <section id="alt-services" class="alt-services section">
        <div class="container">
          <div class="row justify-content-around gy-4">
          
            <div
              class="features-image col-lg-6"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <img src="images/home.jpg" alt="" />
            </div>
            

            <div
              class="col-lg-5 d-flex flex-column justify-content-center"
              data-aos="fade-up"
              data-aos-delay="200"
            >
            <h3>Sistem Informasi Geografis</h3>
              <p align="justify">
              Sistem Informasi Geografis (SIG) merupakan alat yang digunakan untuk mengumpulkan,
              menganalisis, dan menampilkan data yang berhubungan dengan lokasi di permukaan bumi.
              Dengan menggunakan SIG, berbagai informasi spasial dapat dipetakan dan dianalisis 
              untuk mendukung pengambilan keputusan yang lebih baik. Dalam konteks pengelolaan sampah, 
              aplikasi SIG dapat dimanfaatkan untuk memantau, mengelola, dan mengoptimalkan penggunaan 
              Tempat Pembuangan Sampah Sementara (TPS).
              </p>
              <br>
              <h3>Tujuan Aplikasi</h3>

              <div
                class="icon-box d-flex position-relative mt-3"
                data-aos="fade-up"
                data-aos-delay="300"
              >
              <i class="bi bi-patch-check flex-shrink-0"></i>
                <div>
                  
                  <p>
                  Memetakan lokasi TPS di seluruh wilayah Kota Banjarmasin berdasarkan data dari Dinas Lingkungan Hidup.
                  </p>
                </div>
              </div>
              <!-- End Icon Box -->

              <div
                class="icon-box d-flex position-relative"
                data-aos="fade-up"
                data-aos-delay="400"
              >
                <i class="bi bi-patch-check flex-shrink-0"></i>
                <div>
                  <p>
                  Menyediakan informasi real-time mengenai kapasitas TPS, volume sampah, dan status pengangkutan untuk memantau efektivitas pengelolaan sampah.
                  </p>
                </div>
              </div>
              <!-- End Icon Box -->

              <div
                class="icon-box d-flex position-relative"
                data-aos="fade-up"
                data-aos-delay="500"
              >
              <i class="bi bi-patch-check flex-shrink-0"></i>
                <div>
                  <p>
                  Mengoptimalkan penempatan TPS baru berdasarkan analisis spasial yang mempertimbangkan aksesibilitas dan kebutuhan penduduk.
                  </p>
                </div>
              </div>

              <div
                class="icon-box d-flex position-relative"
                data-aos="fade-up"
                data-aos-delay="600"
              >
              <i class="bi bi-patch-check flex-shrink-0"></i>
                <div>
                  <p>
                  Memudahkan akses masyarakat terhadap informasi TPS terdekat melalui peta interaktif dan fitur pencarian lokasi.
                  </p>
                </div>
              </div>
              <!-- End Icon Box -->
            </div>
          </div>
        </div>
      </section>
      <!-- /Alt Services Section -->
      
    </main>

    <?php include 'templates/footer.php'; ?>

    <?php include 'templates/js.php'; ?>

 