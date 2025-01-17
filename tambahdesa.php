<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="tambah.css">
</head>
<body>

    <div class="container">
        <!-- Button to view data -->
        <form method="POST" action="tampildesa.php">
            <button type="submit" class="btn btn-outline-primary btn-block mb-4">Kembali</button>
        </form>
        
        <h3>Tambah Data Desa</h3>
        
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
        
        <form method="post" action="inputdesa.php">
            <div class="form-group">
                <label for="nama_desa">Nama Desa</label>
                <input class="form-control" type="text" id="nama_desa" name="nama_desa" required placeholder="Masukkan nama desa">
            </div>

            <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <input class="form-control" type="text" id="kecamatan" name="kecamatan" required placeholder="Masukkan nama kecamatan">
            </div>

            <div class="form-group">
                <label for="kabupaten">Kabupaten</label>
                <input class="form-control" type="text" id="kabupaten" name="kabupaten" required placeholder="Masukkan nama kabupaten">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-custom">Simpan</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
