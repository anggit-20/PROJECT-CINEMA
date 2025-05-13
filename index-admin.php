<?php
// jika belum login redirect ke halaman login
session_start();
$email = $_SESSION['email'];
if(!isset($email)) {
  header('Location:login-admin.php');
}

?>

<?php
include 'koneksi.php';

$stmt = $conn->query("SELECT * FROM film ORDER BY id_film DESC");
$films = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1">
  <title>Aneka Cinema | Admin</title>

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
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
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
      <span class="brand-text font-weight-light" >Aneka Cinema</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="theme/dist/img/user8-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin Cinema</a>
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
        
          </div><!-- /.col -->
          <!-- <button type="button" class="btn btn-block btn-primary"><a href="form-add-movie.php">Add New Movie</a></button> -->
          <button type="button" class="btn btn-block btn-danger" style="border-radius: 20px;">
  <a href="form-add-movie.php" style="color: white; text-decoration: none;">Add New Movie</a>
</button>

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <h2></h2>
          <!-- ./col -->
        </div>

        <!-- tabel riwayat input data film-->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Riwayat Input Film</h3>
              </div>
        <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>judul</th>
                    <th>tahun</th>
                    <th>durasi</th>
                    <th>genre</th>
                    <th>usia</th>
                    <th>harga</th>
                    <th>sinopsis</th>
                    <th>studio</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php foreach ($films as $film):?>
                  <tr>
                    <td><?php echo $film['judul']; ?></td>
                    <td><?php echo $film['tahun']; ?></td>
                    <td><?php echo $film['durasi']; ?></td>
                    <td><?php echo $film['genre']; ?></td>
                    <td><?php echo $film['usia']; ?></td>
                    <td><?php echo $film['harga']; ?></td>
                    <td><?php echo $film['sinopsis']; ?></td>
                    <td><?php echo $film['studio']; ?></td>
                    <td><a href="./hapus-film.php?id_film=<?php echo $film['id_film'] ?>" class="btn btn-danger">Hapus</a>
                    <button type="button" class="btn btn-warning">Edit</button></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable Pembelian Ticket</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Pukul</th>
                    <th>Judul Film</th>
                    <th>Jumlah Ticket</th>
                    <th>Studio</th>
                    <th>Nama</th>
                    <th>Nomor Kursi</th>
                    <th>Total Pembayaran</th>
                    <th>Bukti Pembayaran</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>5/5/2025</td>
                    <td>15.25</td>
                    <td>Pengepungan di Bukir Duri</td>
                    <td>2</td>
                    <td>3</td>
                    <td>Ahmad</td>
                    <td>1A,2A</td>
                    <td>100.000,00</td>
                    <td>DANA</td>
                  </tr>
                  <tr>
                    <!-- <td>7/10/2007</td>
                    <td>12.30</td>
                    <td>Jumbo</td>
                    <td>3</td>
                    <td>1</td>
                    <td>Ukik</td>
                    <td>2B,3B,4B</td>
                    <td>150.000,00</td>
                    <td>Transfer BCA</td> -->
                  </tr>
                  </tbody>
                  <tfoot>
                  <!-- <tr>
                  <th>Tanggal</th>
                    <th>Pukul</th>
                    <th>Judul Film</th>
                    <th>Studio</th>
                    <th>Nama</th>
                    <th>Nomor Kursi</th>
                    <th>Total Pembayaran</th>
                    <th>Bukti Pembayaran</th>
                  </tr> -->
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <!-- <section class="col-lg-7 connectedSortable"> -->
            <!-- Custom tabs (Charts with tabs)-->
            <!-- <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Sales
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                  </ul>
                </div> -->
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable Pendapatan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Total Pembayaran</th>
                    <th>Jumlah Akhir</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Tanggal</th>
                    <th>Total Pembayaran</th>
                    <th>Jumlah Akhir</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

                 <!-- Donut chart -->
                 <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                Data Pembelian Tiket
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="donut-chart" style="height: 300px;"></div>
              </div>
              <!-- /.card-body-->
            </div>
                  <!-- <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">In-Store</div>
                  </div> -->
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

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
<script src="theme/plugins/flot/jquery.flot.js"></script>
<script src="theme/plugins/flot/plugins/jquery.flot.pie.js"></script>

<script>
  $(function () {
    /*
     * DONUT CHART
     * -----------
     */
    var donutData = [
      {
        label: 'Pengepungan di Bukit Duri',
        data: 75,
        color: '#3c8dbc'
      },
      {
        label: 'Jumbo',
        data: 25,
        color: '#0073b7'
      },
    ];

    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show: true,
          radius: 1,
          innerRadius: 0.5,
          label: {
            show: true,
            radius: 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }
        }
      },
      legend: {
        show: false
      }
    });

    function labelFormatter(label, series) {
      return '<div style="font-size:13px; text-align:center; padding:2px; color:white;">'
        + label + '<br>' + Math.round(series.percent) + '%</div>';
    }
  });
</script>
</body>
</html>