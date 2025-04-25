<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $stmt = $conn->prepare("SELECT * FROM film WHERE id_film = ?");
  $stmt->execute([$id]);
  $film = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1">
  <title>Aneka Cinema | Detail Pemesanan</title>

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
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
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
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
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
                <h3 class="card-title" style="color: black;">Studio <?php echo $film['studio']; ?></h3>
              </div>
          
            </div>

                  <div class="form-group row">
                    <label class="col-4 col-form-label" style="color: black;">Nama</label>
                    <div class="col-8">
                      <input type="text" class="form-control" name="nama">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-4 col-form-label" style="color: black;">Email</label>
                    <div class="col-8">
                      <input type="text" class="form-control" name="email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-4 col-form-label" style="color: black;">Lokasi</label>
                    <div class="col-8">
                      <input type="text" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="container text-center">
                  <div class="row">
                  <div class="col"><button type="button" class="btn btn-outline-secondary">Date</button></div>
                  <!-- <div class="form-group row"> -->
                    <div class="col-8">
                    <select class="form-select form-control" aria-label="Default select example">
                      <option selected>Pilih Jam Tayang</option>
                    </select>
                    </div>
                  </div>
                
                  <div class="layout-seat" style="margin-top: 15px;">
                    <img style="width: 100%;" src="theme/dist/img/coba-layout.png">
                  </div>

                  <div class="form-group row mt-3">
  <label class="col-4 col-form-label" style="color: white;">Masukkan Kursi</label>
  <div class="col-4">
    <input type="text" id="inputKursi" class="form-control" placeholder="Contoh:A1">
  </div>
  <div class="col-4">
    <button type="button" class="btn btn-success" onclick="tambahKursi()">Tambah</button>
  </div>
</div>

<!-- Daftar kursi yang dipilih -->
<div class="form-group row">
  <label class="col-4 col-form-label" style="color: white;">Kursi Terpilih</label>
  <div class="col-8">
    <P id="daftarKursi" class="text-white"></P>
  </div>
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
                  <tr>
                      <td>Task</td>
                      <td>Progress</td>
                    </tr>
                  </tbody>
                </table>
                  </div>

            <button type="submit" class="btn btn-block btn-primary" style="width: 80px; margin: 10px;">Simpan</button>
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
  <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer> -->

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
<script>
  let kursiTerpilih = [];

  function tambahKursi() {
    const input = document.getElementById('inputKursi');
    const value = input.value.trim().toUpperCase();
    
    if (value && !kursiTerpilih.includes(value)) {
      kursiTerpilih.push(value);
      updateDaftarKursi();
      input.value = '';
    }
  }

  function updateDaftarKursi() {
    const daftar = document.getElementById('daftarKursi');
    daftar.innerHTML = '';
    
    kursiTerpilih.forEach((kursi, index) => {
      const li = document.createElement('li');
      li.textContent = kursi + " ";
      
      const hapusBtn = document.createElement('button');
      hapusBtn.textContent = 'Hapus';
      hapusBtn.className = 'btn btn-secondary btn-sm ml-2';
      hapusBtn.onclick = () => {
        kursiTerpilih.splice(index, 1);
        updateDaftarKursi();
      };

      li.appendChild(hapusBtn);
      daftar.appendChild(li);
    });

    document.getElementById('kursiTerpilihInput').value = kursiTerpilih.join(',');
  }
</script>

</body>
</html>