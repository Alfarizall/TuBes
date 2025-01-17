<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imun Ku - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="tampil.css">
    <style>
        .content h2 {
            font-size: 32px;
            color: #333;
            margin-bottom: 40px;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
        }
        .content p {
            text-align: center;
            font-size: 24px;
            color: #555;
            margin-bottom: 50px;
        }
        
        /* Styling for Cards */
        .card-link {
            text-decoration: none;
            color: inherit;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .card-body i {
            color:rgb(0, 157, 162);
        }
        .card-title {
            font-size: 20px;
            font-weight: bold;
            color:rgb(0, 51, 202);
        }

        /* Hover Effect for Cards */
        .card:hover .card-title {
            color:rgb(5, 200, 47);
        }
        /* Fade-in Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(0px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
</head>
<body>

    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <h2>Imun Ku</h2>
        <img src="byi2.jpg" alt="Logo Klinik" class="logo-klinik">
        <a href="tampilpetugas.php"><i class="fa fa-user-md"></i> Data Petugas</a>
        <a href="tampilbayi.php"><i class="fas fa-baby"></i> Data Bayi</a>
        <a href="tampilkesbay.php"><i class="fa fa-notes-medical"></i> Data Kesehatan Bayi</a>
        <a href="tampiljadim.php"><i class="fa fa-calendar"></i> Jadwal Imunisasi</a>
        <a href="tampilortu.php"><i class="fa fa-user"></i> Data Orangtua</a>
        <a href="tampildesa.php"><i class="fa fa-home"></i> Data Desa</a>
        <a href="tampilriwim.php"><i class="fa fa-history"></i> Riwayat Imunisasi</a>
        <a href="tampiluser.php"><i class="fa fa-users"></i> Data User</a>
        <a href="admin_logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2>Admin Dashboard</h2>
        <p>Silakan pilih data yang ingin Anda akses:</p>

        <?php
            $menu_items = [
                ["href" => "tampilpetugas.php", "icon" => "fa-user-md", "title" => "Data Petugas"],
                ["href" => "tampilbayi.php", "icon" => "fa-baby", "title" => "Data Bayi"],
                ["href" => "tampilkesbay.php", "icon" => "fa-notes-medical", "title" => "Data Kesehatan Bayi"],
                ["href" => "tampiljadim.php", "icon" => "fa-calendar", "title" => "Jadwal Imunisasi"],
                ["href" => "tampilortu.php", "icon" => "fa-user", "title" => "Data Orangtua"],
                ["href" => "tampildesa.php", "icon" => "fa-home", "title" => "Data Desa"],
                ["href" => "tampilriwim.php", "icon" => "fa-history", "title" => "Riwayat Imunisasi"],
                ["href" => "tampiluser.php", "icon" => "fa-users", "title" => "Data User"]
            ];
        ?>
    <div class="row g-4">
        <?php foreach ($menu_items as $item): ?>
            <div class="col-md-3">
                <a href="<?= $item['href'] ?>" class="card-link">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fa <?= $item['icon'] ?> fa-3x"></i>
                            <h5 class="card-title mt-2"><?= $item['title'] ?></h5>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
