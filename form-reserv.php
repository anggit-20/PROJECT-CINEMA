<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $stmt = $conn->prepare("SELECT * FROM film WHERE id_film = ?");
  $stmt->execute([$id]);
  $film = $stmt->fetch(PDO::FETCH_ASSOC);
}

// mengambil nilai kursi yang sudah terisi dari pemesanan
$stmt = $conn->prepare("SELECT kursi FROM pemesanan WHERE id_film = ?");
$stmt->execute([$id]);
$result = $stmt->fetchAll(PDO::FETCH_COLUMN);

// gabungkan semua kursi jadi satu array
$kursi_terisi = []; //agar berupa array

foreach ($result as $data_kursi) {
  $kursi_array = explode(",", $data_kursi);
  foreach ($kursi_array as $k) {
    $kursi_terisi[] = trim($k);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1">
  <title>Aneka Cinema | Pembelian Tiket</title>

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
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake brand-image img-circle elevation-3" src="theme/dist/img/aneka-cinema.png" height="60" width="60">
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
      <img src="theme/dist/img/aneka-cinema.png" class="brand-image img-circle elevation-3" style="opacity: .8">
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
          <a href="index-cineplex.php" class="d-block">Home</a>
        </div>
      </div>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="theme/dist/img/apps.png">
        </div>
        <div class="info">
          <a href="#" class="d-block">Log Out</a>
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
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><strong>Aneka Cinema</strong></h1>
          </div><!-- /.col -->
          <div class="col-9">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Enjoy Your Movie <br> Let's complete to make orders</li>
              
            </ol>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card" style="background-color: #99090c;">
        
            <div class="card-header">
            <h4 class="card-title">
                Pembelian Tiket
            </h4>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="proses-pemesanan.php">
                <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="color: black;"><strong><?php echo $film['judul']; ?></strong></h3></br>
                <h3 class="card-title" style="color: black;"><?php echo $film['studio']; ?></h3></br>
                <h3 class="card-title" style="color: black;"><?php echo date("Y-m-d"); ?></h3>
              </div>
          
            </div>
                  
                  <div class="form-group row">
                    <label class="col-4 col-form-label" style="color: black;">Jumlah Tiket</label>
                    <div class="col-8">
                      <input type="text" class="form-control" name="jumlah_tiket">
                    </div>
                  </div>
                  
                  <div class="container text-center">
                  <!-- <div class="form-group row"> -->
                    <div class="col-8">
                      <!-- memecah dari string ke array -->
                    <?php
                    $jam_tayang = explode(",", $film['jam_tayang']);
                    ?>
                    <select class="form-select form-control" name="jam_tayang" required>
                      <option value="">Pilih Jam Tayang</option>
                      <?php foreach ($jam_tayang as $jam): ?>
                      <option value="<?php echo $jam; ?>"><?php echo $jam; ?></option>
                      <?php endforeach; ?>
                    </select>
                    </div>

                  <input type="hidden" name="id_film" value="<?php echo $film['id_film']; ?>">

                  <div class="card-body p-3">
                  <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Seat</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($kursi_terisi as $kursi): ?>
                  <tr>
                      <td><?php echo $kursi?></td>
                      <td>Sudah Terisi</td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                  </div>

                <div class="form-group text-center">
                  <label>Pilih Kursi</label><br>
                  <?php
                  $rows = range('A', 'J'); // A sampai J
                  $cols = range(1, 8);    // 1 sampai 10
                  foreach ($rows as $row) {
                    foreach ($cols as $col) {
                    $seat = $row . $col;
                    $disabled = in_array($seat, $kursi_terisi) ? 'disabled' : '';
                    echo "<label><input type='checkbox' name='kursi[]' value='$seat' $disabled> $seat</label>";
                    if ($col == 4) {
                    echo "<span style='display: inline-block; width: 30px;'></span>";
                      }
                    }
                      echo "<br>";
                  } ?>
                </div>

            <button type="submit" class="btn btn-block btn-secondary d-block">Simpan</button>
            
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