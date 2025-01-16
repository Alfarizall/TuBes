<?php
include('koneksi.php');

$id_bayi = $_POST['id_bayi'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$id_desa = $_POST['id_desa'];

$query = "UPDATE bayi SET id_bayi = '$id_bayi', nama = '$nama', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', id_desa = '$id_desa' WHERE id_bayi = '$id_bayi'";
if($koneksi->query($query)) {
    header("location: tampilbayi.php");
} else {
    echo "Data Gagal Diupate!";
}
?>