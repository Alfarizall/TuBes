<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Desa</title>
	<link rel="stylesheet" href="ubah.css">
</head>
<body>

<div class="container">
    <h2>Update Data Desa</h2>
    <a class="back-link" href="tampildesa.php">← Kembali</a>

    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($koneksi,"select * from data_desa where id_desa='$id'");
    while($d = mysqli_fetch_array($data)){
    ?>
    <form method="post" action="updatedesa.php">
        <table>
            <tr>
                <td>Nama Desa</td>
                <input type="hidden" name="id_desa" value="<?php echo $d['id_desa']; ?>">
                <td><input type="text" name="nama_desa" value="<?php echo $d['nama_desa']; ?>" required></td>
            </tr>
            <tr>            
                <td>Kecamatan</td>
                <td><input type="text" name="kecamatan" value="<?php echo $d['kecamatan']; ?>" required></td>
            </tr>
            <tr>
                <td>Kabupaten</td>
                <td><input type="text" name="kabupaten" value="<?php echo $d['kabupaten']; ?>" required></td>
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
