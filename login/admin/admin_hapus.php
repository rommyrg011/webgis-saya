<?php 
include '../function.php';
$id_admin= $_GET['id'];

$koneksi->query("DELETE FROM user WHERE id_user = $id_admin") or die(mysqli_error($koneksi));
echo "<script>alert('Data Berhasil Dihapus.');window.location='administrator';</script>";

?>