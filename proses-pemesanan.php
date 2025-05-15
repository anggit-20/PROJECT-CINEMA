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
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jumlah_tiket = $_POST['jumlah_tiket'];
    $id_film = $_POST['id_film'];
    $jam_tayang = $_POST['jam_tayang'];

    // mengecek apakah kursi sudah dipesan apa belum
    if (isset($_POST['kursi']) && !empty($_POST['kursi'])) {
        foreach ($_POST['kursi'] as $kursi) {
            $stmt = $conn->prepare("SELECT * FROM pemesanan WHERE id_film = ? AND jam_tayang = ? AND kursi = ?");
            $stmt->execute([$id_film, $jam_tayang, $kursi]);

            if ($stmt->rowCount() > 0) {
                echo "Kursi $kursi sudah terisi!<br>";
            } else {
                $stmt = $conn->prepare("INSERT INTO pemesanan (id_film, jam_tayang, nama, email, jumlah_tiket, kursi) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$id_film, $jam_tayang, $nama, $email, $jumlah_tiket, $kursi]);
                echo "Kursi $kursi berhasil dipesan.<br>";
            }
        }
    } else {
        echo "Tidak ada kursi yang dipilih";
    }
    
}
?>
