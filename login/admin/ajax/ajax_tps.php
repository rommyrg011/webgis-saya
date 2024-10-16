<?php 
include '../../function.php'; // Menghubungkan ke database

if($_GET['action'] == "dataTps"){

	$columns = array( 
		0 => 'id_tps', 
		1 => 'tipe', 
		2 => 'nama_tps',
		3 => 'kecamatan',
		4 => 'alamat',
		5 => 'kapasitas',
		6 => 'ukuran_bangunan',
		7 => 'jam_operasional',
		8 => 'alat_angkutan',
		9 => 'jam_angkutan',
		10 => 'lattitude',
		11 => 'longitude',
		12 => 'maps_direction',
		13 => 'image'
	);

	$querycount = $koneksi->query("SELECT count(id_tps) as jumlah FROM tps");
	$datacount = $querycount->fetch_array();
	$totalData = $datacount['jumlah'];
	$totalFiltered = $totalData;

	$limit = $_POST['length'];
	$start = $_POST['start'];
	$order = $columns[$_POST['order']['0']['column']];
	$dir = $_POST['order']['0']['dir'];

	if(empty($_POST['search']['value'])) {            
		$query = $koneksi->query("SELECT id_tps, tipe, nama_tps, kecamatan, alamat, kapasitas, ukuran_bangunan, jam_operasional, alat_angkutan, jam_angkutan, lattitude, longitude, maps_direction, image 
								  FROM tps
								  ORDER BY $order $dir 
								  LIMIT $limit 
								  OFFSET $start");
	} else {
		$search = $_POST['search']['value']; 
		$query = $koneksi->query("SELECT id_tps, tipe, nama_tps, kecamatan, alamat, kapasitas, ukuran_bangunan, jam_operasional, alat_angkutan, jam_angkutan, lattitude, longitude, maps_direction, image 
								  FROM tps 
								  WHERE nama_tps LIKE '%$search%' 
								  OR kecamatan LIKE '%$search%' 
								  ORDER BY $order $dir 
								  LIMIT $limit 
								  OFFSET $start");

		$querycount = $koneksi->query("SELECT count(id_tps) as jumlah 
									   FROM tps 
									   WHERE nama_tps LIKE '%$search%' 
									   OR kecamatan LIKE '%$search%'");
		$datacount = $querycount->fetch_array();
		$totalFiltered = $datacount['jumlah'];
	}

	$data = array();
	if(!empty($query)) {
		$no = $start + 1;
		while ($r = $query->fetch_array()) {
			$nestedData['no'] = $no;
    		if($r['image']==null){
    		//Jika tidak ada gambar
        	$img = 'No Photo';
    		} else {
            //jika ada gambar
        	$img = '<img src="../../images/'.$r['image'].'" class="gambar">';
    		}
			$nestedData['image'] = $img;
			$nestedData['tipe'] = $r['tipe'];
			$nestedData['nama_tps'] = $r['nama_tps'];
			$nestedData['kecamatan'] = $r['kecamatan'];
            // memperpendek jika tampil di tabel
			if (strlen($r['alamat']) > 40) {
				$alamat = substr($r['alamat'], 0, 40) . '...';
			} else {
				$alamat = $r['alamat'];
			}
			$nestedData['alamat'] = $alamat;
			
			$nestedData['kapasitas'] = $r['kapasitas'];
			$nestedData['ukuran_bangunan'] = $r['ukuran_bangunan'];
			$nestedData['jam_operasional'] = $r['jam_operasional'];
			$nestedData['alat_angkutan'] = $r['alat_angkutan'];
			$nestedData['jam_angkutan'] = $r['jam_angkutan'];
			$nestedData['lattitude'] = $r['lattitude'];
			$nestedData['longitude'] = $r['longitude'];

			// memperpendek jika tampil di tabel
			if (strlen($r['maps_direction']) > 35) {
				$maps_direction = substr($r['maps_direction'], 0, 35) . '...';
			} else {
				$maps_direction = $r['maps_direction'];
			}
			$nestedData['maps_direction'] = $maps_direction;
			$nestedData['aksi'] = "<a href='tps_edit?id=" . $r['id_tps'] . "' class='btn btn-warning btn-sm'><i class='fas fa-edit'>Ubah</i></a>&nbsp;
                       <a href='tps_hapus?id=" . $r['id_tps'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'><i class='fas fa-trash'>Hapus</i></a>&nbsp";


			$data[] = $nestedData;
			$no++;
		}
	}

	$json_data = array(
		"draw"            => intval($_POST['draw']),
		"recordsTotal"    => intval($totalData),
		"recordsFiltered" => intval($totalFiltered),
		"data"            => $data
	);
	
	echo json_encode($json_data); 
}
?>
