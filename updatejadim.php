<?php
include('koneksi.php');

$id_jadwal = $_POST['id_jadwal'];
$id_desa = $_POST['id_desa'];
$tgl_imunisasi = $_POST['tgl_imunisasi'];
$waktu_mulai = $_POST['waktu_mulai'];
$waktu_selesai = $_POST['waktu_selesai'];
$lokasi = $_POST['lokasi'];
$id_petugas = $_POST['id_petugas'];
$jenis_vaksin = $_POST['jenis_vaksin'];

$query = "UPDATE jadwal_imunisasi SET id_jadwal = '$id_jadwal', id_desa = '$id_desa', tgl_imunisasi = '$tgl_imunisasi', waktu_mulai = '$waktu_mulai', waktu_selesai = '$waktu_selesai', lokasi = '$lokasi', id_petugas = '$id_petugas', jenis_vaksin = '$jenis_vaksin' WHERE id_jadwal = '$id_jadwal'";
if($koneksi->query($query)) {
    header("location: tampiljadim.php");
} else {
    echo "Data Gagal Diupate!";
}
?>