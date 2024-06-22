<?php
include 'config.php';
session_start();

// menghilangkan Rp dalam nominal
$bayar = preg_replace('/\D/', '', $_POST['bayar']);

$tanggal_waktu = date ('Y-m-d H:i:s');
$nomor = rand(111111,999999);
$total = $_POST['total'];
$nama = $_SESSION['nama'];
$kembali = $bayar - $total;

//insert ke tabel transaksi
mysqli_query($koneksi,"INSERT INTO transaksi (id_transaksi,tanggal_waktu,nomor,total,nama,bayar,kembali) VALUES (NULL,'$tanggal_waktu','$nomor','$total','$nama','$bayar','$kembali')");

// mendapatkan id transaksi baru
$id_transaksi = mysqli_insert_id($koneksi);

// insert ke detail transaksi
foreach ($_SESSION['cart'] as $key => $value) {

    $id_barang = $value['id'];
    $harga = $value['harga'];
    $qty = $value['qty'];
    $total = $harga*$qty;

    mysqli_query($koneksi,"INSERT INTO transaksi_detail(id_transaksi_detail,id_transaksi,id_barang,harga,qty,total) VALUES (NULL,'$id_transaksi','$id_barang','$harga','$qty','$total')");
    mysqli_query($koneksi, "UPDATE barang SET jumlah = jumlah - $qty WHERE id_barang = '$id_barang'");
}
$_SESSION['cart'] = [];
header('location:transaksi_selesai_kasir.php?idtrx='.$id_transaksi);

foreach ($_SESSION['cart'] as $key => $value) {
    $id_barang = $value['id'];
    $qty = $value['qty'];
    $stok_barang = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT jumlah FROM barang WHERE id_barang = '$id_barang'"))['jumlah'];
    if ($stok_barang < $qty) {
        header('location:stok_kurang.php'); // Redirect to a page indicating insufficient stock
        exit();
    }
    // ... proceed with stock update if sufficient
}


?>