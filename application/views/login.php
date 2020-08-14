<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.css');?>">
    <title>login</title>
    <style>
        body {
        
        background-image: url("<?php echo base_url('asset/img/organisasi.jpg');?>") ;
        background-repeat: no-repeat;
        background-size: 100%;
        }
        .card{
            text-align:center;
            right:-650px;
            height:640px;
            background-color: #F6E54E;
            margin-top : 90px;
        }

        
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
<a class="navbar-brand" href="<?php echo site_url('Dashboard/index')?>">
  <img src="<?php echo base_url('asset/img/home.png');?>" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
    Home
  </a>
  </a>
</nav>
<form action="<?php echo site_url('Dashboard/login_action')?>" method="post">
<div class="card" style="width: 30rem; height: 30rem">
  <div class="card-body">
    <h2 class="card-title" style="text-align:center;color:black;">Login</h2>
    <br>
    <p style="margin-left:-145px;">Username</p>
    <input type="text" name="username" placeholder="Nama User" style="width:220px;">

    <br>
    <br>
    
    <p style="margin-left:-145px;">Password</p>
    <input type="password" name="password" placeholder="Password" id="show" style="width:220px;" >
    <br>
    <br>
    <input type="checkbox" onclick="myFunction()">Show Password
    <br>
    <br>

    <div>
        <button type="submit" name="simpan" style="background-color : #F1E9DB; width: 90px;height: 50px; border-color:#C1C1C1;">Masuk</button>
    </div>

        <br>

    <p  class="card-link" style="color:black;">Tidak Memiliki Akun? <a href="<?php echo site_url('Dashboard/register')?>">Daftar </p>
  </div>
</div>
</form>















<script>
  function myFunction() {
  var x = document.getElementById("show");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>