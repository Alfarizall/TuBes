<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Bayi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="tambah.css">
</head>
<body>

    <div class="container">
        <!-- Button to view data -->
        <form method="POST" action="tampilbayi.php">
            <button type="submit" class="btn btn-outline-primary btn-block mb-4">Kembali</button>
        </form>
        
        <h3>Tambah Data Bayi</h3>
        
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
            $sql = "SELECT id_desa, nama_desa FROM data_desa"; // Sesuaikan nama tabel dan kolom
            $result = $koneksi->query($sql);
        ?>

        <form method="post" action="inputbayi.php">
            <div class="form-group">
                <label for="nama">Nama Bayi</label>
                <input class="form-control" type="text" id="nama" name="nama" required placeholder="Masukkan nama bayi">
            </div>
                        
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="">Pilih jenis kelamin</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input class="form-control" type="text" id="alamat" name="alamat" required placeholder="Masukkan Alamat">
            </div>
            
            <div class="form-group">
                <label for="id_desa">ID Desa</label>
                <select class="form-control" id="id_desa" name="id_desa" required>
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
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-custom">Simpan</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
