<?php 
include '../../function.php'; // Menghubungkan ke database

if($_GET['action'] == "dataAlatAngkut"){

	$columns = array( 
		0 => 'id_alat', 
		1 => 'nama_alat',
	);

	$querycount = $koneksi->query("SELECT count(id_alat) as jumlah FROM alat");
	$datacount = $querycount->fetch_array();
	$totalData = $datacount['jumlah'];
	$totalFiltered = $totalData;

	$limit = $_POST['length'];
	$start = $_POST['start'];
	$order = $columns[$_POST['order']['0']['column']];
	$dir = $_POST['order']['0']['dir'];

	if(empty($_POST['search']['value'])) {            
		$query = $koneksi->query("SELECT id_alat, nama_alat 
								  FROM alat
								  ORDER BY $order $dir 
								  LIMIT $limit 
								  OFFSET $start");
	} else {
		$search = $_POST['search']['value']; 
		$query = $koneksi->query("SELECT id_alat, nama_alat 
								  FROM alat
								  WHERE nama_alat LIKE '%$search%'  
								  ORDER BY $order $dir 
								  LIMIT $limit 
								  OFFSET $start");

		$querycount = $koneksi->query("SELECT count(id_alat) as jumlah 
									   FROM alat 
									   WHERE nama_alat LIKE '%$search%'");
		$datacount = $querycount->fetch_array();
		$totalFiltered = $datacount['jumlah'];
	}

	$data = array();
	if(!empty($query)) {
		$no = $start + 1;
		while ($r = $query->fetch_array()) {
			$nestedData['no'] = $no;
			$nestedData['nama_alat'] = $r['nama_alat'];
			$nestedData['aksi'] = "<a href='alat_hapus?id=" . $r['id_alat'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'><i class='fas fa-trash'></i></a>";

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
