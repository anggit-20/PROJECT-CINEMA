<?php
include 'koneksi.php';

session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['id_user'])) {
    
    // Jika belum login, redirect ke login.php
    header("Location: login-user.php");
    exit;
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit;

    $id_user = $_SESSION['id_user']; // menambhakan id_user yang login ke $pemesanan
    $jumlah_tiket = $_POST['jumlah_tiket'];
    $id_film = $_POST['id_film'];
    $jam_tayang = $_POST['jam_tayang'];
    $tanggal_pemesanan = date('Y-m-d');


    //ambil harga film untuk menghitung total
    $stmtHarga = $conn->prepare("SELECT harga FROM film WHERE id_film = ?");
    $stmtHarga->execute([$id_film]);
    $film = $stmtHarga->fetch(PDO::FETCH_ASSOC);
    $harga = $film['harga'];

//     echo "Harga: $harga <br>";
// echo "Jumlah Tiket: $jumlah_tiket <br>";
// echo "Total: " . ($harga * $jumlah_tiket) . "<br>";
// exit;


    //hitung total
    $total = $harga * $jumlah_tiket * 1000;

    // mengecek apakah kursi sudah dipesan apa belum
    if (isset($_POST['kursi']) && !empty($_POST['kursi'])) {

        //menggabungkan array kursi terpilih jadi string
        $kursi_terpilih = implode(',', $_POST['kursi']);

        foreach ($_POST['kursi'] as $kursi) {
            $stmt = $conn->prepare("SELECT * FROM pemesanan WHERE id_film = ? AND jam_tayang = ? AND kursi = ?");
            $stmt->execute([$id_film, $jam_tayang, $kursi]);

            if ($stmt->rowCount() > 0) { 
                echo "Kursi $kursi sudah terisi!<br>";
            } 
                
           
        }
    } else {
        echo "Tidak ada kursi yang dipilih";
    }

    $stmt = $conn->prepare("INSERT INTO pemesanan (id_user, id_film, jam_tayang, jumlah_tiket, kursi, total, tanggal_pemesanan) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$id_user, $id_film, $jam_tayang, $jumlah_tiket, $kursi_terpilih, $total, $tanggal_pemesanan]);

    $id_pemesanan = $conn->lastInsertId();
        
    header("Location: detail-reserv.php?id=$id_pemesanan");
    exit;
    
}
?>
