<?php

include 'config.php';
session_start();

$role = mysqli_query($koneksi,"SELECT*FROM role");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

// menampilkan data berdasarkan id
    $data = mysqli_query($koneksi, "SELECT*FROM user where id_user='$id'");
    $data = mysqli_fetch_assoc($data);
}

if (isset($_POST['update'])) 
{
    $id=$_GET['id'];

    $nama=$_POST['nama'];
    $username=$POST['username'];
    $password=$_POST['password'];
    $role_id=$_POST['role_id'];

    // menyimpan ke database;
    mysqli_query($koneksi, "UPDATE user SET nama='$nama', username='$username', password='$password',
    role_id=$role_id where id_user='$id'");

    $_SESSION['success'] = 'Berhasil mengedit user';

    // mengalihkan halaman ke list user
    header("location:user.php");
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
            <a href="#" class="nav-link">
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
    <a class="nav-link text-white" href="user.php"><i class='fas fa-user mr-2'></i>User</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="role.php"><i class='fas fa-user mr-2'></i>Role</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="keranjang.php"><i class='fas fa-shopping-cart mr-2'></i>Keranjang</a><hr class="bg-secondary">
  </li>
  </ul>
    </div>
    <div class="col-md-10">
    <div class="container">
        <h1>Update User</h1>
        <form method="post">
            <div class="form-group">
                <label>Nama User</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama User" value="<?=$data['nama']?>">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username" value="<?=$data['username']?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" class="form-control" placeholder="Password"  value="<?=$data['password']?>">
            </div>
            <div class="form-group">
                <label>Role Akses</label>
                <select class="form-control" name="role_id">
                    <option value="">Pilih Role Akses</option>
                    <?php while($row = mysqli_fetch_array($role)){?>
                    <option value="<?=$row['id_role']?>"><?=$row['id_role']==$data['role_id']?'selected':''?>><?=$row['nama']?></option>
                    <?php
                }?>
                </select>
            <input type="submit" name="update" value="Update" class="btn btn-primary">
            <a href="user.php" class="btn btn-warning">Kembali</a>
        </form>
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