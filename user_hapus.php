<?php

include 'config.php';
session_start();

if(isset($_GET['id'])) {
    $_id = $_GET['id'];

    mysqli_query($koneksi, "DELETE FROM 'user' WHERE id_user='$id'");
    $_SESSION['success'] = 'Berhasil menghapus user';
    header("location:user.php");
}
?>