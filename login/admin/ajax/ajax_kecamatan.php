<?php 
include '../../function.php'; // Menghubungkan ke database

if($_GET['action'] == "dataKecamatan"){

	$columns = array( 
		0 => 'id_kec', 
		1 => 'nama_kec',
		2 => 'luas_w',
		3 => 'penduduk',
		4 => 'kepadatan',
		5 => 'lattitude',
		6 => 'longitude'
	);

	$querycount = $koneksi->query("SELECT count(id_kec) as jumlah FROM kecamatan");
	$datacount = $querycount->fetch_array();
	$totalData = $datacount['jumlah'];
	$totalFiltered = $totalData;

	$limit = $_POST['length'];
	$start = $_POST['start'];
	$order = $columns[$_POST['order']['0']['column']];
	$dir = $_POST['order']['0']['dir'];

	if(empty($_POST['search']['value'])) {            
		$query = $koneksi->query("SELECT id_kec, nama_kec, luas_w, penduduk, kepadatan, lattitude, longitude
								  FROM kecamatan
								  ORDER BY $order $dir 
								  LIMIT $limit 
								  OFFSET $start");
	} else {
		$search = $_POST['search']['value']; 
		$query = $koneksi->query("SELECT id_kec, nama_kec, luas_w, penduduk, kepadatan, lattitude, longitude
								  FROM kecamatan 
								  WHERE nama_kec LIKE '%$search%' 
								  ORDER BY $order $dir 
								  LIMIT $limit 
								  OFFSET $start");

		$querycount = $koneksi->query("SELECT count(id_kec) as jumlah 
									   FROM kecamatan 
									   WHERE nama_kec LIKE '%$search%'");
		$datacount = $querycount->fetch_array();
		$totalFiltered = $datacount['jumlah'];
	}

	$data = array();
	if(!empty($query)) {
		$no = $start + 1;
		while ($r = $query->fetch_array()) {
			$nestedData['no'] = $no;
			$nestedData['nama_kec'] = $r['nama_kec'];
			$nestedData['luas_w'] = $r['luas_w'];
			$nestedData['penduduk'] = $r['penduduk'];
			$nestedData['kepadatan'] = $r['kepadatan'];
			$nestedData['lattitude'] = $r['lattitude'];
			$nestedData['longitude'] = $r['longitude'];

			$nestedData['aksi'] = "<a href='kecamatan_edit?id=" . $r['id_kec'] . "' class='btn btn-warning btn-sm'><i class='fas fa-edit'>Ubah</i></a>
                       <a href='kecamatan_hapus?id=" . $r['id_kec'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'><i class='fas fa-trash'>Hapus</i></a>";


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
