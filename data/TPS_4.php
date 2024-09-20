<?php
include "../login/function.php";

$sql = "SELECT * FROM tps WHERE longitude > 0";
$hasil = mysqli_query($koneksi, $sql);

?>
var json_TPS_4 = {
  type: "FeatureCollection",
  name: "TPS_4",
  crs: { type: "name", properties: { name: "urn:ogc:def:crs:OGC:1.3:CRS84" } },
  features: [
    <?php
    $first = true; // untuk menghindari koma di akhir
    while($a = mysqli_fetch_array($hasil)){
        $id = $a['id_tps'];
        $nama = $a['nama_tps'];
        $al = $a['alamat'];
        $op = $a['jam_operasional'];
        $im = $a['image'];
        $lat = $a['lattitude'];
        $lng = $a['longitude'];
        
        // Escape karakter untuk JSON, fungsinya addslashes untuk menambahkan backslash
        $id = addslashes($id);
        $nama = addslashes($nama);
        $al = addslashes($al);
        $op = addslashes($op);

        // Escape karakter untuk HTML di dalam JSON
        $formAction = 'detail.php';
        $hiddenInput = '<input type="hidden" name="id_tps" value="'.$id.'">';
        $button = '<button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-scroll"></i> Detail</button>';
        $detail = '<form action="'.$formAction.'" method="GET">'.$hiddenInput.$button.'</form>';
        $detail = addslashes($detail);

        if (!$first) {
            echo ",";
        } else {
            $first = false;
        }
    ?>
    {
      type: "Feature",
      properties: {
        id: "<?= $id; ?>",
        nama_tps: "<?= $nama; ?>",
        alamat: "<?= $al; ?>",
        operasi: "<?= $op; ?>",
        detail: "<?= $detail; ?>"
      },
      geometry: {
        type: "Point",
        coordinates: [ <?= $lng; ?>, <?= $lat; ?> ],
      }
    }
    <?php } ?>
  ]
};
