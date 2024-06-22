<?php
include 'config.php';
session_start();
$barang=mysqli_query($koneksi, "SELECT * FROM barang");

$sum = 0;
if(isset($_SESSION['cart']))
{
    foreach ($_SESSION['cart'] as $key=>$value) {
        $sum += $value['harga']*$value['qty'];
    }
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
  <a class="navbar-brand" href="index.php">LONAYS</a>
  <ul class="navbar-nav ml-auto">
        <li class="nav-item mr-0">
            <a href="logout.php" class="nav-link">
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
    <div class="col-md-6 mt-2 pr-3 pl-3 pt-4">
        <form method="post" action="keranjang_aksi_kasir.php" class="form-inline">
        <div class="input-group">
                <select class="form-control" name="id_barang">
                    <option value="">Pilih Barang</option>
                    <?php while ($row = mysqli_fetch_array($barang)) { ?>
                    <option value="<?=$row['id_barang']?>"><?=$row['nama_barang']?></option>
                    <?php
                    } ?>
                </select>
            </div>
            <div class="input-group pl-3">
               <input type="number" name="qty" class="form-control" placeholder="Jumlah">
                <span class="input-group-btn">
                <button class="btn btn-primary" type="submit">Tambah</button>
                </span>
            </div>
        </form>
        <form method="post" action="keranjang_update_kasir.php">
        <a href="keranjang_reset_kasir.php">Reset Keranjang</a>
    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Sub Total</th>
            <th></th>
        </tr>
        <?php if(isset($_SESSION['cart'])): ?>
        <?php foreach ($_SESSION['cart'] as $key=>$value) { ?>
        <tr>
            <td><?=$value['nama_barang']?></td>
            <td><?=number_format($value['harga'])?></td>
            <td class="col-md-2"><input type="number" name="qty[]" value="<?=$value['qty']?>" class="form-control"></td>
            <td><?=number_format($value['qty']*$value['harga'])?></td>
            <td><a href="keranjang_hapus_kasir.php?id=<?=$value['id']?>" class="btn btn-danger"><i class="fas fa-window-close"></i></a></td>
        </tr>
        <?php } ?>
        <?php endif; ?>
    </table>
    <button type="submit" class="btn btn-success">Perbaharui</button>
    </form>
    </div>
    <div class="col-md-4 mt-2 pr-3 pt-4">
        <h3>Total Rp. <?=number_format($sum)?></h3>
        <form action="transaksi_aksi_kasir.php" method="POST">
          <input type="hidden" name="total" value="<?=$sum?>">
        <div class="form-group">
          <label>Bayar</label>
          <input type="text" id="bayar" name="bayar" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Selesai</button>
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
    <script type="text/javascript">
// inisialisasi inputan
      var bayar = document.getElementById('bayar');

      bayar.addEventListener('keyup', function (e) {
        bayar.value = formatRupiah(this.value, 'Rp. ');
      });

      // generate dari inputan angka menjadi format rupiah

      function formatRupiah(angka,prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if(ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      }
    </script>
  </body>
</html>