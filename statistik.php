<?php 
include 'koneksi.php';
include 'templates/head.php'; ?>
  <body class="about-page">
<?php include 'templates/navbar.php'; ?>

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
      <div style="width:100%;max-width:1000px;height:100vh;">
		<canvas id="myChart"></canvas>
	</div>

    <script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["BANJARMASIN TENGAH", "BANJARMASIN TIMUR", "BANJARMASIN BARAT", "BANJARMASIN SELATAN", "BANJARMASIN UTARA"],
				datasets: [{
					label: 'Unit',
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
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 255, 204, 1)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 255, 204, 1)'
					],
					borderWidth: 2
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
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

