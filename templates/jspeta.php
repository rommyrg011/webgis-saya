
<?php

  //catatan penamaan kecamatan harus sama berdasarkan nama file
?>


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

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>

  <script src="js/qgis2web_expressions.js"></script>
    <script src="js/leaflet.js"></script>
    <script src="js/L.Control.Layers.Tree.min.js"></script>
    <script src="js/leaflet.rotatedMarker.js"></script>
    <script src="js/leaflet.pattern.js"></script>
    <script src="js/leaflet-hash.js"></script>
    <script src="js/Autolinker.min.js"></script>
    <script src="js/rbush.min.js"></script>
    <script src="js/labelgun.min.js"></script>
    <script src="js/labels.js"></script>
    <script src="js/leaflet-control-geocoder.Geocoder.js"></script>
    <script src="js/leaflet.markercluster.js"></script>
    <script src="js/leaflet-search.js"></script>
    <script src="data/KECAMATANBANJARMASIN_3.js"></script>
    <script src="data/TPS_4.php"></script>
    <script>
      // tambahan menampilkan map
      L.ImageOverlay.include({
        getBounds: function () {
          return this._bounds;
        },
      });

      var map = L.map('map', {
            zoomControl:false, maxZoom:28, minZoom:1
        }).fitBounds([[-3.3784117715541218,114.51695405864925],[-3.277490722834231,114.68836921304214]]);
        // var hash = new L.Hash(map);
        // map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
        var autolinker = new Autolinker({truncate: {length: 30, location: 'smart'}});
        // remove popup's row if "visible-with-data"
        function removeEmptyRowsFromPopupContent(content, feature) {
         var tempDiv = document.createElement('div');
         tempDiv.innerHTML = content;
         var rows = tempDiv.querySelectorAll('tr');
         for (var i = 0; i < rows.length; i++) {
             var td = rows[i].querySelector('td.visible-with-data');
             var key = td ? td.id : '';
             if (td && td.classList.contains('visible-with-data') && feature.properties[key] == null) {
                 rows[i].parentNode.removeChild(rows[i]);
             }
         }
         return tempDiv.innerHTML;
        }
        // add class to format popup if it contains media
		function addClassToPopupIfMedia(content, popup) {
			var tempDiv = document.createElement('div');
			tempDiv.innerHTML = content;
			if (tempDiv.querySelector('td img')) {
				popup._contentNode.classList.add('media');
					// Delay to force the redraw
					setTimeout(function() {
						popup.update();
					}, 10);
			} else {
				popup._contentNode.classList.remove('media');
			}
		}
        var zoomControl = L.control.zoom({
            position: 'topleft'
        }).addTo(map);
        var bounds_group = new L.featureGroup([]);
        function setBounds() {
        }
        map.createPane('pane_GOOGLESATELITE_0');
        map.getPane('pane_GOOGLESATELITE_0').style.zIndex = 400;
        var layer_GOOGLESATELITE_0 = L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            // pane: 'pane_GOOGLESATELITE_0',
            // opacity: 1.0,
            // attribution: '<a href="https://www.google.at/permissions/geoguidelines/attr-guide.html">Map data ©2015 Google</a>',
            // minZoom: 1,
            // maxZoom: 28,
            // minNativeZoom: 0,
            // maxNativeZoom: 20
        });
        layer_GOOGLESATELITE_0;
        map.addLayer(layer_GOOGLESATELITE_0);
        map.createPane('pane_GOOGLEMAPS_1');
        map.getPane('pane_GOOGLEMAPS_1').style.zIndex = 401;
        var layer_GOOGLEMAPS_1 = L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            pane: 'pane_GOOGLEMAPS_1',
            opacity: 1.0,
            attribution: '',
            minZoom: 1,
            maxZoom: 28,
            minNativeZoom: 0,
            maxNativeZoom: 19
        });
        layer_GOOGLEMAPS_1;
        map.addLayer(layer_GOOGLEMAPS_1);
        map.createPane('pane_OPENSTREETMAP_2');
        map.getPane('pane_OPENSTREETMAP_2').style.zIndex = 402;
        var layer_OPENSTREETMAP_2 = L.tileLayer('http://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            pane: 'pane_OPENSTREETMAP_2',
            opacity: 1.0,
            // attribution: '<a href="https://www.openstreetmap.org/copyright">© OpenStreetMap contributors, CC-BY-SA</a>',
            minZoom: 1,
            maxZoom: 28,
            minNativeZoom: 0,
            maxNativeZoom: 19
        });
        layer_OPENSTREETMAP_2;
        map.addLayer(layer_OPENSTREETMAP_2);
        function pop_KECAMATANBANJARMASIN_3(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['PROVINSI'] !== null ? autolinker.link(feature.properties['PROVINSI'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">KABUPATEN :</th>\
                        <td>' + (feature.properties['KABKOT'] !== null ? autolinker.link(feature.properties['KABKOT'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">KECAMATAN :</th>\
                        <td>' + (feature.properties['KECAMATAN'] !== null ? autolinker.link(feature.properties['KECAMATAN'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            var content = removeEmptyRowsFromPopupContent(popupContent, feature);
			layer.on('popupopen', function(e) {
				addClassToPopupIfMedia(content, e.popup);
			});
			layer.bindPopup(content, { maxHeight: 400 });
        }

        function style_KECAMATANBANJARMASIN_3_0(feature) {
            switch(String(feature.properties['KECAMATAN'])) {
                case 'BANJARMASIN BARAT':
                    return {
                pane: 'pane_KECAMATANBANJARMASIN_3',
                opacity: 1,
                color: 'rgba(35,35,35,0.608)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(197,221,13,0.608)',
                interactive: true,
            }
                    break;
                case 'BANJARMASIN SELATAN':
                    return {
                pane: 'pane_KECAMATANBANJARMASIN_3',
                opacity: 1,
                color: 'rgba(35,35,35,0.608)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(143,227,236,0.608)',
                interactive: true,
            }
                    break;
                case 'BANJARMASIN TENGAH':
                    return {
                pane: 'pane_KECAMATANBANJARMASIN_3',
                opacity: 1,
                color: 'rgba(35,35,35,0.608)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(240,139,125,0.608)',
                interactive: true,
            }
                    break;
                case 'BANJARMASIN TIMUR':
                    return {
                pane: 'pane_KECAMATANBANJARMASIN_3',
                opacity: 1,
                color: 'rgba(35,35,35,0.608)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(222,125,212,0.608)',
                interactive: true,
            }
                    break;
                case 'BANJARMASIN UTARA':
                    return {
                pane: 'pane_KECAMATANBANJARMASIN_3',
                opacity: 1,
                color: 'rgba(35,35,35,0.608)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(51,231,69,0.608)',
                interactive: true,
            }
                    break;
            }
        }
        map.createPane('pane_KECAMATANBANJARMASIN_3');
        map.getPane('pane_KECAMATANBANJARMASIN_3').style.zIndex = 403;
        map.getPane('pane_KECAMATANBANJARMASIN_3').style['mix-blend-mode'] = 'normal';
        var layer_KECAMATANBANJARMASIN_3 = new L.geoJson(json_KECAMATANBANJARMASIN_3, {
            attribution: '',
            interactive: true,
            dataVar: 'json_KECAMATANBANJARMASIN_3',
            layerName: 'layer_KECAMATANBANJARMASIN_3',
            pane: 'pane_KECAMATANBANJARMASIN_3',
            onEachFeature: pop_KECAMATANBANJARMASIN_3,
            style: style_KECAMATANBANJARMASIN_3_0,
        });
        bounds_group.addLayer(layer_KECAMATANBANJARMASIN_3);
        map.addLayer(layer_KECAMATANBANJARMASIN_3);
        function pop_TPS_4(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Nama TPS :</th>\
                        <td>' + (feature.properties['nama_tps'] !== null ? autolinker.link(feature.properties['nama_tps'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Tipe :</th>\
                        <td>' + (feature.properties['tipe'] !== null ? autolinker.link(feature.properties['tipe'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Lokasi :</th>\
                        <td>' + (feature.properties['alamat'] !== null ? autolinker.link(feature.properties['alamat'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Operasi :</th>\
                        <td>' + (feature.properties['operasi'] !== null ? autolinker.link(feature.properties['operasi'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Detail :</th>\
                        <td>' + (feature.properties['detail'] !== null ? autolinker.link(feature.properties['detail'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            var content = removeEmptyRowsFromPopupContent(popupContent, feature);
			layer.on('popupopen', function(e) {
				addClassToPopupIfMedia(content, e.popup);
			});
			layer.bindPopup(content, { maxHeight: 400 });
        }

        function style_TPS_4_0() {
            return {
                pane: 'pane_TPS_4',
        rotationAngle: 0.0,
        rotationOrigin: 'center center',
        icon: L.icon({
            iconUrl: 'markers/../images/trash.png',
            iconSize: [30.4, 30.4]
        }),
                interactive: true,
            }
        }
        map.createPane('pane_TPS_4');
        map.getPane('pane_TPS_4').style.zIndex = 404;
        map.getPane('pane_TPS_4').style['mix-blend-mode'] = 'normal';
        var layer_TPS_4 = new L.geoJson(json_TPS_4, {
            attribution: '',
            interactive: true,
            dataVar: 'json_TPS_4',
            layerName: 'layer_TPS_4',
            pane: 'pane_TPS_4',
            onEachFeature: pop_TPS_4,
            pointToLayer: function (feature, latlng) {
                var context = {
                    feature: feature,
                    variables: {}
                };
                return L.marker(latlng, style_TPS_4_0(feature));
            },
        });
        var cluster_TPS_4 = new L.MarkerClusterGroup({showCoverageOnHover: false,
            spiderfyDistanceMultiplier: 2});
        cluster_TPS_4.addLayer(layer_TPS_4);

        bounds_group.addLayer(layer_TPS_4);
        cluster_TPS_4.addTo(map);
        var osmGeocoder = new L.Control.Geocoder({
            collapsed: true,
            position: 'topleft',
            text: 'Search',
            title: 'Testing'
        }).addTo(map);
        document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
        .className += ' fa fa-search';
        document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
        .title += 'Search for a place';
        var baseMaps = {};
        var overlaysTree = [
            {label: '<img src="markers/../images/trash.png" style="width:20px;height:auto;" /> LOKASI TPS', layer: cluster_TPS_4},
            {label: 'KECAMATAN BANJARMASIN<br /><table><tr><td style="text-align: center;"><img src="legend/KECAMATANBANJARMASIN_3_BANJARMASINBARAT0.png" /></td><td>BANJARMASIN BARAT</td></tr><tr><td style="text-align: center;"><img src="legend/KECAMATANBANJARMASIN_3_BANJARMASINSELATAN1.png" /></td><td>BANJARMASIN SELATAN</td></tr><tr><td style="text-align: center;"><img src="legend/KECAMATANBANJARMASIN_3_BANJARMASINTENGAH2.png" /></td><td>BANJARMASIN TENGAH</td></tr><tr><td style="text-align: center;"><img src="legend/KECAMATANBANJARMASIN_3_BANJARMASINTIMUR3.png" /></td><td>BANJARMASIN TIMUR</td></tr><tr><td style="text-align: center;"><img src="legend/KECAMATANBANJARMASIN_3_BANJARMASINUTARA4.png" /></td><td>BANJARMASIN UTARA</td></tr></table>', layer: layer_KECAMATANBANJARMASIN_3},
            {label: "OPENSTREETMAP", layer: layer_OPENSTREETMAP_2},
            {label: "GOOGLE MAPS", layer: layer_GOOGLEMAPS_1},
            {label: "GOOGLE SATELITE", layer: layer_GOOGLESATELITE_0},]
        var lay = L.control.layers.tree(null, overlaysTree,{
            //namedToggle: true,
            //selectorBack: false,
            //closedSymbol: '&#8862; &#x1f5c0;',
            //openedSymbol: '&#8863; &#x1f5c1;',
            //collapseAll: 'Collapse all',
            //expandAll: 'Expand all',
            collapsed: false, 
        });
        lay.addTo(map);
		document.addEventListener("DOMContentLoaded", function() {
            // set new Layers List height which considers toggle icon
            function newLayersListHeight() {
                var layerScrollbarElement = document.querySelector('.leaflet-control-layers-scrollbar');
                if (layerScrollbarElement) {
                    var layersListElement = document.querySelector('.leaflet-control-layers-list');
                    var originalHeight = layersListElement.style.height 
                        || window.getComputedStyle(layersListElement).height;
                    var newHeight = parseFloat(originalHeight) - 50;
                    layersListElement.style.height = newHeight + 'px';
                }
            }
            var isLayersListExpanded = true;
            var controlLayersElement = document.querySelector('.leaflet-control-layers');
            var toggleLayerControl = document.querySelector('.leaflet-control-layers-toggle');
            // toggle Collapsed/Expanded and apply new Layers List height
            toggleLayerControl.addEventListener('click', function() {
                if (isLayersListExpanded) {
                    controlLayersElement.classList.remove('leaflet-control-layers-expanded');
                } else {
                    controlLayersElement.classList.add('leaflet-control-layers-expanded');
                }
                isLayersListExpanded = !isLayersListExpanded;
                newLayersListHeight()
            });	
			// apply new Layers List height if toggle layerstree
			if (controlLayersElement) {
				controlLayersElement.addEventListener('click', function(event) {
					var toggleLayerHeaderPointer = event.target.closest('.leaflet-layerstree-header-pointer span');
					if (toggleLayerHeaderPointer) {
						newLayersListHeight();
					}
				});
			}
            // Collapsed/Expanded at Start to apply new height
            setTimeout(function() {
                toggleLayerControl.click();
            }, 10);
            setTimeout(function() {
                toggleLayerControl.click();
            }, 10);
            // Collapsed touch/small screen
            var isSmallScreen = window.innerWidth < 650;
            if (isSmallScreen) {
                setTimeout(function() {
                    controlLayersElement.classList.remove('leaflet-control-layers-expanded');
                    isLayersListExpanded = !isLayersListExpanded;
                }, 500);
            }  
        });       
        setBounds();
        map.addControl(new L.Control.Search({
            layer: cluster_TPS_4,
            initial: false,
            hideMarkerOnCollapse: true,
            propertyName: 'nama_tps'}));
        document.getElementsByClassName('search-button')[0].className +=
         ' fa fa-binoculars';
        resetLabels([layer_KECAMATANBANJARMASIN_3]);
        map.on("zoomend", function(){
            resetLabels([layer_KECAMATANBANJARMASIN_3]);
        });
        map.on("layeradd", function(){
            resetLabels([layer_KECAMATANBANJARMASIN_3]);
        });
        map.on("layerremove", function(){
            resetLabels([layer_KECAMATANBANJARMASIN_3]);
        });
        </script>
</html>
