<div class="row">
      <div class="col-sm-12 mt-4">
        <div class="table-responsive mb-4">

        <table id ="example" class="table table-striped table-bordered" style = "width:100%;color: black;"border="1px">
        <thead>
          <tr>
            <td>id</td>
            <td>name</td>
            <td>nik</td>
            <td>email</td>
            <td>Password</td>
            

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
        


      
</tbody>
</table>
  </div>
</div>
</div>