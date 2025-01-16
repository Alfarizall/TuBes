<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Riwayat Imunisasi</title>
	<link rel="stylesheet" href="ubah.css">
</head>
<body>

<div class="container">
    <h2>Update Riwayat Imunisasi</h2>
    <a class="back-link" href="tampilriwim.php">← Kembali</a>

    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM riwayat_imunisasi WHERE id_riwayat='$id'");
    $d = mysqli_fetch_assoc($data);

    // Query untuk dropdown ID Bayi
    $sql1 = "SELECT id_bayi, nama FROM bayi";
    $result1 = $koneksi->query($sql1);

    $sql2 = "SELECT lokasi FROM jadwal_imunisasi"; // Sesuaikan nama tabel dan kolom
    $result2 = $koneksi->query($sql2);

    $sql3 = "SELECT id_petugas, nama_petugas FROM petugas_imunisasi"; // Sesuaikan nama tabel dan kolom
    $result3 = $koneksi->query($sql3);
    ?>

    <form method="post" action="updateriwim.php">
        <table>
            <tr>
                <td>ID Bayi</td>
                <input type="hidden" name="id_riwayat" value="<?php echo $d['id_riwayat']; ?>">
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
            <td>Jenis Vaksin</td>
                <td>
                <select name="jenis_vaksin" class="form-select" id="jenis_vaksin" required>
                    <option value="BCG" <?php echo ($d['jenis_vaksin'] == 'BCG') ? 'selected' : ''; ?>>BCG</option>
                    <option value="DPT" <?php echo ($d['jenis_vaksin'] == 'DPT') ? 'selected' : ''; ?>>DPT</option>
                    <option value="Polio" <?php echo ($d['jenis_vaksin'] == 'Polio') ? 'selected' : ''; ?>>Polio</option>
                    <option value="Hepatitis B" <?php echo ($d['jenis_vaksin'] == 'Hepatitis B') ? 'selected' : ''; ?>>Hepatitis B</option>
                    <option value="Campak" <?php echo ($d['jenis_vaksin'] == 'Campak') ? 'selected' : ''; ?>>Campak</option>
                </select>
            </tr>
            <tr>            
                <td>Tanggal Imunisasi</td>
                <td><input type="date" name="tgl_imunisasi" value="<?php echo $d['tgl_imunisasi']; ?>" required></td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td>
                    <select name="lokasi" class="form-select" id="lokasi" required>
                        <?php
                        while ($row = $result2->fetch_assoc()) {
                            $selected = $row['lokasi'] == $d['lokasi'] ? 'selected' : '';
                            echo "<option value='" . $row['lokasi'] . "' $selected>" . $row['lokasi'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Petugas</td>
                <td>
                    <select name="id_petugas" class="form-select" id="id_petugas" required>
                        <?php
                        while ($row = $result3->fetch_assoc()) {
                            $selected = $row['id_petugas'] == $d['id_petugas'] ? 'selected' : '';
                            echo "<option value='" . $row['id_petugas'] . "' $selected>" . $row['id_petugas'] . " - " . $row['nama_petugas'] . "</option>";
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
