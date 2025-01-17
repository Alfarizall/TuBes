<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImunKu - Riwayat Imunisasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="tampil.css">
</head>
<body>

    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <h2>Imun Ku</h2>
        <img src="byi2.jpg" alt="Logo Bayi" class="logo-klinik">
        <a href="user_dash.php"><i class="fa fa-home"></i> Home</a>
        <a href="user_tampilbayi.php"><i class="fa fa-baby"></i> Data Bayi</a>
        <a href="user_tampiljadim.php"><i class="fa fa-calendar"></i> Jadwal Imunisasi</a>
        <a href="user_tampilkesbay.php"><i class="fa fa-notes-medical"></i> Data Kesehatan Bayi</a>
        <a href="user_tampilortu.php"><i class="fa fa-user"></i> Data Orangtua</a>
        <a href="user_cek_gizi.php"><i class="fa fa-heartbeat"></i> Cek Kesehatan Gizi</a>
        <a href="user_logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2>Riwayat Imunisasi</h2>
        <!-- Search Form -->
        <form method="GET" class="d-flex mb-3">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari berdasarkan jenis vaksin atau lokasi" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
        </form>

        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Riwayat</th>
                    <th>ID Bayi</th>
                    <th>Jenis Vaksin</th>
                    <th>Tanggal Imunisasi</th>
                    <th>Lokasi</th>
                    <th>Petugas</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include 'koneksi.php';
                $no = 1;
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $query = "SELECT * FROM riwayat_imunisasi";
                if (!empty($search)) {
                    $query .= " WHERE jenis_vaksin LIKE '%$search%' OR lokasi LIKE '%$search%'";
                }
                $data = mysqli_query($koneksi, $query);
                while($d = mysqli_fetch_array($data)) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['id_riwayat']; ?></td>
                        <td><?php echo $d['id_bayi']; ?></td>
                        <td><?php echo $d['jenis_vaksin']; ?></td>
                        <td><?php echo $d['tgl_imunisasi']; ?></td>
                        <td><?php echo $d['lokasi']; ?></td>
                        <td><?php echo $d['nama_petugas']; ?></td>
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
