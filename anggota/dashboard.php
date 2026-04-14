<?php
include '../koneksi.php';
session_start();
if (empty($_SESSION['id_anggota'])) {
    header("Location:../login-anggota.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Anggota</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container mt-3 mb-4">
    <h4>Halaman Anggota</h4>

    <a href="dashboard.php" class="btn btn-success">Dashboard</a>
    <a href="?halaman=history" class="btn btn-success">History</a>
    <a href="logout.php" class="btn btn-danger">Logout</a>

    <div class="card p-4 mt-3">
        <?php
        $halaman = isset($_GET['halaman']) ? $_GET['halaman'] : '';

        if (file_exists($halaman . ".php")) {
            include $halaman . ".php";
        } else {
        ?>

        <h4>Selamat Datang <?= $_SESSION['nama_anggota']; ?> 👋</h4>

        <hr>

        <h4>📚 Buku Dipinjam :</h4>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;
            $data = mysqli_query($koneksi, "
                SELECT * FROM transaksi,buku 
                WHERE buku.id_buku=transaksi.id_buku 
                AND transaksi.id_anggota='$_SESSION[id_anggota]' 
                AND status_transaksi='Peminjaman'
            ");

            foreach ($data as $d) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['judul_buku']; ?></td>
                <td><?= $d['tgl_pinjam']; ?></td>
                <td>
                    <a class="btn btn-success"
                       href="?halaman=pengembalian&id=<?= $d['id_transaksi']; ?>&buku=<?= $d['id_buku']; ?>"
                       onclick="return confirm('Kembalikan buku ini?')">
                        Kembalikan
                    </a>
                </td>
            </tr>
            <?php } ?>
        </table>

        <hr>

        <h4>📚 Daftar Buku :</h4>
        <div class="row">
            <?php
            $buku = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY id_buku DESC");
            foreach ($buku as $b) {
            ?>
            <div class="col-md-3">
                <div class="card p-3 mb-3 shadow-sm">
                    <h5><?= $b['judul_buku']; ?></h5>
                    <p>Pengarang : <?= $b['penerbit']; ?></p>
                    <p>Tahun : <?= $b['tahun_terbit']; ?></p>
                    <p><strong>Stok :</strong> <?= $b['stok']; ?></p>

                    <?php if ($b['stok'] > 0) { ?>
                        <span class="badge bg-success mb-2">Tersedia</span>
                        <a href="?halaman=peminjaman&id=<?= $b['id_buku']; ?>"
                           class="btn btn-primary"
                           onclick="return confirm('Pinjam buku ini?')">
                           Pinjam
                        </a>
                    <?php } else { ?>
                        <span class="badge bg-danger mb-2">Stok Habis</span>
                        <button class="btn btn-secondary" disabled>Pinjam</button>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>

        <?php } ?>
    </div>
</div>
</body>
</html>