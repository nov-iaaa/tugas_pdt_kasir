<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "kasir";

//membuat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $database);

// memeriksa koneksi
if (!$koneksi) {
    die("koneksi gagal: " . mysqli_connect_error());
}

// echo "koneksi berhasil";
?>
