<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Masyarakat</title>
    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bootstrap.css') ?>">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<style>

        body{
        background-image: url("<?php echo base_url('asset/img/background.jpg');?>") ;
        }
</style>
<body>

    <div class="wrapper">
        <nav class="navbar navbar-dark bg-info">
            <a class="navbar-brand" href="#"><h3>Pengaduan Masyarakat</h3></a>
          

        </nav>
        <div class="row mt-5">
            <div class="col-md-6 mt-5">
                <center>
                    <img src="<?php echo base_url().'asset/img/organisasi.jpg' ?>" width="80%" alt="">
                </center>
                    
            </div>
            <div class="col-md-6 mt-5">
                <h1 class="text-center" style="font-family: Verdana; font-size: 40px; margin-top: 150px; color: black; margin-left: -100px">Hallo, apa yang ingin<br>Anda Adukan</h1>
                <br>
                <center>
                    <a href="<?php echo site_url('Dashboard/masuk') ?>"><button type="submit" class="btn btn-info" style="color: black; margin-left: -100px">Adukan Sekarang</button></a>
                </center>        
            </div>
        </div>
    </div>
</body>
</html>