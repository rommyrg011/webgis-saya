<?php 
require_once '../koneksi.php'; // Menghubungkan ke database

// Memeriksa apakah action yang dikirim melalui GET adalah "dataKecamatan"
if($_GET['action'] == "dataKecamatan"){

	// Mendefinisikan array kolom yang akan digunakan untuk urutan data pada tabel
	$columns = array( 
		0 => 'id_kec', 
		1 => 'nama_kec',
		2 => 'luas_w',
		3 => 'penduduk',
		4 => 'kepadatan',
		5 => 'lattitude',
		6 => 'longitude',
		7 => 'id_kec'
	);

	// Query untuk menghitung jumlah total data kecamatan
	$querycount = $koneksi->query("SELECT count(id_kec) as jumlah FROM kecamatan");
	$datacount = $querycount->fetch_array(); // Mengambil hasil query dalam bentuk array
	
	// Menyimpan total data dari tabel kecamatan tanpa filter
	$totalData = $datacount['jumlah'];
	
	// Karena belum ada filter, total data yang difilter sama dengan total data asli
	$totalFiltered = $totalData; 

	// Mendapatkan jumlah baris yang ingin ditampilkan (limit) dan data awal (start) dari POST DataTables
	$limit = $_POST['length']; // Berapa banyak data yang akan ditampilkan per halaman
	$start = $_POST['start'];  // Dari indeks ke berapa data akan diambil (untuk paginasi)
	
	// Mendapatkan kolom dan urutan sorting dari DataTables (berdasarkan input user)
	$order = $columns[$_POST['order']['0']['column']]; // Mengurutkan berdasarkan kolom yang dipilih user
	$dir = $_POST['order']['0']['dir']; // Arah sorting (asc atau desc)

	// Jika tidak ada pencarian (input pencarian kosong)
	if(empty($_POST['search']['value'])) {            
		// Query untuk mengambil data kecamatan tanpa filter, hanya paginasi dan sorting
		$query = $koneksi->query("SELECT id_kec, nama_kec, luas_w, penduduk, kepadatan, lattitude, longitude 
								  FROM kecamatan 
								  ORDER BY $order $dir 
								  LIMIT $limit 
								  OFFSET $start");
	} else {
		// Jika ada pencarian, ambil input pencarian
		$search = $_POST['search']['value']; 
		
		// Query untuk mengambil data kecamatan dengan filter berdasarkan input pencarian
		$query = $koneksi->query("SELECT id_kec, nama_kec, luas_w, penduduk, kepadatan, lattitude, longitude 
								  FROM kecamatan 
								  WHERE nama_kec LIKE '%$search%' 
								  OR luas_w LIKE '%$search%' 
								  ORDER BY $order $dir 
								  LIMIT $limit 
								  OFFSET $start");

		// Query untuk menghitung total data yang difilter (berdasarkan pencarian)
		$querycount = $koneksi->query("SELECT count(id_kec) as jumlah 
									   FROM kecamatan 
									   WHERE nama_kec LIKE '%$search%' 
									   OR luas_w LIKE '%$search%'");
		$datacount = $querycount->fetch_array(); // Mengambil hasil query dalam bentuk array
		
		// Total data yang difilter berdasarkan pencarian
		$totalFiltered = $datacount['jumlah'];
	}

	// Membuat array untuk menyimpan data yang diambil dari query
	$data = array();
	
	// Jika query berhasil dieksekusi
	if(!empty($query)) {
		$no = $start + 1; // Inisialisasi nomor urut data sesuai dengan halaman
		while ($r = $query->fetch_array()) {
			// Mengisi data ke dalam array nestedData untuk setiap baris
			$nestedData['no'] = $no;
			$nestedData['nama_kec'] = $r['nama_kec'];
			$nestedData['luas_w'] = $r['luas_w'];
			$nestedData['penduduk'] = $r['penduduk'];
			$nestedData['kepadatan'] = $r['kepadatan'];
			$nestedData['lattitude'] = $r['lattitude'];
			$nestedData['longitude'] = $r['longitude'];
			
			// Menambahkan data ke array 'data'
			$data[] = $nestedData;
			
			// Increment nomor urut
			$no++;
		}
	}

	// Menyiapkan data JSON yang akan dikembalikan ke DataTables
	$json_data = array(
		"draw"            => intval($_POST['draw']),  // Parameter untuk paginasi DataTables
		"recordsTotal"    => intval($totalData),  // Total data tanpa filter
		"recordsFiltered" => intval($totalFiltered), // Total data yang difilter
		"data"            => $data   // Data hasil query yang akan ditampilkan pada tabel
	);
	
	// Mengembalikan data dalam format JSON ke client (DataTables)
	echo json_encode($json_data); 
}
?>
