<?php
include 'koneksi.php'; // pastikan file koneksi Anda benar

// Ambil ID dokter terakhir dari database
$result = mysqli_query($koneksi, "SELECT id_kesehatan FROM kesehatan_bayi ORDER BY id_kesehatan DESC LIMIT 1");
$row = mysqli_fetch_assoc($result);

if ($row) {
    // Jika ada ID dokter, tambahkan 1 pada ID terakhir
    $last_id = $row['id_kesehatan'];
    $new_id = $last_id + 1;
} else {
    // Jika tidak ada data sama sekali, mulai dari ID awal, misalkan 10202
    $new_id = 10000;
}

// Ambil data lain dari form
$id_bayi = $_POST['id_bayi'];
$tgl_cek = $_POST['tgl_cek'];
$berat_badan = $_POST['berat_badan'];
$tinggi_badan = $_POST['tinggi_badan'];
$status_gizi = $_POST['status_gizi'];

// Simpan data ke dalam tabel dokter
$sql = "INSERT INTO kesehatan_bayi (id_kesehatan, id_bayi, tgl_cek, berat_badan, tinggi_badan, status_gizi) 
        VALUES ('$new_id', '$id_bayi', '$tgl_cek', '$berat_badan', '$tinggi_badan', '$status_gizi')";

if (mysqli_query($koneksi, $sql)) {
    // Redirect ke tampil_dokter.php jika sukses
    header("Location: tampilkesbay.php?status=success");
} else {
    // Redirect ke tampil_dokter.php jika gagal
    header("Location: tampilkesbay.php?status=error");
}
exit();
?>
