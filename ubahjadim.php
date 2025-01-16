<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Jadwal Imunisasi</title>
	<link rel="stylesheet" href="ubah.css">
</head>
<body>

<div class="container">
    <h2>Update Jadwal Imunisasi</h2>
    <a class="back-link" href="tampiljadim.php">← Kembali</a>

    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM jadwal_imunisasi WHERE id_jadwal='$id'");
    $d = mysqli_fetch_assoc($data);

    // Query untuk dropdown ID Bayi
    $sql2 = "SELECT id_petugas, nama_petugas FROM petugas_imunisasi"; // Sesuaikan nama tabel dan kolom
    $result2 = $koneksi->query($sql2);

    $sql1 = "SELECT id_desa, nama_desa FROM data_desa"; // Sesuaikan nama tabel dan kolom
    $result1 = $koneksi->query($sql1);
    ?>
    <form method="post" action="updatejadim.php">
        <table>
            <tr>
                <td>ID Desa</td>
                <input type="hidden" name="id_jadwal" value="<?php echo $d['id_jadwal']; ?>">
                <td>
                    <select class="form-control" id="id_desa" name="id_desa" required>
                    <?php
                    if ($result1->num_rows > 0) {
                    // Loop untuk membuat opsi dropdown
                    while ($row = $result1->fetch_assoc()) {
                        echo "<option value='" . $row['id_desa'] . "'>" . $row['id_desa'] . " - " . $row['nama_desa'] . "</option>";
                    }
                    } else {
                    echo "<option value=''>Data tidak tersedia</option>";
                    }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>            
                <td>Tanggal Imunisasi</td>
                <td><input type="date" name="tgl_imunisasi" value="<?php echo $d['tgl_imunisasi']; ?>" required></td>
            </tr>
            <tr>
                <td>Waktu Mulai</td>
                <td><input type="time" name="waktu_mulai" value="<?php echo $d['waktu_mulai']; ?>" required></td>
            </tr>
            <tr>
                <td>Waktu Selesai</td>
                <td><input type="time" name="waktu_selesai" value="<?php echo $d['waktu_selesai']; ?>" required></td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td><input type="text" name="lokasi" value="<?php echo $d['lokasi']; ?>" required></td>
            </tr>
            <tr>
                <td>ID Petugas</td>
                <td>
                    <select class="form-control" id="id_petugas" name="id_petugas" required>
                    <?php
                    if ($result2->num_rows > 0) {
                    // Loop untuk membuat opsi dropdown
                    while ($row = $result2->fetch_assoc()) {
                        echo "<option value='" . $row['id_petugas'] . "'>" . $row['id_petugas'] . " - " . $row['nama_petugas'] . "</option>";
                    }
                    } else {
                    echo "<option value=''>Data tidak tersedia</option>";
                    }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
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
                <td colspan="2">
                    <input type="submit" value="Simpan">
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
