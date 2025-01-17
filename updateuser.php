<?php
include('koneksi.php');

$iduser = $_POST['iduser'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = "UPDATE users SET iduser = '$iduser', username = '$username', password = '$password' WHERE iduser = '$iduser'";
if($koneksi->query($query)) {
    header("location: tampiluser.php");
} else {
    echo "Data Gagal Diupate!";
}
?>