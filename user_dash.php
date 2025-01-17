<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImunKu - Home</title>
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
        <img src="byi2.jpg" alt="Logo Bayi" class="logo-klinik">
        <a href="user_tampilbayi.php"><i class="fas fa-baby"></i> Data Bayi</a>
        <a href="user_tampilkesbay.php"><i class="fa fa-notes-medical"></i> Data Kesehatan Bayi</a>
        <a href="user_tampiljadim.php"><i class="fa fa-calendar"></i> Jadwal Imunisasi</a>
        <a href="user_tampilortu.php"><i class="fa fa-user"></i> Data Orangtua</a>
        <a href="user_tampilriwim.php"><i class="fa fa-history"></i> Riwayat Imunisasi</a>
        <a href="user_cek_gizi.php"><i class="fa fa-heartbeat"></i> Cek Kesehatan Gizi</a>
        <a href="user_logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
    </div>

<!-- Main Content -->
<!-- Main Content -->
<div class="content">
    <h2>Selamat Datang Di <span style="color: #007bff;">ImunKu</span></h2>
    <h4 style="text-align: center; font-size: 20px; color: #555; line-height: 1.8; margin: 20px 0;">
        Aplikasi <span style="color: #007bff; font-weight: bold;">ImunKu</span> dirancang untuk membantu orang tua dan tenaga kesehatan 
        dalam memantau kesehatan bayi dan balita. Dengan fitur-fitur seperti 
        <span style="color: #007bff;">cek kesehatan gizi bayi/balita</span>, mengecek <span style="color: #007bff;">jadwal imunisasi</span>, 
        melihat <span style="color: #007bff;">data kesehatan bayi</span>, serta <span style="color: #007bff;">riwayat imunisasi</span>, 
        aplikasi ini bertujuan untuk mendukung tumbuh kembang anak secara optimal.
    </h4>
    <br>
    <p style="text-align: center; font-size: 18px; color: #333; font-weight: bold;">Silakan pilih data yang ingin Anda akses:</p>
        <?php
            $menu_items = [
                ["href" => "user_tampilbayi.php", "icon" => "fa-baby", "title" => "Data Bayi"],
                ["href" => "user_tampilkesbay.php", "icon" => "fa-notes-medical", "title" => "Data Kesehatan Bayi"],
                ["href" => "user_tampiljadim.php", "icon" => "fa-calendar", "title" => "Jadwal Imunisasi"],
                ["href" => "user_tampilortu.php", "icon" => "fa-user", "title" => "Data Orangtua"],
                ["href" => "user_tampilriwim.php", "icon" => "fa-history", "title" => "Riwayat Imunisasi"],
                ["href" => "user_cek_gizi.php", "icon" => "fa-heartbeat", "title" => "Cek Kesehatan Gizi"]
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
