<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal Imunisasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="tambah.css">
</head>
<body>

    <div class="container">
        <!-- Button to view data -->
        <form method="POST" action="tampiljadim.php">
            <button type="submit" class="btn btn-outline-primary btn-block mb-4">Kembali</button>
        </form>
        
        <h3>Tambah Jadwal Imunisasi</h3>
        
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
            $sql2 = "SELECT id_petugas, nama_petugas FROM petugas_imunisasi"; // Sesuaikan nama tabel dan kolom
            $result2 = $koneksi->query($sql2);
        ?>
        <?php
            // Query untuk mengambil data dari tabel terkait
            $sql1 = "SELECT id_desa, nama_desa FROM data_desa"; // Sesuaikan nama tabel dan kolom
            $result1 = $koneksi->query($sql1);
        ?>
        
        <form method="post" action="inputjadim.php">
            <div class="form-group">
                <label for="id_desa">ID Desa</label>
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
            </div>

            <div class="form-group">
                <label for="tgl_imunisasi">Tanggal Imunisasi</label>
                <input type="date" name="tgl_imunisasi" class="form-control" id="tgl_imunisasi" required>
            </div>

            <div class="form-group">
                <label for="waktu_mulai">Waktu Mulai</label>
                <input class="form-control" type="time" id="waktu_mulai" name="waktu_mulai" required placeholder="Masukkan waktu mulai">
            </div>
            
            <div class="form-group">
                <label for="waktu_selesai">Waktu Selesai</label>
                <input class="form-control" type="time" id="waktu_selesai" name="waktu_selesai" required placeholder="Masukkan waktu selesai">
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input class="form-control" type="text" id="lokasi" name="lokasi" required placeholder="Masukkan lokasi">
            </div>

            <div class="form-group">
                <label for="id_petugas">ID Petugas</label>
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
                <button type="submit" class="btn btn-custom">Simpan</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
