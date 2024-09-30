<?php 
include '../function.php';
$id_tps = $_GET['id'];

// Ambil nama file foto berdasarkan id_tps sebelum menghapus data
$query = $koneksi->query("SELECT image FROM tps WHERE id_tps = $id_tps");
$data = $query->fetch_assoc();
$foto = $data['image']; // Nama file / disini bisa set berdasarkan nama dari database

// Tentukan lokasi folder tempat penyimpanan foto
$path = '../../images/' . $foto; // Sesuaikan dengan folder tempat menyimpan foto

// Periksa apakah file foto ada, jika ada, hapus file tersebut
if (file_exists($path)) {
    unlink($path); // Hapus file
}

// Hapus data dari tabel tps
$htps = $koneksi->query("DELETE FROM tps WHERE id_tps = $id_tps") or die(mysqli_error($koneksi));
if($htps){
    $_SESSION['notif'] = "Berhasil Di Hapus";
header('location: tps');
}  else {
echo '
<script>alert("Gagal");
window.location.href="tps"
</script>';
}
?>
