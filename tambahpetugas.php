<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Petugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="tambah.css">
</head>
<body>

    <div class="container">
        <!-- Button to view data -->
        <form method="POST" action="tampilpetugas.php">
            <button type="submit" class="btn btn-outline-primary btn-block mb-4">Kembali</button>
        </form>
        
        <h3>Tambah Data Petugas</h3>
        
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
        
        <form method="post" action="inputpetugas.php">
            <div class="form-group">
                <label for="nama_petugas">Nama Petugas</label>
                <input class="form-control" type="text" id="nama_petugas" name="nama_petugas" required placeholder="Masukkan nama petugas">
            </div>

            <div class="form-group">
                <label for="no_telepon">No Telepon</label>
                <input class="form-control" type="text" id="no_telepon" name="no_telepon" required placeholder="Masukkan nomor telepon">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input class="form-control" type="text" id="alamat" name="alamat" required placeholder="Masukkan alamat">
            </div>
            
            <div class="form-group">
                <label for="jenis_petugas">Jenis Petugas</label>
                <select class="form-control" id="jenis_petugas" name="jenis_petugas" required>
                    <option value="">Pilih jenis petugas</option>
                    <option value="Bidan">Bidan</option>
                    <option value="Dokter">Dokter</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="jadwal_tugas">Jadwal Tugas</label>
                <input class="form-control" type="text" id="jadwal_tugas" name="jadwal_tugas" required placeholder="Masukkan jadwal tugas">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-custom">Simpan</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
