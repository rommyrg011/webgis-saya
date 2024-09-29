<?php 
include '../../function.php'; // Menghubungkan ke database

if($_GET['action'] == "dataFeedback"){

	$columns = array( 
		0 => 'id_feedback', 
		1 => 'nama_lengkap',
		2 => 'tps',
		3 => 'keterangan'
	);

	$querycount = $koneksi->query("SELECT count(id_feedback) as jumlah FROM feedback");
	$datacount = $querycount->fetch_array();
	$totalData = $datacount['jumlah'];
	$totalFiltered = $totalData;

	$limit = $_POST['length'];
	$start = $_POST['start'];
	$order = $columns[$_POST['order']['0']['column']];
	$dir = $_POST['order']['0']['dir'];

	if(empty($_POST['search']['value'])) {            
		$query = $koneksi->query("SELECT id_feedback, nama_lengkap, tps, keterangan 
								  FROM feedback
								  ORDER BY $order $dir 
								  LIMIT $limit 
								  OFFSET $start");
	} else {
		$search = $_POST['search']['value']; 
		$query = $koneksi->query("SELECT id_feedback, nama_lengkap, tps, keterangan 
								  FROM feedback
								  WHERE nama_lengkap LIKE '%$search%' 
								  OR tps LIKE '%$search%' 
								  ORDER BY $order $dir 
								  LIMIT $limit 
								  OFFSET $start");

		$querycount = $koneksi->query("SELECT count(id_feedback) as jumlah 
									   FROM feedback 
									   WHERE nama_lengkap LIKE '%$search%' 
									   OR tps LIKE '%$search%'");
		$datacount = $querycount->fetch_array();
		$totalFiltered = $datacount['jumlah'];
	}

	$data = array();
	if(!empty($query)) {
		$no = $start + 1;
		while ($r = $query->fetch_array()) {
			$nestedData['no'] = $no;
			$nestedData['nama_lengkap'] = $r['nama_lengkap'];
			$nestedData['tps'] = $r['tps'];
			$nestedData['keterangan'] = $r['keterangan'];
			$nestedData['aksi'] = "<a href='feedback_hapus?id=" . $r['id_feedback'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'><i class='fas fa-trash'></i></a>";



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
