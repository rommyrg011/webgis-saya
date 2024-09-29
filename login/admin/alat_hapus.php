<?php 
include '../function.php';
$id_alat= $_GET['id'];

$koneksi->query("DELETE FROM alat WHERE id_alat = $id_alat") or die(mysqli_error($koneksi));
echo "<script>alert('Data Berhasil Dihapus.');window.location='alatangkut';</script>";

?>