<?php
session_start();

if(isset($_SESSION['userid']))
{
    if($_SESSION['role_id']==1)
    {
      header("Location:index.php");
    }
  }else
  {
    $_SESSION['error'] = 'Anda harus login dahulu';
    header("Location:login.php");
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
    <link rel="stylesheet" type="text/css" href="bootstrap/css/admin.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <title>Kasir</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
  <a class="navbar-brand" href="index.php">LONAYS</a>
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
    <div class="col-md-10">
    <div class="jumbotron" style="background-image: url('img/6.jpg'); background-repeat: no-repeat; background-size: cover; height: 250px">
    <h1>Selamat Pagi!</h1>
    <p>No Cuan, No Jajan. Semangat!</p>
  </div>
  <div class="container">
    <h2 style="text-align: center;">Our Product</h2>
    <div class="row">
      <div class="col-md-3">
      <div class="card">
  <img src="img/tumpul.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Akrilik Sudut Tumpul</h5>
  </div>
</div>
      </div>
      <div class="col-md-3">
      <div class="card">
  <img src="img/siku.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Akrilik Sudut Siku</h5>
  </div>
</div>
      </div>
      <div class="col-md-3">
      <div class="card">
  <img src="img/kubah.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Akrilik Kubah</h5>
  </div>
</div>
      </div>
      <div class="col-md-3">
      <div class="card">
  <img src="img/bulat.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Akrilik Bulat</h5>
  </div>
</div>
      </div>
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
      function getGreeting() {
    var hour = new Date().getHours();
    if (hour >= 4 && hour < 10) {
      return "Selamat pagi Kasir Cantik:)";
    } else if (hour >= 10 && hour < 15) {
      return "Selamat siang Kasir Cantik:)";
    } else if (hour >= 15 && hour < 18) {
      return "Selamat sore Kasir Cantik:)";
    } else {
      return "Selamat malam Kasir Cantik:)";
    }
  }

  document.querySelector(".jumbotron h1").textContent = getGreeting();
    </script>
    <script>
      $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
    </script>
  </body>
</html>