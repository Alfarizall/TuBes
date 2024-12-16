<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role']; // Pilih "admin" atau "user"

    if ($role === 'admin') {
        // Login untuk Admin
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->execute([$username]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && hash('sha256', $password) === $admin['password']) {
            $_SESSION['role'] = 'admin';
            $_SESSION['username'] = $admin['username'];
            header("Location: admin_dashboard.php");
            exit;
        } else {
            $error = "Invalid Admin credentials.";
        }
    } elseif ($role === 'user') {
        // Login untuk User
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && hash('sha256', $password) === $user['password']) {
            $_SESSION['role'] = 'user';
            $_SESSION['username'] = $user['username'];
            header("Location: user_dashboard.php");
            exit;
        } else {
            $error = "Invalid User credentials.";
        }
    } else {
        $error = "Invalid role selected.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
