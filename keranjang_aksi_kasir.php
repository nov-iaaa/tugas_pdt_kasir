<?php
include 'config.php';
session_start();

if(isset($_POST['id_barang']))
{
    $id_barang = $_POST['id_barang'];
    $qty = $_POST['qty'];

    $data = mysqli_query($koneksi, "SELECT*FROM barang WHERE id_barang='$id_barang'");

    $b = mysqli_fetch_assoc($data);

    $barang = [
        'id' => $b['id_barang'],
        'nama_barang' => $b['nama_barang'],
        'harga' => $b['harga'],
        'qty' => $qty
    ];

    $_SESSION['cart'][]=$barang;
    krsort($_SESSION['cart']);

    header('location:keranjang_kasir.php');
}

?>