<?php 
include '../function.php';
$id_admin= $_GET['id'];

$had= $koneksi->query("DELETE FROM user WHERE id_user = $id_admin") or die(mysqli_error($koneksi));
if($had){
    $_SESSION['notif'] = "Berhasil Di Hapus";
header('location: administrator');
}  else {
echo '
<script>alert("Gagal");
window.location.href="administrator"
</script>';
}

?>