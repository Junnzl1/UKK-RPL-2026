<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Anggota - Aplikasi Perpustakaan Digital Sekolah</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 30px;
            width: 320px;
            color: white;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
        }

        .glass-card h4 {
            font-weight: 600;
        }

        .form-control {
            border-radius: 12px;
            border: none;
        }

        .form-control:focus {
            box-shadow: none;
            border: 1px solid #fff;
        }

        .btn-modern {
            border-radius: 25px;
            font-weight: bold;
            background: #ffffff;
            color: #764ba2;
            transition: 0.3s;
        }

        .btn-modern:hover {
            background: #eee;
        }

        .link a {
            color: #fff;
            font-size: 13px;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }

        .icon {
            font-size: 40px;
        }
    </style>
</head>

<body>

    <form method="post" action="#" class="glass-card text-center">
        <div class="icon mb-2">👤</div>
        <h4>Login Anggota</h4>
        <p style="font-size:13px;">Perpustakaan Digital</p>

        <input name="username" class="form-control mb-3" placeholder="Username">
        <input name="password" type="password" class="form-control mb-3" placeholder="Password">

        <button type="submit" name="tombol" class="btn btn-modern w-100 mb-2">
            Login
        </button>

        <div class="link mt-2">
            <a href="login_admin.php">👨‍💼 Login Admin</a><br>
            <a href="pendaftaran_anggota.php">👤 Daftar Anggota</a>
        </div>
    </form>

</body>
</html>

<?php
if (isset($_POST['tombol'])) {
    include 'koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM anggota 
              WHERE username='$username' 
              AND password='$password'";

    $data = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($data) > 0) {
        $data = mysqli_fetch_array($data);

        session_start();
        $_SESSION['id_anggota']   = $data['id_anggota'];
        $_SESSION['username']     = $data['username'];
        $_SESSION['nama_anggota'] = $data['nama_anggota'];

        header("Location: anggota/dashboard.php");
    } else {
        echo "<script>
                alert('Login Gagal, Username / Password Salah');
                window.location.assign('login-anggota.php');
              </script>";
    }
}
?>