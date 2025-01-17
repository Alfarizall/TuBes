<?php
include 'koneksi.php'; // pastikan file koneksi Anda benar

// Ambil ID dokter terakhir dari database
$result = mysqli_query($koneksi, "SELECT id_riwayat FROM orangtua ORDER BY id_riwayat DESC LIMIT 1");
$row = mysqli_fetch_assoc($result);

if ($row) {
    // Jika ada ID dokter, tambahkan 1 pada ID terakhir
    $last_id = $row['id_riwayat'];
    $new_id = $last_id + 1;
} else {
    // Jika tidak ada data sama sekali, mulai dari ID awal, misalkan 10202
    $new_id = 10000;
}

// Ambil data lain dari form
$id_bayi = $_POST['id_bayi'];
$jenis_vaksin = $_POST['jenis_vaksin'];
$tgl_imunisasi = $_POST['tgl_imunisasi'];
$lokasi = $_POST['lokasi'];
$nama_petugas = $_POST['nama_petugas'];

// Simpan data ke dalam tabel dokter
$sql = "INSERT INTO orangtua (id_riwayat, id_bayi, jenis_vaksin, tgl_imunisasi, lokasi, nama_petugas) 
        VALUES ('$new_id', '$id_bayi', '$jenis_vaksin', '$tgl_imunisasi', '$lokasi', '$nama_petugas')";

if (mysqli_query($koneksi, $sql)) {
    // Redirect ke tampil_dokter.php jika sukses
    header("Location: tampilriwim.php?status=success");
} else {
    // Redirect ke tampil_dokter.php jika gagal
    header("Location: tampilriwim.php?status=error");
}
exit();
?>
