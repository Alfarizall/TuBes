<?php
include 'koneksi.php'; // pastikan file koneksi Anda benar

// Ambil ID dokter terakhir dari database
$result = mysqli_query($koneksi, "SELECT iduser FROM users ORDER BY iduser DESC LIMIT 1");
$row = mysqli_fetch_assoc($result);

if ($row) {
    // Jika ada ID dokter, tambahkan 1 pada ID terakhir
    $last_id = $row['iduser'];
    $new_id = $last_id + 1;
} else {
    // Jika tidak ada data sama sekali, mulai dari ID awal, misalkan 10202
    $new_id = 10000;
}

// Ambil data lain dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Simpan data ke dalam tabel dokter
$sql = "INSERT INTO users (iduser, username, password) 
        VALUES ('$new_id', '$username', '$password')";

if (mysqli_query($koneksi, $sql)) {
    // Redirect ke tampil_dokter.php jika sukses
    header("Location: tampiluser.php?status=success");
} else {
    // Redirect ke tampil_dokter.php jika gagal
    header("Location: tampiluser.php?status=error");
}
exit();
?>
