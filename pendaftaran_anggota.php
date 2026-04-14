<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Anggota - Aplikasi Perpustakaan Digital Sekolah</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #36d1dc, #5b86e5);
            font-family: 'Poppins', sans-serif;
            position: relative;
        }

        /* bubble background */
        .bg-bubble {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            animation: float 10s infinite ease-in-out;
            z-index: 0;
        }

        .bg-bubble:nth-child(1) {
            width: 200px; height: 200px;
            top: 10%; left: 10%;
        }

        .bg-bubble:nth-child(2) {
            width: 150px; height: 150px;
            bottom: 10%; right: 10%;
            animation-delay: 2s;
        }

        @keyframes float {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-30px); }
        }

        .main {
            position: relative;
            z-index: 2;
        }

        .form-card {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 30px;
            color: white;
            width: 100%;
            max-width: 400px;
            animation: fadeUp 1s ease;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .title {
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 10px;
            border: none;
        }

        .form-control:focus {
            box-shadow: none;
            border: 1px solid white;
        }

        .btn-modern {
            border-radius: 25px;
            font-weight: bold;
            background: white;
            color: #5b86e5;
        }

        .btn-modern:hover {
            background: #eee;
        }

        .link a {
            color: white;
            font-size: 13px;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- background -->
    <div class="bg-bubble"></div>
    <div class="bg-bubble"></div>

    <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center main">

        <div class="title">
            <h3>📚 Perpustakaan Digital</h3>
            <p>Pendaftaran Anggota</p>
        </div>

        <form method="post" action="#" class="form-card">

            <input name="nis" type="number" class="form-control mb-3" placeholder="NIS" required>
            <input name="nama_anggota" type="text" class="form-control mb-3" placeholder="Nama Anggota" required>
            <input name="username" type="text" class="form-control mb-3" placeholder="Username" required>
            <input name="password" type="text" class="form-control mb-3" placeholder="Password" required>
            <input name="kelas" type="text" class="form-control mb-3" placeholder="Kelas" required>

            <button type="submit" name="tombol" class="btn btn-modern w-100 mb-2">
                Daftar
            </button>

            <div class="link text-center">
                <a href="login_admin.php">👨‍💼 Login Admin</a><br>
                <a href="login_anggota.php">👤 Login Anggota</a>
            </div>

        </form>

    </div>

</body>
</html>

<?php
if (isset($_POST['tombol'])) {
    include 'koneksi.php';

    $nis          = $_POST['nis'];
    $nama_anggota = $_POST['nama_anggota'];
    $username     = $_POST['username'];
    $password     = $_POST['password'];
    $kelas        = $_POST['kelas'];

    $query = "INSERT INTO anggota (nis, nama_anggota, username, password, kelas)
              VALUES ('$nis', '$nama_anggota', '$username', '$password', '$kelas')";

    $data = mysqli_query($koneksi, $query);

    if ($data) {
        session_start();
        $_SESSION['id_anggota']   = mysqli_insert_id($koneksi);
        $_SESSION['username']     = $username;
        $_SESSION['password']     = $password;
        $_SESSION['nama_anggota'] = $nama_anggota;

        echo "<script>
                alert('✅ Pendaftaran Berhasil');
                window.location.assign('anggota/dashboard.php');
              </script>";
    } else {
        echo "<script>
                alert('❌ Pendaftaran Gagal');
                window.location.assign('pendaftaran-anggota.php');
              </script>";
    }
}
?>