<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from data_desa where id_desa='$id'");

 
// mengalihkan halaman kembali ke index.php
header("location:tampildesa.php");
 
?>