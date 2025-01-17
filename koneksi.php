<?php 
 
$koneksi = mysqli_connect("localhost","u653738019_root","Imun1234","u653738019_imunisasi");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>