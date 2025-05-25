<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1">
  <title>Aneka Cinema | form add movie</title>

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
  <style>
    
    </style>
</head>
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
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
          <img src="theme/dist/img/apps.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="index-cineplex.php" class="d-block">Dashboard</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><strong>Aneka Cinema</strong></h1>
          </div><!-- /.col -->
          <div class="col-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Enjoy Your Movie <br> Let's login to make orders</li>
              
            </ol>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
        
            <div class="card-header">
            <h4 class="card-title">
                Tambah Film Baru
            </h4>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="tambah-film.php" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-4 col-form-label">Judul</label>
                    <div class="col-8">
                      <input type="text" class="form-control" name="judul">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-4 col-form-label">Tahun Rilis</label>
                    <div class="col-8">
                      <input type="text" class="form-control" name="tahun">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-4 col-form-label">Durasi</label>
                    <div class="col-8">
                      <input type="text" class="form-control" name="durasi" placeholder="menit">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-4 col-form-label">Genre</label>
                    <div class="col-8">
                      <input type="text" class="form-control" name="genre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-4 col-form-label">Usia</label>
                    <div class="col-8">
                    <select class="form-select form-control" aria-label="Default select example" name="usia">
  <option selected>Pilih Batas Usia</option>
  <option value="Semua Umur">Semua Umur</option>
  <option value="13+">13+</option>
  <option value="17+">17+</option>
  <option value="21+">21+</option>
</select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-4 col-form-label">Harga</label>
                    <div class="col-8">
                      <input type="text" class="form-control" name="harga">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-4 col-form-label">Sinopsis</label>
                    <div class="col-8">
                      <input type="text" class="form-control" name="sinopsis">
                    </div>
                  </div>
                  <div class="form-group row">
                  <label class="col-4 col-form-label">Studio</label>
                    <div class="col-8">
                    <select class="form-select form-control" aria-label="Default select example" name="studio">
  <option selected>Pilih Studio</option>
  <option value="Studio 1">Studio 1</option>
  <option value="Studio 2">Studio 2</option>
  <option value="Studio 3">Studio 3</option>
</select>
                    </div>
                  </div>
                  <label>Jam Tayang:</label><br>
<input type="checkbox" name="jam_tayang[]" value="13:00"> 13:00<br>
<input type="checkbox" name="jam_tayang[]" value="14:05"> 14:05<br>
<input type="checkbox" name="jam_tayang[]" value="17:15"> 17:15<br>
<input type="checkbox" name="jam_tayang[]" value="19:45"> 19:45<br>
                  <div class="form-group">
                    <label for="exampleInputFile">Thumbnail (Poster)</label>
                    <div class="input-group">
                      <div class="custom-file">
                      <input type="file" class="form-control" name="thumbnail">
                      
                    </div>
                  </div>
                  
            </div>
        </div>

        <button type="submit" class="btn btn-block btn-danger" style="width: 80px; margin: 10px;">Simpan</button>
            </div>
            </form>
            <!-- /.card -->
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