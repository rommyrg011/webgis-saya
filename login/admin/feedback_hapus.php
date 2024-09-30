<?php 
include '../function.php';
$id_feed= $_GET['id'];

$hfeed= $koneksi->query("DELETE FROM feedback WHERE id_feedback = $id_feed") or die(mysqli_error($koneksi));
if($hfeed){
    $_SESSION['notif'] = "Berhasil Di Hapus";
header('location: feedback');
}  else {
echo '
<script>alert("Gagal");
window.location.href="feedback"
</script>';
}

?>