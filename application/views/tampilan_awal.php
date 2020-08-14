<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">


<style type="text/css"> 
    body {
    background-image: url("<?php echo base_url('asset/img/organisasi.jpg');?>") ;
    font-family: 'Gotham';
    background-repeat: no-repeat;
    background-size: 100%;
}

p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}

a, a:hover, a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

.wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
}

#sidebar {
    background: #F6E54E;
    color: black;
    min-width: 380px;
    max-width: 400px;
    min-height: 100vh;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #603F0E;
    color: white;
}

#sidebar ul.components {
    padding: 20px 0;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}
#sidebar ul li a:hover {
    color: #F6E54E;
    background: #50380C;
}

#sidebar ul li.active > a, a[aria-expanded="true"] {
    color: #fff;
    background: #50380C;
}
ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #50380C;
}

img{
    border-radius: 50%;
    width: 40%;
}

.cont{
    display: block;
    margin: 25px auto;
    padding: auto;
}

.card{
    border-radius: 15px;
    margin-top: auto;
    text-transform: uppercase;
}

.yes{
    text-align: center;
    background-color: rgb(88, 219, 88);
    font-size: 100px;
    border: 0;
    color: white;
    font-weight: bold;
}

.no{
    text-align: center;
    background-color: rgb(226, 65, 65);
    font-size: 100px;
    border: 0;
    color: white;
    font-weight: bold;
}

.will{
    text-align: center;
    background-color: #229CA9;
    font-size: 100px;
    border: 0;
    color: white;
    font-weight: bold;
}
    </style>
</head>
<body>
<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <img src="<?php echo base_url('asset/img/img_411076.png');?>" width="50" height="110" >
            <h3>Participate</h3>
            <h4>0123456789</h4>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="#">Dashboard</a>
            </li>
            <li>
                <a href="#">User</a>
            </li>
            <li>
                <a href="#">Petugas</a>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
            <li>
                <a href="#">Pengaduan</a>
            </li>
            
        </ul>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <p>
                <a style="margin-left:140px; color: black;" href="<?php echo site_url('Dashboard/log_out');?>">LOG OUT</a>
        </p>
    </nav>
    <div class="cont">
       <div class="card mb-3" style="max-width: 700px;">
            <div class="row no-gutters">
          <div class="col-md-4">
          <div class="card yes">0</div>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h2 style="color:rgb(88, 219, 88);">Laporan Pengaduan Sudah Ditanggapi</h2>
      </div>
    </div>
  </div>
</div>
<div class="card mb-3" style="max-width: 700px;">
            <div class="row no-gutters">
          <div class="col-md-4">
     <div class="card no">0</div>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h2 style="color: rgb(226, 65, 65);">Laporan Pengaduan Belum Ditanggapi</h2>
      </div>
    </div>
  </div>
</div>
<div class="card mb-3" style="max-width: 700px;">
            <div class="row no-gutters">
          <div class="col-md-4">
      <div class="card will">0</div>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h2 style="color: #229CA9;">Laporan Pengaduan Segera Ditanggapi</h2>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</body>
</html>