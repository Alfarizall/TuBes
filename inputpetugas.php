<?php
include 'koneksi.php'; // pastikan file koneksi Anda benar

// Ambil ID dokter terakhir dari database
$result = mysqli_query($koneksi, "SELECT id_petugas FROM petugas_imunisasi ORDER BY id_petugas DESC LIMIT 1");
$row = mysqli_fetch_assoc($result);

if ($row) {
    // Jika ada ID dokter, tambahkan 1 pada ID terakhir
    $last_id = $row['id_petugas'];
    $new_id = $last_id + 1;
} else {
    // Jika tidak ada data sama sekali, mulai dari ID awal, misalkan 10202
    $new_id = 10000;
}

// Ambil data lain dari form
$nama_petugas = $_POST['nama_petugas'];
$jenis_petugas = $_POST['jenis_petugas'];
$alamat = $_POST['alamat'];
$no_telepon = $_POST['no_telepon'];
$jadwal_tugas = $_POST['jadwal_tugas'];

// Simpan data ke dalam tabel dokter
$sql = "INSERT INTO petugas_imunisasi (id_petugas, nama_petugas, no_telepon, alamat, jenis_petugas, jadwal_tugas) 
        VALUES ('$new_id', '$nama_petugas', '$no_telepon', '$alamat', '$jenis_petugas', '$jadwal_tugas')";

if (mysqli_query($koneksi, $sql)) {
    // Redirect ke tampil_dokter.php jika sukses
    header("Location: tampilpetugas.php?status=success");
} else {
    // Redirect ke tampil_dokter.php jika gagal
    header("Location: tampilpetugas.php?status=error");
}
exit();
?>
