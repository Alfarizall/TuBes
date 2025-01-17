<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Petugas</title>
	<link rel="stylesheet" href="ubah.css">
</head>
<body>

<div class="container">
    <h2>Update Data Petugas</h2>
    <a class="back-link" href="tampilpetugas.php">← Kembali</a>

    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($koneksi,"select * from petugas_imunisasi where id_petugas='$id'");
    while($d = mysqli_fetch_array($data)){
    ?>
    <form method="post" action="updatepetugas.php">
        <table>
            <tr>
                <td>Nama Petugas</td>
                <input type="hidden" name="id_petugas" value="<?php echo $d['id_petugas']; ?>">
                <td><input type="text" name="nama_petugas" value="<?php echo $d['nama_petugas']; ?>" required></td>
            </tr>
            <tr>            
                <td>Nomor Telepon</td>
                <td><input type="text" name="no_telepon" value="<?php echo $d['no_telepon']; ?>" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $d['alamat']; ?>" required></td>
            </tr>
            <td>Jenis Petugas</td>
                <td>
                <select name="jenis_petugas" class="form-select" id="jenis_petugas" required>
                    <option value="Bidan" <?php echo ($d['jenis_petugas'] == 'Bidan') ? 'selected' : ''; ?>>Bidan</option>
                    <option value="Dokter" <?php echo ($d['jenis_petugas'] == 'Dokter') ? 'selected' : ''; ?>>Dokter</option>
                </select>
            </tr>
            <tr>
                <td>Jadwal Tugas</td>
                <td><input type="text" name="jadwal_tugas" value="<?php echo $d['jadwal_tugas']; ?>" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Simpan">
                </td>
            </tr>
        </table>
    </form>
    <?php 
    }
    ?>
</div>

</body>
</html>
