<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImunKu - Jadwal Imunisasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="tampil.css">
</head>
<body>

    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <h2>Imun Ku</h2>
        <img src="byi2.jpg" alt="Logo Klinik" class="logo-klinik">
        <a href="admin_dash.php"><i class="fa fa-home"></i> Home</a>
        <a href="tampilpetugas.php"><i class="fas fa-user-md"></i> Data Petugas</a>
        <a href="tampilbayi.php"><i class="fa fa-baby"></i> Data Bayi</a>
        <a href="tampilkesbay.php"><i class="fa fa-notes-medical"></i> Data Kesehatan Bayi</a>
        <a href="tampilortu.php"><i class="fa fa-user"></i> Data Orangtua</a>
        <a href="tampildesa.php"><i class="fa fa-home"></i> Data Desa</a>
        <a href="tampilriwim.php"><i class="fa fa-history"></i> Riwayat Imunisasi</a>
        <a href="tampiluser.php"><i class="fa fa-users"></i> Data User</a>
        <a href="admin_logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2>Jadwal Imunisasi</h2>
        <?php if (isset($_GET['status']) && $_GET['status'] == 'success') { ?>
            <div class="alert alert-success" role="alert">
                Data berhasil disimpan!
            </div>
        <?php } elseif (isset($_GET['status']) && $_GET['status'] == 'error') { ?>
            <div class="alert alert-danger" role="alert">
                Gagal menyimpan data! Silakan coba lagi.
            </div>
        <?php } ?>

        <!-- Link to form for adding new doctor data -->
        <a href="tambahjadim.php" class="btn btn-custom mb-3"><i class="fa fa-plus"></i> Tambah Jadwal Imunisasi</a>

        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Jadwal</th>
                    <th>ID Desa</th>
                    <th>Tanggal Imunisasi</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Lokasi</th>
                    <th>ID Petugas</th>
                    <th>Jenis Vaksin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include 'koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM jadwal_imunisasi");
                while($d = mysqli_fetch_array($data)) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['id_jadwal']; ?></td>
                        <td><?php echo $d['id_desa']; ?></td>
                        <td><?php echo $d['tgl_imunisasi']; ?></td>
                        <td><?php echo $d['waktu_mulai']; ?></td>
                        <td><?php echo $d['waktu_selesai']; ?></td>
                        <td><?php echo $d['lokasi']; ?></td>
                        <td><?php echo $d['id_petugas']; ?></td>
                        <td><?php echo $d['jenis_vaksin']; ?></td>
                        <td>
                            <a href="ubahjadim.php?id=<?php echo $d['id_jadwal']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                            <a href="hapusjadim.php?id=<?php echo $d['id_jadwal']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php 
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
