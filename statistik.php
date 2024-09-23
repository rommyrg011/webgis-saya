<?php 
include 'koneksi.php';
include 'templates/head.php'; ?>
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
          <h1>Grafik</h1>
        </div>
      </div>
      <!-- End Page Title -->

      <!-- Stats Counter Section -->
      <section id="stats-counter" class="stats-counter section">
<center>
      <div class="chartpie">
		<canvas id="myChart"></canvas>
	</div>

    <script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',  // Ubah tipe chart menjadi 'pie chart' 
			data: {
				labels: ["BANJARMASIN TENGAH", "BANJARMASIN TIMUR", "BANJARMASIN BARAT", "BANJARMASIN SELATAN", "BANJARMASIN UTARA"],
				datasets: [{
					
					data: [
					<?php 
					$bjm_t = mysqli_query($koneksi,"select * from tps where kecamatan='BANJARMASIN TENGAH'");
					echo mysqli_num_rows($bjm_t);
					?>, 
					<?php 
					$bjm_ti = mysqli_query($koneksi,"select * from tps where kecamatan='BANJARMASIN TIMUR'");
					echo mysqli_num_rows($bjm_ti);
					?>, 
					<?php 
					$bjm_ba = mysqli_query($koneksi,"select * from tps where kecamatan='BANJARMASIN BARAT'");
					echo mysqli_num_rows($bjm_ba);
					?>,  
					<?php 
					$bjm_u = mysqli_query($koneksi,"select * from tps where kecamatan='BANJARMASIN SELATAN'");
					echo mysqli_num_rows($bjm_u);
					?>,
					<?php 
					$bjm_u = mysqli_query($koneksi,"select * from tps where kecamatan='BANJARMASIN UTARA'");
					echo mysqli_num_rows($bjm_u);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(52, 57, 57, 1)',
					'rgba(153, 255, 204, 1)'
					],
					borderColor: [
					'rgba(255,99,132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(52, 57, 57, 1)',
					'rgba(153, 255, 204, 1)'
					],
					borderWidth: 2
				}]
			},
			options: {
				responsive: true,
				// maintainAspectRatio: false, // Mengatur agar grafik responsif
				plugins: {
					legend: {
						position: 'top',
					},
					tooltip: {
						enabled: true,
					}
				}
			}
		});
	</script>
</center>
      </section>
      <!-- /Stats Counter Section -->
    </main>

    <?php include 'templates/footer.php'; ?>

    <?php include 'templates/js.php'; ?>
