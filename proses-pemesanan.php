<?php

    include 'koneksi.php';
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $id_film = $_POST['id_film'];
        $kursi_terpilih = $_POST['kursi_terpilih'];
    }

    $sql = "SELECT kursi FROM pemesanan WHERE id_film = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_film]);
    $kursi_terisi = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $kursi = explode(',', $row['kursi']);
        $kursi_terisi = array_merge($kursi_terisi, $kursi);
    }

    // Simpan ke database
    try {
        $stmt = $conn->prepare("INSERT INTO pemesanan (nama, email, id_film, kursi) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nama, $email, $id_film, $kursi_terpilih]);

        echo "Pemesanan berhasil!";
    } catch (PDOException $e) {
        echo "Gagal menyimpan data: " . $e->getMessage();
    }
 
?>