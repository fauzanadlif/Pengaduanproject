<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.css');?>">
    <title>Register</title>
    <style>
      body {
        background-color: #D8EEEC;
        background-repeat: no-repeat;
        background-size: 100%;
        }
        .card{
            text-align:center;
            right:-650px;
            height:700px;
            top:50px;
            border-radius:30px;
            background-color: #EFB025;
        }
      
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
 
  <a class="navbar-brand" href="<?php echo site_url('Dashboard/masuk')?>">
  <img src="<?php echo base_url('asset/img/back.png');?>" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
    Back
  </a>
</nav>
<form action="<?php echo site_url('Dashboard/simpan_data');?>" method="post">
<div class="card" style="width: 28rem; height: 38rem">
  <div class="card-body">
    
    <h2 class="card-title" style="text-align:center;color:black;">Register</h2>
    
    <br>

    <p style="margin-left:-150px;">Username</p>
    <input type="text" name="nama" placeholder="Name" style="width:220px;">

    <br>
    <br>

    <p style="margin-left:-190px;">NIK</p>
    <input type="text" name="nikk" placeholder="nik" style="width:220px;">

    <br>
    <br>

    <p style="margin-left:-180px;">Email</p>
    <input type="text" name="emaill" placeholder="Email" style="width:220px;">

    <br>
    <br>
    
    <p style="margin-left:-145px;">Password</p>
    <input type="password" name="pw" id="show" placeholder="Password" style="width:220px;" >
    <br>
    <br>

    
    <input type="checkbox" onclick="myFunction()">Show Password
    
    <br>
    <br>

    <div>
        <button  type="submit" name="simpan" style="background-color : #F1E9DB; width: 90px;height: 50px;border-color:#C1C1C1;">Daftar</button>  
    </div>
    <br>
    
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