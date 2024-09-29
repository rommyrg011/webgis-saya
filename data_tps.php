<?php include 'templates/head.php'; ?>
<?php include 'koneksi.php'; ?>

    <style>

.col9 {
  height: 100% !important;
}
.col3 {
  height: 100%;
  overflow: auto;
}
.info {
  padding: 6px 8px;
  font: 14px/16px Arial, Helvetica, sans-serif;
  background-color: #f8f8f8 !important;
  color: #444444 !important;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
  border-radius: 5px;
}
.info h2 {
  margin: 0 0 5px;
}
.leaflet-container {
  background: #fff;
  padding-right: 10px;
}
.leaflet-popup-scrolled {
  border-bottom: unset !important;
  border-top: unset !important;
}
.leaflet-popup-content {
  max-height: 70vh;
  max-width: 70vw;
}
.leaflet-popup-content.media {
  width: auto !important;
  height: auto !important;
}
.leaflet-popup-content th {
  text-align: left;
  vertical-align: top;
  min-width: 75px;
}
.leaflet-popup-content td {
  min-width: 75px;
}
.leaflet-popup-content td img {
  max-height: 60vh;
  max-width: 60vw;
}

.leaflet-tooltip {
  background: none;
  box-shadow: none;
  border: none;
}
.leaflet-tooltip-left:before,
.leaflet-tooltip-right:before {
  border: 0px;
}

.fa,
.leaflet-container,
.leaflet-control-zoom-in,
.leaflet-control-zoom-out,
.leaflet-control-locate a,
.leaflet-touch .leaflet-control-geocoder-icon,
.leaflet-control-search .search-button,
.leaflet-control-measure {
  background-color: #f8f8f8 !important;
  border-radius: 0px !important;
  color: #444444 !important;
}
.abstract {
  font: bold 18px "Lucida Console", Monaco, monospace;
  text-indent: 1px;
  background-color: #f8f8f8 !important;
  width: 30px !important;
  color: #444444 !important;
  height: 30px !important;
  text-align: center !important;
  line-height: 30px !important;
}
.abstractUncollapsed {
  padding: 6px 8px;
  font: 12px/1.5 "Helvetica Neue", Arial, Helvetica, sans-serif;
  background-color: #f8f8f8 !important;
  color: #444444 !important;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
  border-radius: 5px;
  max-width: 40%;
}
.leaflet-control {
  box-shadow: 0 3px 14px rgba(0, 0, 0, 0.4) !important;
}
.leaflet-touch .leaflet-control-layers,
.leaflet-touch .leaflet-bar,
.leaflet-control-search,
.leaflet-control-measure {
  border: 3px solid rgba(255, 255, 255, 0.4) !important;
}
.leaflet-control-attribution a {
  color: #0078a8 !important;
}
.leaflet-control-scale-line {
  border: 2px solid #f8f8f8 !important;
  border-top: none !important;
  color: black !important;
}
.leaflet-control-search .search-button,
.leaflet-container .leaflet-control-search,
.leaflet-control-measure {
  box-shadow: none !important;
}
.leaflet-control-search .search-button {
  width: 30px !important;
  height: 30px !important;
  font-size: 13px !important;
  text-align: center !important;
  line-height: 30px !important;
}
.leaflet-control-measure .leaflet-control {
  width: 30px !important;
  height: 30px !important;
}
.leaflet-container .leaflet-control-search {
  background: none !important;
}
.leaflet-control-search .search-input {
  margin: 0px 0px 0px 0px !important;
  height: 30px !important;
}
.leaflet-control-measure {
  background: none !important;
  border-radius: 4px !important;
}
.leaflet-control-measure .leaflet-control-measure-interaction {
  background-color: #f8f8f8 !important;
}
.leaflet-touch .leaflet-control-measure .leaflet-control-measure-toggle,
.leaflet-touch .leaflet-control-measure .leaflet-control-measure-toggle:hover {
  width: 30px !important;
  height: 30px !important;
  border-radius: 0px !important;
  background-color: #f8f8f8 !important;
  color: #444444 !important;
  font-size: 13px;
  line-height: 30px;
  text-align: center;
  text-indent: 0%;
}
.leaflet-control-layers {
  padding: 2px;
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  background-color: #f8f8f8 !important;
  color: #444444 !important;
}
.leaflet-control-layers-expanded {
  padding-left: 6px;
}
.leaflet-control-layers-expanded .leaflet-control-layers-toggle {
  display: block;
  background-image: none;
  text-decoration: none;
  margin-bottom: 3px;
}
.leaflet-control-layers-expanded .leaflet-control-layers-toggle::after {
  content: "»";
  font-size: x-large;
  color: #444444 !important;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
  text-align: center;
}
.leaflet-overlay-pane {
  z-index: 550;
}
.leaflet-popup-pane {
  z-index: 700;
}

    </style>
  <body class="about-page">
<?php include 'templates/navbar.php'; ?>

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
       <div id="map"></div>
       <br> 
       <hr width="100%" noshade size="10%">
       <br>
       <h2>Daftar Kabupaten / Kota</h2>
       <br>
       <div class="table-responsive">
       <table class="table table-bordered table-sm" style="width:100%; margin: 0 auto;" data-bs-theme="dark">
       <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jumlah</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                  
                                        <tr>
                                            <td>1</td>
                                            <td>TPS Banjarmasin Selatan</td>
                                            <td>10</td>
                                        </tr> 
                                        <tr>
                                            <td>2</td>
                                            <td>TPS Banjarmasin Timur</td>
                                            <td>10</td>
                                        </tr> 
                                        <tr>
                                            <td>3</td>
                                            <td>TPS Banjarmasin Barat</td>
                                            <td>10</td>
                                        </tr> 
                                        <tr>
                                            <td>4</td>
                                            <td>TPS Banjarmasin Utara</td>
                                            <td>10</td>
                                        </tr> 
                                        <tr>
                                            <td>5</td>
                                            <td>TPS Banjarmasin Tengah</td>
                                            <td>10</td>
                                        </tr> 

                                        <tr>
                                            <td>6</td>
                                            <td>TPST3R Banjarmasin Selatan</td>
                                            <td>10</td>
                                        </tr> 
                                        <tr>
                                            <td>7</td>
                                            <td>TPST3R TPS Banjarmasin Timur</td>
                                            <td>10</td>
                                        </tr> 
                                        <tr>
                                            <td>8</td>
                                            <td>TPST3R TPS Banjarmasin Barat</td>
                                            <td>10</td>
                                        </tr> 
                                        <tr>
                                            <td>9</td>
                                            <td>TPST3R TPS Banjarmasin Utara</td>
                                            <td>10</td>
                                        </tr> 
                                        <tr>
                                            <td>10</td>
                                            <td>TPST3R TPS Banjarmasin Tengah</td>
                                            <td>10</td>
                                        </tr> 

        </tbody>
    </table>
       </div>
        </div>
        
      </section>
      <!-- /Stats Counter Section -->
    </main>

    <?php include 'templates/footer.php'; ?>

    <?php include 'templates/jspeta.php'; ?>

