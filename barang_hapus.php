<?php

include 'config.php';

if(isset($_GET['id'])) {
    $_id = $_GET['id'];

    mysqli_query($koneksi, "DELETE FROM 'barang' WHERE id_barang='$id'");
    header("location:barang.php");
}
?>