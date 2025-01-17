<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Riwayat Imunisasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="tambah.css">
</head>
<body>

    <div class="container">
        <!-- Button to view data -->
        <form method="POST" action="tampilriwim.php">
            <button type="submit" class="btn btn-outline-primary btn-block mb-4">Kembali</button>
        </form>
        
        <h3>Tambah Riwayat Imunisasi</h3>
        
        <!-- Alert for success or failure messages -->
        <?php if (isset($_GET['status']) && $_GET['status'] == 'success') { ?>
            <div class="alert alert-success alert-custom" role="alert">
                Data berhasil disimpan!
            </div>
        <?php } elseif (isset($_GET['status']) && $_GET['status'] == 'error') { ?>
            <div class="alert alert-danger alert-custom" role="alert">
                Gagal menyimpan data! Silakan coba lagi.
            </div>
        <?php } ?>
        <?php
        include 'koneksi.php';
            // Query untuk mengambil data dari tabel terkait
            $sql1 = "SELECT id_bayi, nama FROM bayi"; // Sesuaikan nama tabel dan kolom
            $result1 = $koneksi->query($sql1);
        ?>
        <?php
            // Query untuk mengambil data dari tabel terkait
            $sql2 = "SELECT lokasi FROM jadwal_imunisasi"; // Sesuaikan nama tabel dan kolom
            $result2 = $koneksi->query($sql2);
        ?>
        <?php
            // Query untuk mengambil data dari tabel terkait
            $sql3 = "SELECT id_petugas, nama_petugas FROM petugas_imunisasi"; // Sesuaikan nama tabel dan kolom
            $result3 = $koneksi->query($sql3);
        ?>
        
        <form method="post" action="inputriwim.php">
            <div class="form-group">
                <label for="id_bayi">ID Bayi</label>
                <select class="form-control" id="id_bayi" name="id_bayi" required>
                <?php
                if ($result1->num_rows > 0) {
                // Loop untuk membuat opsi dropdown
                while ($row = $result1->fetch_assoc()) {
                    echo "<option value='" . $row['id_bayi'] . "'>" . $row['id_bayi'] . " - " . $row['nama'] . "</option>";
                }
                } else {
                echo "<option value=''>Data tidak tersedia</option>";
                }
                ?>
                </select>
            </div>

            <div class="form-group">
                <label for="jenis_vaksin">Jenis Vaksin</label>
                <select class="form-control" id="jenis_vaksin" name="jenis_vaksin" required>
                    <option value="BCG">BCG</option>
                    <option value="DPT">DPT</option>
                    <option value="Polio">Polio</option>
                    <option value="Hepatitis B">Hepatitis B</option>
                    <option value="Campak">Campak</option>
                </select>
            </div>            
            
            <div class="form-group">
                <label for="tgl_imunisasi">Tanggal Imunisasi</label>
                <input type="date" name="tgl_imunisasi" class="form-control" id="tgl_imunisasi" required>
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <select class="form-control" id="lokasi" name="lokasi" required>
                <?php
                if ($result2->num_rows > 0) {
                // Loop untuk membuat opsi dropdown
                while ($row = $result2->fetch_assoc()) {
                    echo "<option value='" . $row['lokasi'] . "'>" . $row['lokasi'] . "</option>";
                }
                } else {
                echo "<option value=''>Data tidak tersedia</option>";
                }
                ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_petugas">Petugas</label>
                <select class="form-control" id="id_petugas" name="id_petugas" required>
                <?php
                if ($result3->num_rows > 0) {
                // Loop untuk membuat opsi dropdown
                while ($row = $result3->fetch_assoc()) {
                    echo "<option value='" . $row['id_petugas'] . "'>" . $row['id_petugas'] . " - " . $row['nama_petugas'] . "</option>";
                }
                } else {
                echo "<option value=''>Data tidak tersedia</option>";
                }
                ?>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-custom">Simpan</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
