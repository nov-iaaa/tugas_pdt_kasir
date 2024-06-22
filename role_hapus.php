<?php

include 'config.php';

if(isset($_GET['id'])) {
    $_id = $_GET['id'];

    mysqli_query($koneksi, "DELETE FROM 'role' WHERE id_role='$id'");
    header("location:role.php");
}
?>