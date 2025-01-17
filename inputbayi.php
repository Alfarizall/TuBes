<?php
include 'koneksi.php'; // pastikan file koneksi Anda benar

// Ambil ID dokter terakhir dari database
$result = mysqli_query($koneksi, "SELECT id_bayi FROM bayi ORDER BY id_bayi DESC LIMIT 1");
$row = mysqli_fetch_assoc($result);

if ($row) {
    // Jika ada ID dokter, tambahkan 1 pada ID terakhir
    $last_id = $row['id_bayi'];
    $new_id = $last_id + 1;
} else {
    // Jika tidak ada data sama sekali, mulai dari ID awal, misalkan 10202
    $new_id = 10000;
}

// Ambil data lain dari form
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$id_desa = $_POST['id_desa'];

// Simpan data ke dalam tabel dokter
$sql = "INSERT INTO bayi (id_bayi, nama, jenis_kelamin, alamat, id_desa) 
        VALUES ('$new_id', '$nama', '$jenis_kelamin', '$alamat', '$id_desa')";

if (mysqli_query($koneksi, $sql)) {
    // Redirect ke tampil_dokter.php jika sukses
    header("Location: tampilbayi.php?status=success");
} else {
    // Redirect ke tampil_dokter.php jika gagal
    header("Location: tampilbayi.php?status=error");
}
exit();
?>
