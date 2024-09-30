   <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
   <script src="https://cdn.datatables.net/2.1.4/js/dataTables.bootstrap5.js"></script>
   

   <script type="text/javascript">
	$('#example').DataTable();
   </script>
<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>


    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
     <link rel="stylesheet" href="assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.css" />

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>

  <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>

 <script src="assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>
 <script src="assets/js/leaflet.ajax.js"></script>

   <script type="text/javascript">

   	var mymap = L.map('mapid').setView([-3.3166208, 114.5749854], 12);

   	var LayerKita=L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19
   
});
	mymap.addLayer(LayerKita);
	function popUp(f,l){
	    var out = [];
	    if (f.properties){
	        // for(key in f.properties){
	        // 	console.log(key);

	        // }
			out.push("Provinsi: "+f.properties['PROVINSI']);
			out.push("Kecamatan: "+f.properties['KECAMATAN']);
			// out.push("Contoh: Ini Pop Up manual");
	        l.bindPopup(out.join("<br />"));
	    }
	}

	// memunculkan legend

	function iconByName(name) {
		return '<i class="icon" style="background-color:'+name+';border-radius:50%"></i>';
	}

	function featureToMarker(feature, latlng) {
		return L.marker(latlng, {
			icon: L.divIcon({
				className: 'marker-'+feature.properties.amenity,
				html: iconByName(feature.properties.amenity),
				iconUrl: '../images/markers/'+feature.properties.amenity+'.png',
				iconSize: [25, 41],
				iconAnchor: [12, 41],
				popupAnchor: [1, -34],
				shadowSize: [41, 41]
			})
		});
	}

	var baseLayers = [
		{
			name: "OpenStreetMap",
			layer: LayerKita // sesuaikan berdasarkan variabel yang di buat sendiri
		},
		{	
			name: "Google Maps",
			layer: L.tileLayer('http://{s}.tile.opencyclemap.org/cycle/{z}/{x}/{y}.png')
		},
		{
			name: "Outdoors",
			layer: L.tileLayer('http://{s}.tile.thunderforest.com/outdoors/{z}/{x}/{y}.png')
		}
	];

	<?php
	$kecamatan = [
		"banjarmasin_barat"=>"rgba(197,221,13,0.608)",
		 "banjarmasin_selatan"=>"rgba(143,227,236,0.608)", 
		 "banjarmasin_tengah"=>"rgba(240,139,125,0.608)", 
		 "banjarmasin_timur"=>"rgba(222,125,212,0.608)",
		 "banjarmasin_utara"=>"rgba(51,231,69,0.608)"
		];
		foreach ($kecamatan as $key => $value) {
	?>
	// styling warna perkategori
	var myStyle<?=$key?> = {
        "color": "#000000", // warna border
        "weight": 1, // ketebalan border
        "opacity": 0.4, // transparansi border
        "fillColor": "<?=$value?>", // mempertahankan warna kecamatan
        "fillOpacity": 1   // transparansi warna kecamatan
    };

			<?php
			$arrayKec[]='{
			name: "'.str_replace('_', ' ', strtoupper($key)).'",
			icon: iconByName("'.$value.'"),
			layer: new L.GeoJSON.AJAX(["assets/geojson/'.$key.'.geojson"],{onEachFeature:popUp,style: myStyle'.$key.',pointToLayer: featureToMarker }).addTo(mymap)
			}';
		}
	?>
	// membuat layer group
	var overLayers = [{
		group: "KECAMATAN",
		layers: [
			<?=implode(',', $arrayKec);?>
		]
	}
	];

	var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers,{
		collapsibleGroups: true
	});

	mymap.addControl(panelLayers);



   </script>

  
</html>