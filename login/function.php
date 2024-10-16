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

//edit kecamatan
if(isset($_POST['editkecamatan'])){
  $nama_kec = $_POST['nama_kec'];
  $luas_w = $_POST['luas_w'];
  $penduduk = $_POST['penduduk'];
  $kepadatan = $_POST['kepadatan'];
  $lattitude = $_POST['lattitude'];
  $longitude = $_POST['longitude'];
  $id_k = $_POST['id_kec'];

  $editkec = mysqli_query($koneksi, "update kecamatan set nama_kec = '$nama_kec', luas_w = '$luas_w', penduduk = '$penduduk',
  kepadatan = '$kepadatan', lattitude = '$lattitude', longitude ='$longitude' where id_kec = '$id_k'");
    if($editkec){
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
  $tipe = $_POST['tipe'];
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
  $allowed_extension = array('png','jpg','jpeg', 'svg'); // tipe gambar yang di perbolehkan upload
  $image = null; // inisialisasi variabel gambar

  // Cek apakah file diunggah
  if (isset($_FILES['file']) && $_FILES['file']['error'] != UPLOAD_ERR_NO_FILE) {
      $nama = $_FILES['file']['name']; //ngambil nama file gambar
      $dot = explode('.', $nama);
      $ekstensi = strtolower(end($dot)); // mengambil ektensinya
      $ukuran = $_FILES['file']['size']; //mengambil size gambar
      $file_tmp = $_FILES['file']['tmp_name']; //tmp=temporary, mengambil lokasi filenya

      //penamaan file -> enkripsi
      $image = md5(uniqid($nama,true) . time()) . '.' . $ekstensi; //menggabungkan nama file yang di enskripsi dengan ekstensinya
      
      //proses upload gambar
      if (in_array($ekstensi, $allowed_extension) === true) {
          //validasi ukuran filennya
          if ($ukuran < 1000000) {
              move_uploaded_file($file_tmp, '../../images/' . $image);
          } else {
              //jika ukuran filenya lebih dari 1 MB
              echo '
              <script> alert("Ukuran Gambar terlalu besar");
              window.location.href="tps";
              </script>';
              exit; // Hentikan proses lebih lanjut
          }
      } else {
          //jika gambar tidak png /jpg
          echo '
          <script> alert("File Harus png atau jpg");
          window.location.href="tps";
          </script>';
          exit; // Hentikan proses lebih lanjut
      }
  }

  // Masukkan data ke dalam database
  $tambahtps = mysqli_query($koneksi, "INSERT INTO tps (tipe, nama_tps, kecamatan, alamat, kapasitas, ukuran_bangunan, jam_operasional, jam_angkutan, alat_angkutan, lattitude, longitude, maps_direction, image) VALUES 
  ('$tipe', '$nmt', '$kecamatan', '$alamat', '$kap', '$uk', '$jam', '$jam_a', '$alat', '$lat', '$lng', '$maps', '$image')");

  if ($tambahtps) {
      $_SESSION['notif'] = "Berhasil Ditambahkan";
      header('location: tps');
  } else {
      echo '
      <script>alert("Gagal");
      window.location.href="tps";
      </script>';
  }
}

//edit tps
if(isset($_POST['edittps'])) {
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
  $id_t = $_POST['id_tps'];
  $tip = $_POST['tipe'];

  // Mendapatkan path gambar lama dari database
  $result = mysqli_query($koneksi, "SELECT image FROM tps WHERE id_tps='$id_t'");
  $data = mysqli_fetch_assoc($result);
  $old_image = $data['image'];

  // Proses unggahan file
  $allowed_extension = array('png', 'jpg', 'jpeg', 'svg'); // Tipe file yang diizinkan
  $image = $old_image; // Gunakan gambar lama jika tidak ada file baru yang diunggah

  // Cek apakah file diunggah
  if (isset($_FILES['file']) && $_FILES['file']['error'] != UPLOAD_ERR_NO_FILE) {
      $nama = $_FILES['file']['name']; // Mengambil nama file baru
      $dot = explode('.', $nama);
      $ekstensi = strtolower(end($dot)); // Mengambil ekstensi
      $ukuran = $_FILES['file']['size']; // Mengambil ukuran file
      $file_tmp = $_FILES['file']['tmp_name']; // Lokasi file sementara

      // Penamaan file -> enkripsi
      $image = md5(uniqid($nama, true) . time()) . '.' . $ekstensi; // Nama file baru yang dienkripsi

      // Proses unggahan file
      if (in_array($ekstensi, $allowed_extension) === true) {
          if ($ukuran < 10000000) { // Sesuaikan batas ukuran jika perlu
              // Hapus gambar lama jika ada
              if (file_exists('../../images/' . $old_image)) {
                  unlink('../../images/' . $old_image); // Hapus gambar lama
              }

              // Unggah gambar baru
              move_uploaded_file($file_tmp, '../../images/' . $image);
          } else {
              // Jika ukuran file melebihi batas
              echo '
              <script> alert("Ukuran Gambar terlalu besar");
              window.location.href="tps";
              </script>';
              exit; // Hentikan proses lebih lanjut
          }
      } else {
          // Jika tipe file bukan png/jpg
          echo '
          <script> alert("File Harus png atau jpg");
          window.location.href="tps";
          </script>';
          exit; // Hentikan proses lebih lanjut
      }
  }

  // Perbarui database dengan gambar baru dan data lainnya
  $edittps = mysqli_query($koneksi, "UPDATE tps 
      SET nama_tps='$nmt', tipe='$tip', kecamatan='$kecamatan', alamat='$alamat', kapasitas='$kap', ukuran_bangunan='$uk', jam_operasional='$jam', jam_angkutan='$jam_a', alat_angkutan='$alat', lattitude='$lat', longitude='$lng', maps_direction='$maps', image='$image' 
      WHERE id_tps='$id_t'");

  if ($edittps) {
      $_SESSION['notif'] = "Berhasil Diedit";
      header('location: tps');
  } else {
      echo '
      <script>alert("Gagal");
      window.location.href="tps";
      </script>';
  }
}



