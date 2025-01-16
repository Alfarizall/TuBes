<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Kesehatan Bayi</title>
	<link rel="stylesheet" href="ubah.css">
</head>
<body>

<div class="container">
    <h2>Update Data Kesehatan Bayi</h2>
    <a class="back-link" href="tampilkesbay.php">← Kembali</a>

    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM kesehatan_bayi WHERE id_kesehatan='$id'");
    $d = mysqli_fetch_assoc($data);

    // Query untuk dropdown ID Bayi
    $sql = "SELECT id_bayi, nama FROM bayi";
    $result = $koneksi->query($sql);
    ?>

    <form method="post" action="updatekesbay.php">
        <table>
            <tr>
                <td>ID Bayi</td>
                <input type="hidden" name="id_kesehatan" value="<?php echo $d['id_kesehatan']; ?>">
                <td>
                    <select name="id_bayi" class="form-select" id="id_bayi" required>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $selected = $row['id_bayi'] == $d['id_bayi'] ? 'selected' : '';
                            echo "<option value='" . $row['id_bayi'] . "' $selected>" . $row['id_bayi'] . " - " . $row['nama'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Pemeriksaan</td>
                <td><input type="date" name="tgl_cek" class="form-control" id="tgl_cek" value="<?php echo $d['tgl_cek']; ?>" required></td>
            </tr>
            <tr>
                <td>Berat Badan</td>
                <td><input type="number" name="berat_badan" value="<?php echo $d['berat_badan']; ?>" required step="0.01" min="0"></td>
            </tr>
            <tr>
                <td>Tinggi Badan</td>
                <td><input type="number" name="tinggi_badan" value="<?php echo $d['tinggi_badan']; ?>" required step="0.01" min="0"></td>
            </tr>
            <tr>
                <td>Status Gizi</td>
                <td>
                    <select class="form-control" id="status_gizi" name="status_gizi" required>
                        <option value="kurang" <?php echo $d['status_gizi'] == 'kurang' ? 'selected' : ''; ?>>Kurang</option>
                        <option value="normal" <?php echo $d['status_gizi'] == 'normal' ? 'selected' : ''; ?>>Normal</option>
                        <option value="berlebih" <?php echo $d['status_gizi'] == 'berlebih' ? 'selected' : ''; ?>>Berlebih</option>
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
