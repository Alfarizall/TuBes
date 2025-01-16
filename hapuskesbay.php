<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from kesehatan_bayi where id_kesehatan='$id'");

 
// mengalihkan halaman kembali ke index.php
header("location:tampilkesbay.php");
 
?>