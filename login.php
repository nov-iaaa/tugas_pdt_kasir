<?php

include 'config.php';
session_start();

if (isset($_POST['masuk'])) 
{

    $username=$_POST['username'];
    $password=$_POST['password'];

    $query = mysqli_query($koneksi,"SELECT*FROM user WHERE username='$username' and password='$password'");

    // mendapatkan hasil dari data
    $data = mysqli_fetch_assoc($query);

    //mendapatkan nilai jumlah data
    $check = mysqli_num_rows($query);

    if(!$check) {
        $_SESSION['error'] = 'Username dan password salah';
    }
    else
    {
        $_SESSION['userid'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role_id'] = $data['role_id'];

        header("location:index.php");
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

    <div class="container" style="width:40%; margin-top:9%; box-shadow: 0 3px 20px rgba(0,0,0,0.2); padding:40px">
        <!-- alert -->
       <?php if(isset($_SESSION['error']) && $_SESSION['error'] != '') {?>
    
        <div class="alert-danger" role="alert">
            <?=$_SESSION['error']?>
        </div>
        <?php
    }
    $_SESSION['error'] = '';
    ?>
    <!-- end alert -->
    <h1 class="text-center">LOGIN</h1>
    <hr>
    <form method="post">
        <div class="form-group">
            <label for="exampleInputEmail">Username</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
             <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <div class="input-group">
            <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                </div>
             <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
        </div>
        <input type="submit" name="masuk" value="Masuk" class="btn btn-primary">
    </form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>