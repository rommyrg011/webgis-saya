<?php 
include '../function.php';
$id_tps= $_GET['id'];

$koneksi->query("DELETE FROM tps WHERE id_tps = $id_tps") or die(mysqli_error($koneksi));
echo "<script>alert('Data Berhasil Dihapus.');window.location='tps';</script>";

?>