<?php
// Koneksi ke database
$host = 'localhost';        // Ganti dengan host database Anda
$username = 'root';         // Nama pengguna database
$password = '';             // Password database
$dbname = 'imunisasi';  // Nama database

$conn = new mysqli($host, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Query untuk mengecek username dan password
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $input_username, $input_password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek jika login valid
    if ($result->num_rows > 0) {
        // Login berhasil, arahkan ke halaman home.php
        header("Location: admin_dash.php");
    } else {
        // Login gagal, kembali ke halaman login dengan error message
        header("Location: form login.php?error=true");
    }

    $stmt->close();
}

$conn->close();
?>
