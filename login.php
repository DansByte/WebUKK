<html>
<head>
 <title>Yan Daniels</title>
 <link rel="icon" type="image/png" sizes="16x16" href="pepe.png">
 <link rel="stylesheet" type="text/css" href="style.css?v=1.0">
</head>
<body>

 <h1>Toko Buku Yan Daniels</h1>

 <?php
 if(isset($_GET['pesan'])){
  if($_GET['pesan']=="gagal"){
   echo "<div class='alert'>Username dan Password Salah !</div>";
  }
 }
 ?>

 <div class="panel_login">
  <p class="tulisan_atas">Login</p>

  <form action="cek_login.php" method="post">
   <label>Username</label>
   <input type="text" name="username" class="form_login" placeholder="Username" required="required">

   <label>Password</label>
   <input type="password" name="password" class="form_login" placeholder="Password" required="required">

   <input type="submit" class="tombol_login" value="LOGIN">

   <br/>
   <br/>
   
  </form>
  
 </div>


</body>
</html>