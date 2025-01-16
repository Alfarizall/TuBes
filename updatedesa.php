<?php
include('koneksi.php');

$id_desa = $_POST['id_desa'];
$nama_desa = $_POST['nama_desa'];
$kecamatan = $_POST['kecamatan'];
$kabupaten = $_POST['kabupaten'];

$query = "UPDATE data_desa SET id_desa = '$id_desa', nama_desa = '$nama_desa', kecamatan = '$kecamatan', kabupaten = '$kabupaten' WHERE id_desa = '$id_desa'";
if($koneksi->query($query)) {
    header("location: tampildesa.php");
} else {
    echo "Data Gagal Diupate!";
}
?>