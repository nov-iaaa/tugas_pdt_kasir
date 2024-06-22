<?php

include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

// menampilkan data berdasarkan id
    $data = mysqli_query($koneksi, "SELECT*FROM barang where id_barang='$id'");
    $data = mysqli_fetch_assoc($data);
}

if (isset($_POST['update'])) 
{
    $id=$_GET['id'];
    $nama=$_POST['nama_barang'];
    $harga=$_POST['harga'];
    $jumlah=$_POST['jumlah'];

    // menyimpan ke database;
    mysqli_query($koneksi, "UPDATE barang SET nama_barang='$nama',harga='$harga',jumlah='$jumlah' where id_barang='$id'");

    // mengalihkan halaman ke list barang
    header("location:barang.php");
}
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
    <a class="nav-link active text-white" aria-current="page" href="index.php"><i class='fas fa-tachometer-alt mr-2'></i>Dashboard</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="barang.php"><i class='fas fa-box mr-2'></i>Barang</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="#"><i class='fas fa-user mr-2'></i>User</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="role.php"><i class='fas fa-user mr-2'></i>Role</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="keranjang.php"><i class='fas fa-shopping-cart mr-2'></i>Keranjang</a><hr class="bg-secondary">
  </li>
</ul>
    </div>
    <div class="col-md-10 mt-2 pr-3 pl-3 pt-4">
    <div class="container">
        <h1>Update Barang</h1>
        <form method="post">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?=$data['nama_barang']?>">
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Harga Barang" value="<?=$data['harga']?>">
            </div>
            <div class="form-group">
                <label>Jumlah Stok</label>
                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Stok" value="<?=$data['jumlah']?>">
            </div>
            <input type="submit" name="update" value="Update" class="btn btn-primary">
            <a href="barang.php" class="btn btn-warning">Kembali</a>
        </form>
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

