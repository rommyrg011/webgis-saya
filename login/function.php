<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "qgis");


//tambah admin
if(isset($_POST['tambahadmin'])){
	$nm = $_POST['nama_lengkap'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$lv = $_POST['level'];

	$tadmin = mysqli_query($koneksi, "insert into user (nama_lengkap, username, password, level) values
	('$nm', '$user', '$pass', '$lv')");
		if($tadmin){
			$_SESSION['notif'] = "Berhasil Ditambahkan";
		header('location: administrator');
		} else {
			echo '
			<script>alert("Gagal");
			window.location.href="administrator"
			</script>';
		}
	}
//tambah alat angkut
if(isset($_POST['tambahalat'])){
	$nmalat = $_POST['nama_alat'];

	$talat = mysqli_query($koneksi, "insert into alat (nama_alat) values
	('$nmalat')");
		if($talat){
			$_SESSION['notif'] = "Berhasil Ditambahkan";
		header('location: alatangkut');
		} else {
			echo '
			<script>alert("Gagal");
			window.location.href="alatangkut"
			</script>';
		}
	}

//tambah Kecamatan
if(isset($_POST['tambahkecamatan'])){
    $nmk = $_POST['nama_kec'];
    $luas = $_POST['luas_w'];
    $pend = $_POST['penduduk'];
    $kep = $_POST['kepadatan'];
    $lat = $_POST['lattitude'];
    $long = $_POST['longitude'];

    $tambahkecamatan = mysqli_query($koneksi, "insert into kecamatan (nama_kec, luas_w, penduduk,kepadatan, lattitude, longitude) values 
    ('$nmk', '$luas', '$pend', '$kep', '$lat', '$long')");
    if($tambahkecamatan){
        $_SESSION['notif'] = "Berhasil Ditambahkan";
		header('location: kecamatan');
    }  else {
		echo '
		<script>alert("Gagal");
		window.location.href="kecamatan"
		</script>';
	}
}

//tambah tps
if(isset($_POST['tambahtps'])){
    $nmt = $_POST['nama_tps'];
    $kecamatan = $_POST['kecamatan'];
    $alamat = $_POST['alamat'];
    $kap = $_POST['kapasitas'];
    $uk = $_POST['ukuran_bangunan'];
    $jam = $_POST['jam_operasional'];
    $jam_a = $_POST['jam_angkutan'];
    $alat = $_POST['alat_angkutan'];
    $maps = $_POST['maps_direction'];
    $lat = $_POST['lattitude'];
    $lng = $_POST['longitude'];

     //soal gambar
  $allowed_extension = array('png','jpg'); // tipe gambar yang di perbolehkan upload
  $nama = $_FILES['file']['name']; //ngambil nama file gambar
  $dot = explode('.',$nama);
  $ekstensi = strtolower(end($dot)); // mengambil ektensinya
  $ukuran = $_FILES['file']['size']; //mengambil size gambar
  $file_tmp = $_FILES['file']['tmp_name'];//tmp=temporary, mengambil lokasi filenya

  //penamaan file -> enkripsi
  $image = md5(uniqid($nama,true) . time()).'.'.$ekstensi; //menggabungkan nama file yang di enskripsi dengan ekstensinya
    
//proses upload gambar
if(in_array($ekstensi, $allowed_extension) === true){
  //validasi ukuran filennya
  if($ukuran < 1000000){
      move_uploaded_file($file_tmp, '../../images/'.$image);

    $tambahtps = mysqli_query($koneksi, "insert into tps (nama_tps, kecamatan, alamat, kapasitas, ukuran_bangunan, jam_operasional, jam_angkutan, alat_angkutan, lattitude, longitude, maps_direction, image) values 
    ('$nmt', '$kecamatan', '$alamat', '$kap', '$uk', '$jam', '$jam_a', '$alat', '$lat', '$lng', '$maps', '$image')");
    if($tambahtps){
        $_SESSION['notif'] = "Berhasil Ditambahkan";
		header('location: tps');
    }else {
		echo '
		<script>alert("Gagal");
		window.location.href="tps"
		</script>';
	}
} else {
  //jika ukuran filenya lebih dari 8 mb
  echo'
  <script> alert("Ukuran Gambar terlalu besar");
  window.location.href="tps";
  </script>';
}

} else {
//jika gambar tidak png /jpg
    echo'
    <script> alert("File Harus png atau jpg");
    window.location.href="tps";
    </script>';
    }
}