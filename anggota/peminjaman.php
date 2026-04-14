<?php
include '../koneksi.php';
session_start();
date_default_timezone_set("Asia/Jakarta");

$id = $_GET['id'];
$tgl = date('Y-m-d H:i:s');

// 🔍 cek stok dulu
$cek = mysqli_query($koneksi, "SELECT stok FROM buku WHERE id_buku='$id'");
$data_buku = mysqli_fetch_assoc($cek);

if ($data_buku['stok'] <= 0) {
    echo "<script>alert('❌ Stok buku habis!'); window.location='dashboard.php';</script>";
    exit;
}

// 🛒 simpan transaksi
$query = "INSERT INTO transaksi(id_anggota,id_buku,tgl_pinjam,status_transaksi)
VALUES('$_SESSION[id_anggota]','$id','$tgl','Peminjaman')";

$data = mysqli_query($koneksi, $query);

if ($data) {

    // ⬇ kurangi stok
    mysqli_query($koneksi, "UPDATE buku SET stok = stok - 1 WHERE id_buku='$id'");

    echo "<script>alert('✅ Buku berhasil dipinjam'); window.location='dashboard.php';</script>";
}
?>