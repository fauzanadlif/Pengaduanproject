<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href=<?php echo base_url("asset/vendor/fontawesome-free/css/all.min.css")?> rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" 
  href="<?php echo base_url ('asset/css/sb-admin-2.min.css')?>">
  
  

</head>

<body id="page-top">

<?php $this->load->view('partial/sidebarUser');?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php $this->load->view('partial/navbar-topbar');?> 
          <!-- Content Create -->
           <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Laporan Anda</h6>
            </div>
          <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">id</th>
                        <th scope="col">Tanggal dan Waktu</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Isi Laporan</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                if ($c_user > 0) {
                    foreach ($user as $datas) {
                ?>
                    <tr>
                        <td><?php echo $datas->id?></td>
                        <td><?php echo $datas->tanggal ?></td>
                        <td><?php echo $datas->nik ?></td>
                        <td><?php echo $datas->laporan ?></td>
                        <td><img width="150px" src="<?php echo base_url('asset/img/'). $datas->foto ?>"></td>
                        <td class="text-center">
                            <a href="<?php echo site_url('Dashboard/editdatapeng/'. $datas->id) ?>" 
                              class="btn btn-success">
                              <i class="fa fa-edit"></i><span class="ml-2">Edit</span>
                            </a>
                            
                            <?php echo anchor('dashboard/deleteData/'.$datas->id,' <button type="submit" class="btn btn-danger">
                              <i class=" fa fa-trash"></i><span class="ml-2">Delete</span>
                          </button>')?>
                            <br>
                            <br>
                            <a href="<?php echo site_url('Dashboard/lihat_tanggapan')?>" class="btn btn-secondary btn-icon-split">
                                <span class="icon text-white-50">
                                </span>
                                <span class="text">Lihat Tanggapan</span>
                            </a>
                        </td>
                    </tr>
                    <?php }
                } else {
                    ?>
                    <tr>
                        <td colspan="8">
                            <center> Tidak ada Laporan! </center>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
          </div>
        </div>
    </div>
</div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo site_url('Dashboard/signout');?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src=<?php echo base_url("asset/vendor/jquery/jquery.js")?>></script>
  <script src=<?php echo base_url("asset/vendor/bootstrap/js/bootstrap.bundle.js")?>></script>

  <!-- Core plugin JavaScript-->
  <script src=<?php echo base_url("asset/vendor/jquery-easing/jquery.easing.js")?>></script>

  <!-- Custom scripts for all pages-->
  <script src=<?php echo base_url("asset/js/sb-admin-2.js")?>></script>

  <!-- Page level plugins -->
  <script src=<?php echo base_url("asset/vendor/chart.js/Chart.js")?>></script>

  <!-- Page level custom scripts -->
  <script src=<?php echo base_url("asset/js/demo/chart-area-demo.js")?>></script>
  <script src=<?php echo base_url("asset/js/demo/chart-pie-demo.js")?>></script>

</body>

</html>
