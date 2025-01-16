<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poliklinik - Cek Kesehatan Gizi Balita</title>
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
        <a href="user_tampilortu.php"><i class="fa fa-user"></i> Data Orangtua</a>
        <a href="user_tampilriwim.php"><i class="fa fa-history"></i> Riwayat Imunisasi</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2>Cek Kesehatan Gizi Bayi / Balita</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="umur" class="form-label">Umur bayi / Balita (bulan):</label>
                <input type="number" class="form-control" id="umur" name="umur" min="6" max="60" required>
            </div>
            <div class="mb-3">
                <label for="beratBadan" class="form-label">Berat Badan Bayi / Balita (kg):</label>
                <input type="number" class="form-control" id="beratBadan" name="beratBadan" step="0.1" required>
            </div>
            <div class="mb-3">
                <label for="tinggiBadan" class="form-label">Tinggi Badan Bayi / Balita (cm):</label>
                <input type="number" class="form-control" id="tinggiBadan" name="tinggiBadan" step="0.1" required>
            </div>
            <button type="submit" class="btn btn-primary">Cek Status Gizi</button>
            <button type="button" class="btn btn-info" onclick="window.location.href='user_cek_gizi.php';">Reset</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            function hitungGiziBalita($umur, $beratBadan, $tinggiBadan) {
                if ($umur < 6 || $umur > 60) {
                    return "Umur balita harus antara 6 hingga 60 bulan.";
                }

                $tinggiBadanM = $tinggiBadan / 100;
                $imt = $beratBadan / ($tinggiBadanM ** 2);

                if ($umur < 24) {
                    if ($imt < 14) {
                        return "Gizi Buruk";
                    } elseif ($imt >= 14 && $imt < 17) {
                        return "Gizi Kurang";
                    } elseif ($imt >= 17 && $imt < 19) {
                        return "Gizi Baik";
                    } else {
                        return "Gizi Lebih";
                    }
                } else {
                    if ($imt < 13.5) {
                        return "Gizi Buruk";
                    } elseif ($imt >= 13.5 && $imt < 16.5) {
                        return "Gizi Kurang";
                    } elseif ($imt >= 16.5 && $imt < 18.5) {
                        return "Gizi Baik";
                    } else {
                        return "Gizi Lebih";
                    }
                }
            }

            $umur = (int)$_POST['umur'];
            $beratBadan = (float)$_POST['beratBadan'];
            $tinggiBadan = (float)$_POST['tinggiBadan'];

            $statusGizi = hitungGiziBalita($umur, $beratBadan, $tinggiBadan);
            echo "<div class='alert alert-info mt-3'>Status gizi balita: $statusGizi</div>";
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
