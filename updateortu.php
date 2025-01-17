<?php
include('koneksi.php');

$id_orangtua = $_POST['id_orangtua'];
$id_bayi = $_POST['id_bayi'];
$nama_ayah = $_POST['nama_ayah'];
$nama_ibu = $_POST['nama_ibu'];
$alamat = $_POST['alamat'];
$id_desa = $_POST['id_desa'];

$query = "UPDATE orangtua SET id_orangtua = '$id_orangtua', id_bayi = '$id_bayi', nama_ayah = '$nama_ayah', nama_ibu = '$nama_ibu', alamat = '$alamat', id_desa = '$id_desa' WHERE id_orangtua = '$id_orangtua'";
if($koneksi->query($query)) {
    header("location: tampilortu.php");
} else {
    echo "Data Gagal Diupate!";
}
?>