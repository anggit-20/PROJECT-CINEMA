<?php 
// if (isset($_GET['id'])) {
//     $id_pemesanan = $_GET['id'];
//     $id_user = $_GET['id'];

//     // Ambil data dari tabel pemesanan
//     $stmt1 = $conn->prepare("SELECT * FROM pemesanan WHERE id_pemesanan = ?");
//     $stmt1->execute([$id_pemesanan]);
//     $pemesanan = $stmt1->fetch(PDO::FETCH_ASSOC);

//     // Ambil data film berdasarkan id_film dari pemesanan
//     if($pemesanan) {
//       $stmt2 = $conn->prepare("SELECT * FROM film WHERE id_film = ?");
//       $stmt2->execute([$pemesanan['id_film']]);
//       $film = $stmt2->fetch(PDO::FETCH_ASSOC);
//     }

//     $stmt3 = $conn->prepare("SELECT * FROM user WHERE id_user = ?");
//     $stmt3->execute([$pemesanan['id_user']]);
//     $user = $stmt3->fetch(PDO::FETCH_ASSOC);

// }

include 'koneksi.php';
session_start();

if (!isset($_GET['id'])) {
    header("Location: index-cineplex.php");
    exit;
}

$id_pemesanan = $_GET['id'];
$stmt1 = $conn->prepare("SELECT * FROM pemesanan WHERE id_pemesanan = ?");
$stmt1->execute([$id_pemesanan]);
$pemesanan = $stmt1->fetch(PDO::FETCH_ASSOC);

if (!$pemesanan) {
    echo "Data pemesanan tidak ditemukan.";
    exit;
}

$stmt2 = $conn->prepare("SELECT * FROM film WHERE id_film = ?");
$stmt2->execute([$pemesanan['id_film']]);
$film = $stmt2->fetch(PDO::FETCH_ASSOC);

$stmt3 = $conn->prepare("SELECT * FROM user WHERE id_user = ?");
$stmt3->execute([$pemesanan['id_user']]);
$user = $stmt3->fetch(PDO::FETCH_ASSOC);

// waktu_pesan dari database (pastikan ada kolom ini)
$waktu_pesan = isset($pemesanan['waktu_pesan']) ? strtotime($pemesanan['waktu_pesan']) : time();

// Proses upload
$kode_pemesanan = null;
if (isset($_POST['upload_bukti'])) {
    $sekarang = time();
    if ($sekarang - $waktu_pesan <= 300) {
        $namaFile = $_FILES['bukti']['name'];
        $tmpName = $_FILES['bukti']['tmp_name'];
        $target = "theme/dist/uploads/" . $namaFile;

        move_uploaded_file($tmpName, $target);

        $stmt = $conn->prepare("UPDATE pemesanan SET bukti_pembayaran = ? WHERE id_pemesanan = ?");
        $stmt->execute([$namaFile, $id_pemesanan]);

        $stmt1 = $conn->prepare("SELECT * FROM pemesanan WHERE id_pemesanan = ?");
        $stmt1->execute([$id_pemesanan]);
        $pemesanan = $stmt1->fetch(PDO::FETCH_ASSOC);

        $kode_pemesanan = strtoupper(substr(md5(rand()), 0, 8));
        $_SESSION['kode_pemesanan'] = $kode_pemesanan;
    } else {
        header("Location: index-cineplex.php");
        exit;
    }
}

