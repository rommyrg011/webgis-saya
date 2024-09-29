<?php 
include '../function.php';
$id_feed= $_GET['id'];

$koneksi->query("DELETE FROM feedback WHERE id_feedback = $id_feed") or die(mysqli_error($koneksi));
echo "<script>alert('Data Berhasil Dihapus.');window.location='feedback';</script>";

?>