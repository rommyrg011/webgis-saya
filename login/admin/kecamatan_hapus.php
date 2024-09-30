<?php 
include '../function.php';
$id_kecamatan= $_GET['id'];

$hkec = $koneksi->query("DELETE FROM kecamatan WHERE id_kec = $id_kecamatan") or die(mysqli_error($koneksi));
if($hkec){
    $_SESSION['notif'] = "Berhasil Di Hapus";
header('location: kecamatan');
}  else {
echo '
<script>alert("Gagal");
window.location.href="kecamatan"
</script>';
}


?>