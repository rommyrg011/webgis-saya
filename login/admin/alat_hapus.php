<?php 
include '../function.php';
$id_alat= $_GET['id'];

$halat= $koneksi->query("DELETE FROM alat WHERE id_alat = $id_alat") or die(mysqli_error($koneksi));
if($halat){
    $_SESSION['notif'] = "Berhasil Di Hapus";
header('location: alatangkut');
}  else {
echo '
<script>alert("Gagal");
window.location.href="alatangkut"
</script>';
}

?>