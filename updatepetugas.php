<?php
include('koneksi.php');

$id_petugas = $_POST['id_petugas'];
$nama_petugas = $_POST['nama_petugas'];
$jenis_petugas = $_POST['jenis_petugas'];
$alamat = $_POST['alamat'];
$no_telepon = $_POST['no_telepon'];
$jadwal_tugas = $_POST['jadwal_tugas'];

$query = "UPDATE petugas_imunisasi SET id_petugas = '$id_petugas', nama_petugas = '$nama_petugas', no_telepon = '$no_telepon', alamat = '$alamat', jenis_petugas = '$jenis_petugas', jadwal_tugas = '$jadwal_tugas' WHERE id_petugas = '$id_petugas'";
if($koneksi->query($query)) {
    header("location: tampilpetugas.php");
} else {
    echo "Data Gagal Diupate!";
}
?>