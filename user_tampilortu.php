<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poliklinik - Data Orangtua</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="tampil.css">
</head>
<body>

    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <h2>Poliklinik Violet Abadi</h2>
        <img src="hospital.jpg" alt="Logo Klinik" class="logo-klinik">
        <a href="user_dash.php"><i class="fa fa-home"></i> Home</a>
        <a href="user_tampilbayi.php"><i class="fa fa-baby"></i> Data Bayi</a>
        <a href="user_tampiljadim.php"><i class="fa fa-calendar"></i> Jadwal Imunisasi</a>
        <a href="user_tampilkesbay.php"><i class="fa fa-notes-medical"></i> Data Orangtua</a>
        <a href="user_tampilriwim.php"><i class="fa fa-history"></i> Riwayat Imunisasi</a>
        <a href="user_cek_gizi.php"><i class="fa fa-heartbeat"></i> Cek Kesehatan Gizi</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2>Data Orangtua</h2>
        <!-- Search Form -->
        <form method="GET" action="" class="mb-4">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Cari ID Orangtua, ID Bayi, Nama Ayah, Nama Ibu, atau ID Desa" aria-label="Search">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari</button>
                    </div>
                </form>

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Orangtua</th>
                            <th>ID Bayi</th>
                            <th>Nama Ayah</th>
                            <th>Nama Ibu</th>
                            <th>Alamat</th>
                            <th>ID Desa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include 'koneksi.php';
                        $no = 1;
                        $searchQuery = "";

                        if (isset($_GET['search']) && !empty($_GET['search'])) {
                            $search = mysqli_real_escape_string($koneksi, $_GET['search']);
                            $searchQuery = "WHERE id_orangtua LIKE '%$search%' OR id_bayi LIKE '%$search%' OR nama_ayah LIKE '%$search%' OR nama_ibu LIKE '%$search%' OR id_desa LIKE '%$search%'";
                        }

                        $data = mysqli_query($koneksi, "SELECT * FROM orangtua $searchQuery");
                        while($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['id_orangtua']; ?></td>
                                <td><?php echo $d['id_bayi']; ?></td>
                                <td><?php echo $d['nama_ayah']; ?></td>
                                <td><?php echo $d['nama_ibu']; ?></td>
                                <td><?php echo $d['alamat']; ?></td>
                                <td><?php echo $d['id_desa']; ?></td>
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
