<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url ('asset/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <title>Dashboard Admin</title>
    <style>

        body{
        background-image: url("<?php echo base_url('asset/img/background.jpg');?>") ;
        }
        .mt-5 {
            background-color: #D8EEEC;
            
        }

    </style>
</head>
<body>
<div class="row no-gutters mt-5">
        <div class="col-md-2 mt-3 pr-1 pt-5">
            <ul class="nav flex-column ml-2 mb-10">
                <li class="nav-item">
                    <li>
                    <img style="margin-left:60px;" src="<?php echo base_url().'asset/img/img_411076.png' ?>" width="165px" class="rounded-square" alt="">
                    <h5 style="text-align:center;" class="text-black mt-3">Participate</h5>
                    <hr class="bg-secondary">
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="<?php echo site_url('Dashboard/petugas_tanggapan');?>">
                    Data Akun</a>
                    <hr class="bg-secondary">
                </li>
                <br>
                <br>
                <li class="nav-item">
                <p>
                <a style="margin-left:120px; color: black;" href="<?php echo site_url('Dashboard/signout');?>">LOG OUT</a>
        </p>
                </li>
            </ul>
        </div>
        <div class="row">
        <div class="col-md-10 p-4 mt-2" style="color: black">
            <h3>Data Pengaduan</h3><hr>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr class="text-center">
        
         
            <td>id</td>
            <td>name</td>
            <td>nik</td>
            <td>email</td>
            <td>password</td>
           
          </tr> 
        </thead>
        <tbody>
        <?php
        if ($c_user>0){
          foreach ($user as $datas)
        {
          ?>

          <tr>
            <td><?php echo $datas->id;?></td>
            <td><?php echo $datas->name;?></td>
            <td><?php echo $datas->nik;?></td>
            <td><?php echo $datas->email;?></td>
            <td><?php echo $datas->password;?></td>
            
            </tr>
        <?php }
        
        }
        else {
          ?>
          <tr>
            <td colspan="8"><center>Data User Kosong</center></td>
          </tr>
          <?php
        }
        ?>
        </div>
      </div>
  </div>
  </div>
</div>
</body>
</html>