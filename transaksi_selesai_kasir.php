<?php

include 'config.php';
session_start();

$id_trx = $_GET['idtrx'];

$data = mysqli_query($koneksi,"SELECT * FROM transaksi WHERE id_transaksi='$id_trx'");
$trx = mysqli_fetch_assoc($data);



$detail = mysqli_query($koneksi,"SELECT transaksi_detail.*, barang.nama_barang FROM transaksi_detail INNER JOIN barang ON transaksi_detail.id_barang=barang.id_barang WHERE transaksi_detail.id_transaksi ='$id_trx'");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <title>Kasir</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
  <a class="navbar-brand" href="#">LONAYS</a>
  <ul class="navbar-nav ml-auto">
        <li class="nav-item mr-0">
            <a href="logout.php" class="nav-link" onclick="return confirm('Apakah Anda yakin ingin keluar?')">
                <i class="fas fa-sign-out-alt" data-toggle="tooltip" title="Sign Out"></i>
    </a>
        </li>
    </ul>
</nav>
<div class="row no-gutters mt-5">
    <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
    <ul class="nav flex-column ml-3 mb-5">
  <li class="nav-item">
    <a class="nav-link active text-white" aria-current="page" href="kasir.php"><i class='fas fa-tachometer-alt mr-2'></i>Dashboard</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="barang_kasir.php"><i class='fas fa-box mr-2'></i>Barang</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="keranjang_kasir.php"><i class='fas fa-shopping-cart mr-2'></i>Keranjang</a><hr class="bg-secondary">
  </li>
</ul>
    </div>
    <div class="col-md-10 mt-2 pr-3 pl-3 pt-4">
    <div class="container">
      <?php if(isset($_SESSION['success']) && $_SESSION['success'] !='') {?>
        <div class="alert alert-success" role="alert">
          <?=$_SESSION['success']?>
      </div>
      <?php
      }
      $_SESSION['success'] = '';
      ?>

      <div align="center">
        <table width="500" border="0" cellpadding="1" cellspacing="0">
            <tr>
                <th style="text-align: center; vertical-align: middle;">LONAYS <br>
            Jl. AH. Nasution Mangkubumi <br>
            Kota Tasikmalaya</th>
            </tr>
            <tr align="center"><td><hr></td></tr>
            <tr>
                <td>#<?=$trx['nomor']?> | <?=date('d-m-Y H:i:s',strtotime($trx['tanggal_waktu']))?> <?=$trx['nama']?></td>
            </tr>
            <tr><td><hr></td></tr>
        </table>
        <table width="500" border="0" cellpadding="3" cellspacing="0">
            <?php while($row = mysqli_fetch_array($detail)) { ?>
            <tr>
                <td><?=$row['nama_barang']?></td>
                <td><?=$row['qty']?></td>
                <td align="right"><?=number_format($row['harga'])?></td>
                <td align="right"><?=number_format($row['total'])?></td>
            </tr>
            <?php
            } ?>
            <tr>
                <td colspan="4"><hr></td>
            </tr>
            <tr>
                <td align="right" colspan="3">Total</td>
                <td align="right"><?=number_format($trx['total'])?></td>
            </tr>
            <tr>
            <td align="right" colspan="3">Bayar</td>
            <td align="right"><?=number_format($trx['bayar'])?></td>
            </tr>
            <tr>
            <td align="right" colspan="3">Kembali</td>
            <td align="right"><?=number_format($trx['kembali'])?></td>
            </tr>
        </table>
        <table width="500" border="0" cellpadding="1" cellspacing="0">
            <tr><td><hr></td></tr>
            <tr>
                <th style="text-align: center; vertical-align: middle;">Terimakasih Sahabat Lonays</th>
            </tr>
            <tr>
            <th style="text-align: center; vertical-align: middle;">Selamat Berbelanja Kembali</th>
            </tr>
            <tr>
                <th style="text-align: center; vertical-align: middle;">==== Layanan Konsumen ====</th>
            </tr>
            <tr>
                <th style="text-align: center; vertical-align: middle;">SMS/CALL 089655244089</th>
            </tr>
        </table>
      </div>

        </div>
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script>type="text/javascript" src="admin.js"</script>
    <script>
      $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
    </script>
  </body>
</html>