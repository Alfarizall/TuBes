<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data User</title>
	<link rel="stylesheet" href="ubah.css">
</head>
<body>

<div class="container">
    <h2>Update Data User</h2>
    <a class="back-link" href="tampiluser.php">← Kembali</a>

    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($koneksi,"select * from users where iduser='$id'");
    while($d = mysqli_fetch_array($data)){
    ?>
    <form method="post" action="updateuser.php">
        <table>
            <tr>
                <td>Username</td>
                <input type="hidden" name="iduser" value="<?php echo $d['iduser']; ?>">
                <td><input type="text" name="username" value="<?php echo $d['username']; ?>" required></td>
            </tr>
            <tr>            
                <td>Password</td>
                <td><input type="text" name="password" value="<?php echo $d['password']; ?>" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Simpan">
                </td>
            </tr>
        </table>
    </form>
    <?php 
    }
    ?>
</div>

</body>
</html>
