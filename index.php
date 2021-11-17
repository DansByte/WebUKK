<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
 <?php
 session_start();

 // cek apakah yang mengakses halaman ini sudah login
 if($_SESSION['level']==""){
  header("location:index.php?pesan=gagal");
 }

 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Book Store - Yan Daniels</title>
    <link rel="icon" type="image/png" sizes="16x16" href="pepe.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style type="text/css">
      * {
        font-family: "TT_Skip-E 85W";
      }
      h1 {
        text-transform: uppercase;
        color: grey;
      }
    table {
      border: solid 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #525252;
        border: solid 1px #525252;
        color:  #e8e8e8;
        padding: 10px;
        text-align: left;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
    }
    </style>
  </head>
  <body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Yan Daniels</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Keluar</a>
        </li>
      </ul>
      <form class="d-flex"action="index.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" name="cari" aria-label="Search">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

</div>
    <center><h1>Toko Buku - Yan Daniels</h1><center>
   <div class="container"><a href="tambah_produk.php" class="btn btn-secondary">+ &nbsp; Tambah Buku</a> </div> 
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Judul</th>
          <th>Pengarang</th>
          <th>Penerbit</th>
          <th>Gambar</th>
          <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
<?php
                    include "koneksi.php";
                    if(isset($_GET['cari'])) 
                    {
                        $cari = $_GET['cari'];
                        echo "<b> Hasil Pencarian : " .$cari."</b>";

                    }
                ?>
<?php
                    $id_buku=1;
                    $nama_buku = "";

                    if(isset($_GET['cari']))
                    {
                        $nama = $_GET['cari'];
                        $hasil = mysqli_query($koneksi, "SELECT * FROM buku WHERE judul LIKE '%".$nama."%'");
                    }

                    else{
                        $hasil = mysqli_query($koneksi, "SELECT * FROM buku");
                    }
                    WHILE($data = mysqli_fetch_array($hasil)){
                    ?>

      
       <tr>
          <td><?php echo $id_buku++; ?></td>
          <td><?php echo $data['judul']; ?></td>
          <td><?php echo $data['pengarang']; ?></td>
          <td><?php echo $data['penerbit']; ?></td>
          <td style="text-align: center;"><img src="gambar/<?php echo $data['gambar']; ?>" style="width: 120px;"></td>
          <td>
              <a href="edit_produk.php?id_buku=<?php echo $data['id_buku']; ?>"class="btn btn-secondary" >Edit</a> |
              <a href="proses_hapus.php?id_buku=<?php echo $data['id_buku']; ?>" onclick="return confirm('Hontōni sakujo shitaidesu ka?')"class="btn btn-secondary">Hapus</a>
          </td>
      </tr>
         
<?php } ?>
    </tbody>
    </table>

  </body>
</html>