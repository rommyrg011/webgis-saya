<?php 
include '../../function.php'; // Menghubungkan ke database

if($_GET['action'] == "dataAdmin"){

	$columns = array( 
		0 => 'id_user', 
		1 => 'nama_lengkap',
		2 => 'username',
	);

	$querycount = $koneksi->query("SELECT count(id_user) as jumlah FROM user");
	$datacount = $querycount->fetch_array();
	$totalData = $datacount['jumlah'];
	$totalFiltered = $totalData;

	$limit = $_POST['length'];
	$start = $_POST['start'];
	$order = $columns[$_POST['order']['0']['column']];
	$dir = $_POST['order']['0']['dir'];

	if(empty($_POST['search']['value'])) {            
		$query = $koneksi->query("SELECT id_user, nama_lengkap, username 
								  FROM user
								  ORDER BY $order $dir 
								  LIMIT $limit 
								  OFFSET $start");
	} else {
		$search = $_POST['search']['value']; 
		$query = $koneksi->query("SELECT id_user, nama_lengkap, username 
								  FROM user
								  WHERE nama_lengkap LIKE '%$search%'  
								  ORDER BY $order $dir 
								  LIMIT $limit 
								  OFFSET $start");

		$querycount = $koneksi->query("SELECT count(id_user) as jumlah 
									   FROM user 
									   WHERE nama_lengkap LIKE '%$search%'");
		$datacount = $querycount->fetch_array();
		$totalFiltered = $datacount['jumlah'];
	}

	$data = array();
	if(!empty($query)) {
		$no = $start + 1;
		while ($r = $query->fetch_array()) {
			$nestedData['no'] = $no;
			$nestedData['nama_lengkap'] = $r['nama_lengkap'];
			$nestedData['username'] = $r['username'];
			$nestedData['aksi'] = "<a href='admin_hapus?id=" . $r['id_user'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'><i class='fas fa-trash'></i></a>";

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
