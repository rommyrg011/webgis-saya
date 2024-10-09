<?php 
include 'koneksi.php';
include 'templates/head.php'; ?>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <body class="about-page">
<?php include 'templates/navbar.php'; ?>
<style>
	/* Default style (untuk desktop/laptop) */
.chartpie {
    width: 100%;
    max-width: 900px;
    height: auto;
    margin: 0 auto;
    padding: 10px;
    box-sizing: border-box;
}

/* Untuk perangkat mobile (layar dengan lebar kurang dari 768px) */
@media (max-width: 768px) {
    .chartpie {
        width: 100%;
        max-width: 100%; /* Memastikan div memenuhi seluruh lebar layar */
        padding: 5px; /* Menyesuaikan padding agar sesuai dengan ukuran kecil */
    }
}

</style>

    <main class="main">
      <!-- Page Title -->
      <div
        class="page-title dark-background"
        style="background-image: url(assets/img/page-title-bg.jpg)"
      >
        <div class="container position-relative">
          <h1>Grafik Data TPS</h1>
        </div>
      </div>
    
    
      <section id="alt-services" class="alt-services section">
	  <div class="container section-title" data-aos="fade-up">
	  <h2>Jumlah TPS</h2>
	  <br>
<center>
      <div class="chartpie">
	  <div id="chartContainer" class="h-64" style="height:370px;"></div>
	</div>

    <script>
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                data: [{
                    type: "pie",
                    startAngle: 240,
                    yValueFormatString: "##0\" Unit\"",
                    indexLabel: "{label} {y}",
                    dataPoints: [
                        { y: 
					<?php 
					$bjm_t = mysqli_query($koneksi,"select * from tps where kecamatan='BANJARMASIN TENGAH'");
					echo mysqli_num_rows($bjm_t);
					?>, label: "Banjarmasin Tengah" },
                        { y:
					<?php 
					$bjm_ba = mysqli_query($koneksi,"select * from tps where kecamatan='BANJARMASIN BARAT'");
					echo mysqli_num_rows($bjm_ba);
					?>, label: "Banjarmasin Barat" },
                        { y: 
					<?php 
					$bjm_u = mysqli_query($koneksi,"select * from tps where kecamatan='BANJARMASIN SELATAN'");
					echo mysqli_num_rows($bjm_u);
					?>, label: "Banjarmasin Selatan" },
                        { y: 
					<?php 
					$bjm_u = mysqli_query($koneksi,"select * from tps where kecamatan='BANJARMASIN UTARA'");
					echo mysqli_num_rows($bjm_u);
						?>, label: "Banjarmasin Utara" },
                        { y: 
					<?php 
					$bjm_ti = mysqli_query($koneksi,"select * from tps where kecamatan='BANJARMASIN TIMUR'");
					echo mysqli_num_rows($bjm_ti);
					?>, label: "Banjarmasin Timur" }
                    ]
                }]
            });
            chart.render();
        }
    </script>
</center>
	  </div>
      </section>
      <!-- /Stats Counter Section -->
    </main>

    <?php include 'templates/footer.php'; ?>

    <?php include 'templates/js.php'; ?>
