<?php
  include 'koneksi.php';
  $query = "SELECT * FROM film ORDER BY judul DESC"; //urutkan data berdasarkan kolom id

  $stmt = $conn->query($query); // Gunakan PDO query

// Ambil semua data sekaligus sebagai array
$films = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1">
  <title>Aneka Cinema</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="theme/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="theme/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="theme/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="theme/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="theme/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="theme/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="theme/plugins/summernote/summernote-bs4.min.css">
</head>

<div class="wrapper black">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake brand-image img-circle elevation-3" src="theme/dist/img/aneka-cinema.png" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="theme/dist/img/aneka-cinema.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Aneka Cinema</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="theme/dist/img/apps.png">
        </div>
        <div class="info">
          <a href="login-admin.php" class="d-block">Admin</a>
        </div>
      </div>

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="theme/dist/img/apps.png">
        </div>
        <div class="info">
          <a href="logout.php" class="d-block">Log Out</a>
        </div>
      </div>

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="theme/dist/img/apps.png">
        </div>
        <div class="info">
          <a href="index-user.php" class="d-block">My Account</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-black">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0"><strong>Aneka Cinema</strong></h1>
          </div><!-- /.col -->
  

          <div class="col-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Enjoy Your Movie <br> Let's login to make orders</li>
            </ol>
          </div><!-- /.col -->
        
          <div class="col-6 row">
          <button type="button" class="btn btn-block rounded-pill" style="width: 70px; margin: 10px; background-color: #99090c; color: white;"><a href="login-user.php" style="text-decoration: none; color: white;">Masuk</a></button>
          <button type="button" class="btn btn-block rounded-pill" style="width: 70px; margin: 10px; background-color: #99090c; color: white;"><a href="daftar-user.php" style="text-decoration: none; color: white;">Daftar</a></button>
          </div>

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid mt-4">
        <h3><strong>Now playing</strong></h3>
        <!-- Small boxes (Stat box) -->
        <div class="row mt-2">
          <!--perulangan untuk menampilkan film-->
        <?php foreach ($films as $film) : ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <!-- box now playing -->
            
            <div class="small-box" style="background-color: #99090c;">
              <div class="inner">
              <img style="width: 150px; height: 200px;" src="theme/dist/thumbnail/<?php echo $film['thumbnail']; ?>" alt="<?php echo $film['judul']; ?>">
              
              </div>
              <div class="fs-2"><strong><?php echo $film['judul']; ?></strong></div>
            </div>
            <div class="text-center mb-3">
            <button type="button" class="btn btn-outline-secondary rounded-pill"><a href="desk_film.php?id=<?= $film['id_film'] ?>" style="text-decoration: none; color: white;">More Info</a></button>
            </div>
          </div>
          <?php endforeach; ?>
          
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="theme/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="theme/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="theme/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="theme/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="theme/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="theme/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="theme/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="theme/plugins/moment/moment.min.js"></script>
<script src="theme/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="theme/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="theme/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="theme/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="theme/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="theme/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="theme/dist/js/pages/dashboard.js"></script>
</body>
</html>