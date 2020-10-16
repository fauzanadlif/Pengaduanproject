<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload done</title>
    
    <style>
    body {
    font-family: "segoe UI";
    background-image: url("<?php echo base_url('asset/img/background.jpg');?>") ;
    }
    label,h1 {
        text-transform: uppercase;
        font-weight: bold;
    }
    h1 {
        text-align: center;
        font-size: 30px;
    }
    button {
        border-radius: 10px;
        padding: 10px;
        width: 120px;
        font-weight: bold;
    }
    
    </style>

  
    
</head>
<body class="bg-light">
    <div class="wrapper">
            <h1 class="text-secondary" style="margin-top: 20%;">Laporan berhasil di edit</h1><br>
            <center>
                    <a href="<?php echo site_url('Dashboard/tampilan_user') ?>">
                    <button type="submit"  class="btn btn-info" style="color: black; margin-left: 10px">Kembali</button></a>
            </center>   
           
    </div>
</body>
</html>
