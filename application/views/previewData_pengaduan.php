<div class="row">
      <div class="col-sm-12 mt-4">
        <div class="table-responsive mb-4">

        <table id ="example" class="table table-striped table-bordered" style = "width:100%;color: black;"border="1px">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Tanggal dan Waktu</th>
            <th scope="col">NIK</th>
            <th scope="col">Isi Laporan</th>
            <th scope="col">Foto</th>
            <th scope="col">Status</th>

          </tr> 
        </thead>
        <tbody>
        <?php
         
         foreach ($pengaduan as $users)
        {
          ?>
          <tr>
          
                    <td><?php echo $users->id?></td>
                    <td><?php echo $users->tanggal?></td>
                    <td><?php echo $users->nik?></td>
                    <td><?php echo $users->laporan ?></td>
                    <td><img src="<?php echo base_url('asset/img/') . $users->foto ?>" class="img-thumbnail" style="width: 600%;"></td>
                    <td><?php echo $users->status ?></td>
            
            </tr>
            <?php
            }
            ?>


      
</tbody>
</table>
  </div>
</div>
</div>