<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perpustakaan Digital Sekolah</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #4ae7ff, #050d7b);
            font-family: 'Poppins', sans-serif;
            position: relative;
        }

        /* background bubble */
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

        .title {
            color: white;
            text-align: center;
            margin-bottom: 40px;
            animation: fadeDown 1s ease;
        }

        @keyframes fadeDown {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .card-modern {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 30px;
            color: white;
            text-align: center;
            transition: 0.4s;
            animation: fadeUp 1s ease;
        }

        .card-modern:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .icon {
            font-size: 55px;
            margin-bottom: 10px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%,100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .btn-modern {
            border-radius: 25px;
            font-weight: bold;
            padding: 10px;
            transition: 0.3s;
        }

        .btn-modern:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>

    <!-- background animasi -->
    <div class="bg-bubble"></div>
    <div class="bg-bubble"></div>

    <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center main">

        <div class="title">
            <h2>📚 Perpustakaan Digital</h2>
            <p>Pilih jenis login</p>
        </div>

        <div class="row justify-content-center w-100">

            <div class="col-md-3 col-6 mb-3">
                <div class="card-modern">
                    <div class="icon">👨‍💻</div>
                    <h5>LOGIN ADMIN</h5>
                    <a href="login_admin.php" class="btn btn-primary btn-modern w-100 mt-2">
                        Masuk
                    </a> 
                </div>
            </div>

            <div class="col-md-3 col-6 mb-3">
                <div class="card-modern">
                    <div class="icon">👥</div>
                    <h5>LOGIN ANGGOTA</h5>
                    <a href="login_anggota.php" class="btn btn-success btn-modern w-100 mt-2">
                        Masuk
                    </a>
                </div>
            </div>

        </div>

    </div>

</body>
</html>