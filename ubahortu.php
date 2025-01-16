<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Orangtua</title>
	<link rel="stylesheet" href="ubah.css">
</head>
<body>

<div class="container">
    <h2>Update Data Orangtua</h2>
    <a class="back-link" href="tampilortu.php">← Kembali</a>

    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM orangtua WHERE id_orangtua='$id'");
    $d = mysqli_fetch_assoc($data);

    // Query untuk dropdown ID Bayi
    $sql1 = "SELECT id_bayi, nama FROM bayi";
    $result1 = $koneksi->query($sql1);

    $sql2 = "SELECT id_desa, nama_desa FROM data_desa"; // Sesuaikan nama tabel dan kolom
    $result2 = $koneksi->query($sql2);
    ?>

    <form method="post" action="updateortu.php">
        <table>
            <tr>
                <td>ID Bayi</td>
                <input type="hidden" name="id_orangtua" value="<?php echo $d['id_orangtua']; ?>">
                <td>
                    <select name="id_bayi" class="form-select" id="id_bayi" required>
                        <?php
                        while ($row = $result1->fetch_assoc()) {
                            $selected = $row['id_bayi'] == $d['id_bayi'] ? 'selected' : '';
                            echo "<option value='" . $row['id_bayi'] . "' $selected>" . $row['id_bayi'] . " - " . $row['nama'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nama Ayah</td>
                <td><input type="text" name="nama_ayah" class="form-control" id="nama_ayah" value="<?php echo $d['nama_ayah']; ?>" required></td>
            </tr>
            <tr>
                <td>Nama Ibu</td>
                <td><input type="text" name="nama_ibu" class="form-control" id="nama_ibu" value="<?php echo $d['nama_ibu']; ?>" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $d['alamat']; ?>" required></td>
            </tr>
            <tr>
                <td>ID Desa</td>
                <td>
                    <select name="id_desa" class="form-select" id="id_desa" required>
                        <?php
                        while ($row = $result2->fetch_assoc()) {
                            $selected = $row['id_desa'] == $d['id_desa'] ? 'selected' : '';
                            echo "<option value='" . $row['id_desa'] . "' $selected>" . $row['id_desa'] . " - " . $row['nama_desa'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Simpan">
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
