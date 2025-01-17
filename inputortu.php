<?php
include 'koneksi.php'; // pastikan file koneksi Anda benar

// Ambil ID dokter terakhir dari database
$result = mysqli_query($koneksi, "SELECT id_orangtua FROM orangtua ORDER BY id_orangtua DESC LIMIT 1");
$row = mysqli_fetch_assoc($result);

if ($row) {
    // Jika ada ID dokter, tambahkan 1 pada ID terakhir
    $last_id = $row['id_orangtua'];
    $new_id = $last_id + 1;
} else {
    // Jika tidak ada data sama sekali, mulai dari ID awal, misalkan 10202
    $new_id = 10000;
}

// Ambil data lain dari form
$id_bayi = $_POST['id_bayi'];
$nama_ayah = $_POST['nama_ayah'];
$nama_ibu = $_POST['nama_ibu'];
$alamat = $_POST['alamat'];
$id_desa = $_POST['id_desa'];

// Simpan data ke dalam tabel dokter
$sql = "INSERT INTO orangtua (id_orangtua, id_bayi, nama_ayah, nama_ibu, alamat, id_desa) 
        VALUES ('$new_id', '$id_bayi', '$nama_ayah', '$nama_ibu', '$alamat', '$id_desa')";

if (mysqli_query($koneksi, $sql)) {
    // Redirect ke tampil_dokter.php jika sukses
    header("Location: tampilortu.php?status=success");
} else {
    // Redirect ke tampil_dokter.php jika gagal
    header("Location: tampilortu.php?status=error");
}
exit();
?>