// Ambil dari session kalau sudah pernah upload
if (isset($_SESSION['kode_pemesanan'])) {
    $kode_pemesanan = $_SESSION['kode_pemesanan'];
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
              <li class="breadcrumb-item active">Enjoy Your Movie <br>Let's Complete the Orders</li>
              
            </ol>
          </div><!-- /.col -->
          <button type="button" class="btn btn-block btn-primary" id="timerButton" style="width: 80px; margin: 10px;">05:00</button>
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
                Detail Pemesanan Ticket
            </h4>
            </div>
            <div class="card-body">
            <?php if ($film && $pemesanan): ?>
                <form class="form-horizontal" method="POST" action="detail-reserv.php?id=<?= $id_pemesanan ?>" enctype="multipart/form-data">
                <input type="hidden" name="id_pemesanan" value="<?= $pemesanan['id_pemesanan']; ?>">
                <div class="form-group row">
                    <label class="col-4 col-form-label">Judul</label>
                    <div class="col-8">
                      <input type="text" class="form-control" value="<?php echo $film['judul']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-4 col-form-label">Email</label>
                    <div class="col-8">
                      <input type="text" class="form-control" value="<?php echo $user['email']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-4 col-form-label">Tanggal</label>
                    <div class="col-8">
                      <input type="text" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-4 col-form-label">Waktu</label>
                    <div class="col-8">
                      <input type="text" class="form-control" value="<?php echo $pemesanan['jam_tayang']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-4 col-form-label">Kursi</label>
                    <div class="col-8">
                      <input type="text" class="form-control" value="<?php echo $pemesanan['kursi']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-4 col-form-label">Total</label>
                    <div class="col-8">
                      <input type="text" class="form-control" value="<?php echo $pemesanan['total']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-4 col-form-label">Pembayaran</label>
                    <div class="col-8">
                      <input type="text" class="form-control" value="0987654321" disabled>
                      <p>nomor tujuan pembayaran</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="bukti">Upload Bukti Pembayaran</label>
                    <div class="input-group">
                      <div class="custom-file">
                      <input type="file" class="form-control" id="bukti" name="bukti" required>
                      <label class="input-group-text">Upload</label>
                    </div>
                  </div>
                  <button type="submit" name="upload_bukti" class="btn btn-secondary mt-2" style="width: 200px;">Kirim Bukti</button>
                  <?php if (!empty($pemesanan['bukti_pembayaran'])): ?>
                  <div>
                    <p class="mb-0 mt-3"><strong>Kode Pemesanan Anda :</strong></p>
                    <p class="mt-0" style="color: red;">Simpan kode anda untuk verifikasi offline</p>
                    <?php if (isset($_SESSION['kode_pemesanan'])): ?>
        <div class="alert alert-success"><?= $_SESSION['kode_pemesanan']; ?></div>
        <?php unset($_SESSION['kode_pemesanan']); ?>
    <?php else: ?>
        <div class="alert alert-warning">Belum ada kode. Silakan upload bukti pembayaran.</div>
    <?php endif; ?>
                  </div>
                  <?php endif; ?>

                  <button type="submit" name="upload_bukti" class="btn btn-secondary" style="width: 200px;">Selesai</button>
                  </form>
                  <?php else: ?>
  <div class="alert alert-danger">Data pemesanan tidak ditemukan.</div>
<?php endif; ?>
            </div>
        </div>

        <div class="callout callout-warning text-center">
                  <h5>Silahkan lakukan pembyaran</h5>
                  <p>Sebelum tenggat waktu habis!</p>
        </div>
            </div>
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

<script>
let waktuPemesanan = <?= $waktu_pesan ?> * 1000;
let batasWaktu = 5 * 60 * 1000; // 5 menit

function countdown() {
    let now = new Date().getTime();
    let selisih = batasWaktu - (now - waktuPemesanan);

    if (selisih <= 0) {
        alert("Waktu habis!");
        window.location.href = "index-cineplex.php";
        return;
    }

    let menit = Math.floor(selisih / 60000);
    let detik = Math.floor((selisih % 60000) / 1000);

    menit = menit < 10 ? "0" + menit : menit;
    detik = detik < 10 ? "0" + detik : detik;

    document.getElementById("timerButton").innerText = menit + ":" + detik;

    setTimeout(countdown, 1000);
}

window.onload = countdown;
</script>

</body>
</html>