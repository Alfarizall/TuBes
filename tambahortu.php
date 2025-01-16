<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Orangtua</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="tambah.css">
</head>
<body>

    <div class="container">
        <!-- Button to view data -->
        <form method="POST" action="tampilortu.php">
            <button type="submit" class="btn btn-outline-primary btn-block mb-4">Kembali</button>
        </form>
        
        <h3>Tambah Data Orangtua</h3>
        
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
            $sql2 = "SELECT id_bayi, nama FROM bayi"; // Sesuaikan nama tabel dan kolom
            $result2 = $koneksi->query($sql2);
        ?>
        <?php
            // Query untuk mengambil data dari tabel terkait
            $sql1 = "SELECT id_desa, nama_desa FROM data_desa"; // Sesuaikan nama tabel dan kolom
            $result1 = $koneksi->query($sql1);
        ?>
        
        <form method="post" action="inputortu.php">
            <div class="form-group">
                <label for="id_bayi">ID Bayi</label>
                <select class="form-control" id="id_bayi" name="id_bayi" required>
                <?php
                if ($result2->num_rows > 0) {
                // Loop untuk membuat opsi dropdown
                while ($row = $result2->fetch_assoc()) {
                    echo "<option value='" . $row['id_bayi'] . "'>" . $row['id_bayi'] . " - " . $row['nama'] . "</option>";
                }
                } else {
                echo "<option value=''>Data tidak tersedia</option>";
                }
                ?>
                </select>
            </div>

            <div class="form-group">
                <label for="nama_ayah">Nama Ayah</label>
                <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" required placeholder="Masukkan nama ayah">
            </div>

            <div class="form-group">
                <label for="nama_ibu">Nama Ibu</label>
                <input type="text" name="nama_ibu" class="form-control" id="nama_ibu" required placeholder="Masukkan nama ibu">
            </div>            
            
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input class="form-control" type="text" id="alamat" name="alamat" required placeholder="Masukkan alamat">
            </div>

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
                <button type="submit" class="btn btn-custom">Simpan</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
