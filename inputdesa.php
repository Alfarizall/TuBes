<?php
include 'koneksi.php'; // pastikan file koneksi Anda benar

// Ambil ID dokter terakhir dari database
$result = mysqli_query($koneksi, "SELECT id_desa FROM data_desa ORDER BY id_desa DESC LIMIT 1");
$row = mysqli_fetch_assoc($result);

if ($row) {
    // Jika ada ID dokter, tambahkan 1 pada ID terakhir
    $last_id = $row['id_desa'];
    $new_id = $last_id + 1;
} else {
    // Jika tidak ada data sama sekali, mulai dari ID awal, misalkan 10202
    $new_id = 10000;
}

// Ambil data lain dari form
$nama_desa = $_POST['nama_desa'];
$kecamatan = $_POST['kecamatan'];
$kabupaten = $_POST['kabupaten'];

// Simpan data ke dalam tabel dokter
$sql = "INSERT INTO data_desa (id_desa, nama_desa, kecamatan, kabupaten) 
        VALUES ('$new_id', '$nama_desa', '$kecamatan', '$kabupaten')";

if (mysqli_query($koneksi, $sql)) {
    // Redirect ke tampil_dokter.php jika sukses
    header("Location: tampildesa.php?status=success");
} else {
    // Redirect ke tampil_dokter.php jika gagal
    header("Location: tampildesa.php?status=error");
}
exit();
?>
