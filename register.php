<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poliklinik - Register</title>
</head>
<body>
    <div class="register-container">
        <!-- Logo Image -->
        <div class="profile-icon">
            <img src="hospital.jpg" alt="Logo Klinik">
        </div>

        <?php if (isset($_GET['status']) && $_GET['status'] == 'success') { ?>
            <div class="alert alert-success alert-custom" role="alert">
                Data berhasil disimpan!
            </div>
        <?php } elseif (isset($_GET['status']) && $_GET['status'] == 'error') { ?>
            <div class="alert alert-danger alert-custom" role="alert">
                Gagal menyimpan data! Silakan coba lagi.
            </div>
        <?php } ?>
        
        <h2>Register</h2>
        
        <!-- Formulir registrasi diarahkan ke prosesregister.php -->
        <form action="inputregister.php" method="POST">
            
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Register</button>
        </form>
        
        <p>Already have an account? <a href="form login.php">Login here</a></p>
    </div>

    <!-- Style CSS Inline -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
            background: url('bg1.jpg') no-repeat center center;
            background-size: cover;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            z-index: -1;
        }

        .register-container {
            position: relative;
            z-index: 1;
            width: 350px;
            padding: 30px;
            background-color: rgba(132, 132, 132, 0.7);
            border-radius: 12px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.3);
            text-align: center;
            color: #ffffff;
        }

        .profile-icon {
            width: 90px;
            height: 90px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 50%;
            background-color: white;
        }

        .profile-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .register-container h2 {
            font-size: 24px;
            margin-bottom: 25px;
            font-weight: bold;
        }

        label {
            display: block;
            text-align: left;
            font-size: 14px;
            margin: 12px 0 5px;
            color: #ddd;
        }

        input[type="text"], input[type="password"], input[type="email"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            background-color: #333;
            color: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            outline: none;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, input[type="password"]:focus, input[type="email"]:focus {
            box-shadow: 0px 4px 12px rgba(255, 255, 255, 0.4);
            background-color: #444;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(45deg, rgb(54, 255, 43), rgb(128, 202, 252));
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 15px;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background: linear-gradient(45deg, rgb(94, 240, 104), rgb(83, 218, 255));
            transform: scale(1.05);
        }

        .register-container p {
            margin-top: 15px;
            font-size: 13px;
            color: #bbb;
        }

        .register-container p a {
            color: rgb(255, 255, 255);
            text-decoration: none;
        }

        .register-container p a:hover {
            text-decoration: underline;
        }
    </style>
</body>
</html>
