<?php
include 'config.php';
session_start();

$qty = $_POST['qty'];
$cart = $_SESSION['cart'];

foreach ($cart as $key=>$value) {
    $_SESSION['cart'][$key]['qty']=$qty[$key];
}

header('location:keranjang.php');
?>