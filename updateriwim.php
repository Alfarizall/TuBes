<?php
include('koneksi.php');

$id_riwayat = $_POST['id_riwayat'];
$id_bayi = $_POST['id_bayi'];
$jenis_vaksin = $_POST['jenis_vaksin'];
$tgl_imunisasi = $_POST['tgl_imunisasi'];
$lokasi = $_POST['lokasi'];
$nama_petugas = $_POST['nama_petugas'];

$query = "UPDATE riwayat_imunisasi SET id_riwayat = '$id_riwayat', id_bayi = '$id_bayi', jenis_vaksin = '$jenis_vaksin', tgl_imunisasi = '$tgl_imunisasi', lokasi = '$lokasi', nama_petugas = '$nama_petugas' WHERE id_riwayat = '$id_riwayat'";
if($koneksi->query($query)) {
    header("location: tampilriwim.php");
} else {
    echo "Data Gagal Diupate!";
}
?>