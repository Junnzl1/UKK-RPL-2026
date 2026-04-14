<?php
include '../koneksi.php';
session_start();
date_default_timezone_set("Asia/Jakarta");

$id   = $_GET['id'];
$buku = $_GET['buku'];
$tgl  = date('Y-m-d H:i:s');

// update transaksi (status + tanggal kembali)
$query = "UPDATE transaksi 
          SET tgl_kembali='$tgl', status_transaksi='pengembalian' 
          WHERE id_transaksi='$id'";

$data  = mysqli_query($koneksi, $query);

if ($data) {

    // ⬆ tambah stok kembali
    mysqli_query($koneksi, "UPDATE buku SET stok = stok + 1 WHERE id_buku='$buku'");

    echo "<script>alert('✅ Buku sudah dikembalikan'); window.location.assign('?halaman=history');</script>";
}
?>