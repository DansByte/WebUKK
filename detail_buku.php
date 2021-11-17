<?php
 session_start();

 // cek apakah yang mengakses halaman ini sudah login
 if($_SESSION['level']==""){
  header("location:index.php?pesan=gagal");
 }

 ?>
 <?php 
  error_reporting(0);
  include 'koneksi.php';

  $buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku = '".$_GET['id']."' ");
  $f = mysqli_fetch_object($buku);
?>
 <!DOCTYPE html>
<html>
<head>
 <title>Halaman User</title>
 <link rel="icon" type="image/png" sizes="16x16" href="pepe.png">
 <style type="text/css">
      * {
        font-family: "TT_Skip-E 85W";
     }
      h1 {
        text-transform: capitalize;
        color: grey;
      }
      .col-ke-2{
  width: 50%;
  min-height: 200px;
  padding:10px;
  box-sizing: border-box;
  float: left;
}
 </style>

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3?v=1.0" crossorigin="anonymous">
</head>
<body> 
    <div class="container"> 
    <nav class="navbar navbar-expand-lg navbar-white bg-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="halaman_user.php">Yan Daniels</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="halaman_user.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Keluar</a>
        </li>

      </ul>
      <form class="d-flex"action="halaman_user.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="cari">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</div>
 <div class="container">
 <h3>List Buku</h3>

 <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login<b></b>.</p>
</div>

 <br/>
 <br/>
 <div class="container">
<?php
    include "koneksi.php";
    if(isset($_GET['cari']))
    {
        $cari = $_GET['cari'];

        echo "<b> Hasil Pencarian : " .$cari."</b>";

    }
?>
</div>

<div class="container">

      <h3>Detail Buku</h3>
        <div class="card-body col-ke-2">
          <img src="gambar/<?php echo $f->gambar ?>" class="card-img-top" height="500">
        </div>
        <div class="col-ke-2">
          <h3><?php echo $f->judul ?></h3>
          <p>Pengarang :<br>
            <?php echo $f->pengarang ?>
          </p>
          <p>Penerbit :<br>
            <?php echo $f->penerbit ?>


      </div>
    </div>
</body>
</html>