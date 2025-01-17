<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kesehatan Bayi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="tambah.css">
</head>
<body>

    <div class="container">
        <!-- Button to view data -->
        <form method="POST" action="tampilkesbay.php">
            <button type="submit" class="btn btn-outline-primary btn-block mb-4">Kembali</button>
        </form>
        
        <h3>Tambah Data Kesehatan Bayi</h3>
        
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
            $sql = "SELECT id_bayi, nama FROM bayi"; // Sesuaikan nama tabel dan kolom
            $result = $koneksi->query($sql);
        ?>
        
        <form method="post" action="inputkesbay.php">
            <div class="form-group">
                <label for="id_bayi">ID Bayi</label>
                <select class="form-control" id="id_bayi" name="id_bayi" required>
                <?php
                if ($result->num_rows > 0) {
                // Loop untuk membuat opsi dropdown
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id_bayi'] . "'>" . $row['id_bayi'] . " - " . $row['nama'] . "</option>";
                }
                } else {
                echo "<option value=''>Data tidak tersedia</option>";
                }
                ?>
                </select>
            </div>

            <div class="form-group">
                <label for="tgl_cek">Tanggal Pemeriksaan</label>
                <input type="date" name="tgl_cek" class="form-control" id="tgl_cek" required>
            </div>

            <div class="form-group">
                <label for="berat_badan">Berat Badan</label>
                <input class="form-control" type="number" id="berat_badan" name="berat_badan" required placeholder="Masukkan Berat Badan" step="0.01" min="0">
            </div>
            
            <div class="form-group">
                <label for="tinggi_badan">Tinggi Badan</label>
                <input class="form-control" type="number" id="tinggi_badan" name="tinggi_badan" required placeholder="Masukkan Tinggi Badan" step="0.01" min="0">
            </div>

            <div class="form-group">
                <label for="status_gizi">Status Gizi</label>
                <select class="form-control" id="status_gizi" name="status_gizi" required>
                    <option value="kurang">Kurang</option>
                    <option value="normal">Normal</option>
                    <option value="berlebih">Berlebihan</option>
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
