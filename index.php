<?php include 'templates/head.php'; ?>
  <body class="index-page">
    <?php include 'templates/navbar.php'; ?>
    
    <?php
    echo "
    <script type='text/javascript'>
    //untuk muncul berulang - ulang
        // window.onload = function() {
        //     var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
        //         backdrop: 'static',
        //         keyboard: false
        //     });
        //     myModal.show();
        // };
        // end muncul berulang

// window.onload = function() {
//   // Cek apakah browser mendukung localStorage
//     if (typeof(Storage) !== 'undefined') {
    
//   // Periksa apakah modal sudah pernah ditampilkan
//     if (!localStorage.getItem('modalShown')) {
//     var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
//       backdrop: 'static',
//       keyboard: false
//       });
//       myModal.show();

//   // Set 'modalShown' di localStorage agar modal tidak muncul lagi
//     localStorage.setItem('modalShown', 'true');
//     }
//   } else {
//     console.error('Browser tidak mendukung localStorage.');
//   }
//     };

window.onload = function() {
  // Cek apakah browser mendukung localStorage
  if (typeof(Storage) !== 'undefined') {
    
    // Dapatkan waktu saat ini
    var now = new Date().getTime();
    
    // Periksa apakah modal sudah pernah ditampilkan
    var lastShown = localStorage.getItem('lastModalShown');

    // Jika modal belum pernah ditampilkan atau sudah lebih dari 24 jam sejak terakhir kali ditampilkan
    if (!lastShown || (now - lastShown) > 2 * 60 * 60 * 1000) { // 24 jam dalam milidetik
      
      // Tampilkan modal
      var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
        backdrop: 'static',
        keyboard: false
      });
      myModal.show();

      // Set waktu sekarang di localStorage sebagai 'lastModalShown'
      localStorage.setItem('lastModalShown', now);
    }
  } else {
    console.error('Browser tidak mendukung localStorage.');
  }
};
    

    // localStorage.removeItem('modalShown'); = ini untuk membersihkan localStorage / menguji ulang 
    // localStorage.removeItem('lastModalShown'); = ini untuk membersihkan localStorage / menguji ulang yang telah di set 24 jam


    
    </script>";
    include 'koneksi.php';
    $h1 = mysqli_query($koneksi, "select * from kecamatan");
    $h2 = mysqli_num_rows($h1);

    $h3 = mysqli_query($koneksi, "select * from tps");
    $h4 = mysqli_num_rows($h3);
?>
<style>
  h1{
    color : white;
  }
  .large-icon {
    font-size: 50px; /* Sesuaikan ukuran sesuai kebutuhan */
  }

  /* Base styles for the container */
.col-lg-6.text-center h2 {
  font-size: 2rem; /* Default font size for h2 */
  margin-bottom: 1rem; /* Space below the heading */
}

.col-lg-6.text-center p {
  font-size: 2rem; /* Default font size for paragraphs */
  line-height: 1.6; /* Line height for readability */
}

/* Responsive styles for small devices (phones, up to 576px) */
@media (max-width: 576px) {
  .col-lg-6.text-center h2 {
    font-size: 1.5rem; /* Reduce font size for h2 on small screens */
  }

  .col-lg-6.text-center p {
    font-size: 0.9rem; /* Reduce font size for p on small screens */
  }
}

/* Responsive styles for medium devices (tablets, 576px to 768px) */
@media (min-width: 576px) and (max-width: 768px) {
  .col-lg-6.text-center h2 {
    font-size: 1.75rem; /* Slightly reduce font size for tablets */
  }

  .col-lg-6.text-center p {
    font-size: 1rem; /* Adjust font size for p on tablets */
  }
}

/* Responsive styles for larger devices (desktops, 768px and up) */
@media (min-width: 768px) {
  .col-lg-6.text-center h2 {
    font-size: 2rem; /* Base font size for h2 on larger screens */
  }

  .col-lg-6.text-center p {
    font-size: 1rem; /* Base font size for p on larger screens */
  }
}


</style>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selamat Datang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Selamat Datang
      Ini adalah aplikasi tps kota banjarmasin
      </div>
    </div>
  </div>
</div>

    <main class="main">
      <!-- Hero Section -->
      <section id="hero" class="hero section dark-background">
        <div class="info d-flex align-items-center">
          <div class="container">
            <div
              class="row justify-content-center"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <div class="col-lg-6 text-center">
                <h2>Selamat Datang di Sistem Informasi Geografis</h2>
                <p>
                  Temukan TPS terdekat dari lokasi anda tinggal
                </p>
                
              </div>
            </div>
          </div>
        </div>

        <div
          id="hero-carousel"
          class="carousel slide"
          data-bs-ride="carousel"
          data-bs-interval="5000"
        >
          <div class="carousel-item">
            <img src="assets/img/kom-taekwondo.jpg" alt="" />
          </div>

          <div class="carousel-item active">
            <img src="assets/img/pasar-cemara.jpg" alt="" />
          </div>

          <div class="carousel-item">
            <img src="assets/img/perdagangan.jpg" alt="" />
          </div>

          <a
            class="carousel-control-prev"
            href="#hero-carousel"
            role="button"
            data-bs-slide="prev"
          >
            <span
              class="carousel-control-prev-icon bi bi-chevron-left"
              aria-hidden="true"
            ></span>
          </a>

          <a
            class="carousel-control-next"
            href="#hero-carousel"
            role="button"
            data-bs-slide="next"
          >
            <span
              class="carousel-control-next-icon bi bi-chevron-right"
              aria-hidden="true"
            ></span>
          </a>
        </div>
      </section>

       <!-- Stats Counter Section -->
    <section id="stats-counter" class="stats-counter section">

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row gy-4">

  <div class="col-xl-6 col-md-6">
    <div class="card bg-success text-white mb-4">
      <div class="card-body"><center><h1>KECAMATAN</h1> <h1 align="center"><a href="kabupaten.php"><?=$h2; ?></a></h1></center></div>
        <div class="card d-flex align-items-center justify-content-between">
      </div>
    </div>
  </div>

  <div class="col-xl-6 col-md-6">
    <div class="card bg-primary text-white mb-4">
      <div class="card-body"><center><h1>TPS</h1><h1 align="center"><a href="data_tps.php"><?=$h4; ?></a></h1></center></div>
        <div class="card d-flex align-items-center justify-content-between">
      </div>
    </div>
  </div>

    

  </div>

</div>

</section><!-- /Stats Counter Section -->

<?php include 'templates/footer.php'; ?>

    <?php include 'templates/js.php'; ?>
