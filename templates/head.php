<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Webgis</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" /> -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link
      href="assets/vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet" />

    <!-- script tampil grafik batang / lingkaran -->
    <script type="text/javascript" src="templates/chartjs/Chart.js"></script>


<!-- bootstrap 5 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/2.1.4/css/dataTables.bootstrap5.css">

<!-- bootstrap 4 -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"> -->


<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>


     <link rel="stylesheet" href="css/leaflet.css">
        <link rel="stylesheet" href="css/L.Control.Layers.Tree.css">
        <!-- <link rel="stylesheet" href="css/qgis2web.css"> -->
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/MarkerCluster.css">
        <link rel="stylesheet" href="css/MarkerCluster.Default.css">
        <link rel="stylesheet" href="css/leaflet-search.css">
        <link rel="stylesheet" href="css/leaflet-control-geocoder.Geocoder.css">

 
  <style type="text/css">
    #mapid, #map { 
      height: 80vh;
      border: 5px solid #808080; /* Border abu-abu dengan ketebalan 5px */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Opsional: Menambahkan bayangan halus untuk tampilan lebih baik */ 
    }
   	.icon {
	display: inline-block;
	margin: 2px;
	height: 16px;
	width: 16px;
	background-color: #ccc;
}
.icon-bar {
	background: url('assets/js/leaflet-panel-layers-master/examples/images/icons/bar.png') center center no-repeat;
}
    
body{
			font-family: roboto;
      
}
/* Base style for container */
.container.position-relative {
  position: relative;
  width: 100%;
  padding: 15px;
  margin-right: auto;
  margin-left: auto;
}

/* Text styles */
.container.position-relative h1, 
.container.position-relative h2, 
.container.position-relative p {
  font-size: 1.5rem; /* Base font size */
}

/* For small devices (phones, up to 576px) */
@media (max-width: 576px) {
  .container.position-relative {
    padding: 10px; /* Reduce padding for mobile */
    width: 100%;
  }
  
  .container.position-relative h1 {
    font-size: 2.4rem; /* Reduce font size for mobile */
  }

  .container.position-relative h2 {
    font-size: 1rem; /* Adjust subheading font size */
  }

  .container.position-relative p {
    font-size: 0.9rem; /* Smaller font size for paragraph */
  }
}

/* For medium devices (tablets, 576px and up) */
@media (min-width: 576px) and (max-width: 768px) {
  .container.position-relative h1 {
    font-size: 1.4rem; /* Slightly smaller heading on tablets */
  }

  .container.position-relative h2 {
    font-size: 1.2rem;
  }

  .container.position-relative p {
    font-size: 1rem;
  }
}

/* For larger devices (desktops, 768px and up) */
@media (min-width: 768px) {
  .container.position-relative h1 {
    font-size: 3rem; /* Larger font for bigger screens */
  }

  .container.position-relative h2 {
    font-size: 1.4rem;
  }

  .container.position-relative p {
    font-size: 1.1rem;
  }
}

/* Base style for h3 (desktop and larger screens) */
h3.inner-title {
  font-size: 2rem; /* Default font size for larger screens */
  text-align: center; /* Center the text */
}

/* For small devices (phones, up to 576px) */
@media (max-width: 576px) {
  h3.inner-title {
    font-size: 1.1rem; /* Reduce font size for mobile screens */
  }
}

/* For medium devices (tablets, 576px to 768px) */
@media (min-width: 576px) and (max-width: 768px) {
  h3.inner-title {
    font-size: 1.5rem; /* Adjust font size for tablets */
  }
}

/* For larger devices (desktops, 768px and up) */
@media (min-width: 768px) {
  h3.inner-title {
    font-size: 2rem; /* Larger font size for bigger screens */
  }
}

/* General responsiveness for col-lg-7 */
.col-lg-7 {
  padding: 15px;
}

@media (max-width: 576px) {
  .col-lg-7 {
    padding: 10px; /* Adjust padding for mobile */
  }
}



	</style>

  </head>