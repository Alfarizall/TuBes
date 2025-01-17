<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Bayi</title>
	<link rel="stylesheet" href="ubah.css">
</head>
<body>

<div class="container">
    <h2>Update Data Bayi</h2>
    <a class="back-link" href="tampilbayi.php">← Kembali</a>

    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($koneksi,"select * from bayi where id_bayi='$id'");
    while($d = mysqli_fetch_array($data)){
    ?>
    <?php
    include 'koneksi.php';
        // Query untuk mengambil data dari tabel terkait
    $sql = "SELECT id_desa, nama_desa FROM data_desa"; // Sesuaikan nama tabel dan kolom
    $result = $koneksi->query($sql);
    ?>
    <form method="post" action="updatebayi.php">
        <table>
            <tr>
                <td>Nama Bayi</td>
                <input type="hidden" name="id_bayi" value="<?php echo $d['id_bayi']; ?>">
                <td><input type="text" name="nama" value="<?php echo $d['nama']; ?>" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                <select name="jenis_kelamin" class="form-select" id="jenis_kelamin" required>
                    <option value="L" <?php echo ($d['jenis_kelamin'] == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="P" <?php echo ($d['jenis_kelamin'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $d['alamat']; ?>" required></td>
            </tr>
            <tr>
                <td>ID Desa</td>
                <td>
                <select name="id_desa" class="form-select" id="id_desa" required>
                <?php
                if ($result->num_rows > 0) {
                // Loop untuk membuat opsi dropdown
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id_desa'] . "'>" . $row['id_desa'] . " - " . $row['nama_desa'] . "</option>";
                }
                } else {
                echo "<option value=''>Data tidak tersedia</option>";
                }
                ?>    
                </select>
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
