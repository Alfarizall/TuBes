<?php
include 'koneksi.php'; // pastikan file koneksi Anda benar

// Ambil ID dokter terakhir dari database
$result = mysqli_query($koneksi, "SELECT id_jadwal FROM jadwal_imunisasi ORDER BY id_jadwal DESC LIMIT 1");
$row = mysqli_fetch_assoc($result);

if ($row) {
    // Jika ada ID dokter, tambahkan 1 pada ID terakhir
    $last_id = $row['id_jadwal'];
    $new_id = $last_id + 1;
} else {
    // Jika tidak ada data sama sekali, mulai dari ID awal, misalkan 10202
    $new_id = 10000;
}

// Ambil data lain dari form
$id_desa = $_POST['id_desa'];
$tgl_imunisasi = $_POST['tgl_imunisasi'];
$waktu_mulai = $_POST['waktu_mulai'];
$waktu_selesai = $_POST['waktu_selesai'];
$lokasi = $_POST['lokasi'];
$id_petugas = $_POST['id_petugas'];
$jenis_vaksin = $_POST['jenis_vaksin'];

// Simpan data ke dalam tabel dokter
$sql = "INSERT INTO jadwal_imunisasi (id_jadwal, id_desa, tgl_imunisasi, waktu_mulai, waktu_selesai, lokasi, id_petugas, jenis_vaksin) 
        VALUES ('$new_id', '$id_desa', '$tgl_imunisasi', '$waktu_mulai', '$waktu_selesai', '$lokasi', '$id_petugas', '$jenis_vaksin')";

if (mysqli_query($koneksi, $sql)) {
    // Redirect ke tampil_dokter.php jika sukses
    header("Location: tampiljadim.php?status=success");
} else {
    // Redirect ke tampil_dokter.php jika gagal
    header("Location: tampiljadim.php?status=error");
}
exit();
?>
