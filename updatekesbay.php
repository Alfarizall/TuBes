<?php
include('koneksi.php');

$id_kesehatan = $_POST['id_kesehatan'];
$id_bayi = $_POST['id_bayi'];
$tgl_cek = $_POST['tgl_cek'];
$berat_badan = $_POST['berat_badan'];
$tinggi_badan = $_POST['tinggi_badan'];
$status_gizi = $_POST['status_gizi'];

$query = "UPDATE kesehatan_bayi SET id_kesehatan = '$id_kesehatan', id_bayi = '$id_bayi', tgl_cek = '$tgl_cek', berat_badan = '$berat_badan', tinggi_badan = '$tinggi_badan', status_gizi = '$status_gizi' WHERE id_kesehatan = '$id_kesehatan'";
if($koneksi->query($query)) {
    header("location: tampilkesbay.php");
} else {
    echo "Data Gagal Diupate!";
}
?>