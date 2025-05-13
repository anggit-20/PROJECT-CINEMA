<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $id_film = $_POST['id_film'];
    $jam_tayang = $_POST['jam_tayang'];
    $kursi_terpilih = $_POST['kursi']; // array dari checkbox

    $kursi_terpakai = [];
    $kursi_tersimpan = [];

    foreach ($kursi_terpilih as $kursi) {
        $kursi = strtoupper(trim($kursi));

        // Cek apakah kursi sudah dipesan
        $stmt = $conn->prepare("SELECT * FROM pemesanan WHERE id_film = ? AND jam_tayang = ? AND kursi = ?");
        $stmt->execute([$id_film, $jam_tayang, $kursi]);

        if ($stmt->rowCount() > 0) {
            $kursi_terpakai[] = $kursi;
        } else {
            // Simpan ke database
            $stmt = $conn->prepare("INSERT INTO pemesanan (id_film, jam_tayang, nama, email, kursi) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$id_film, $jam_tayang, $nama, $email, $kursi]);
            $kursi_tersimpan[] = $kursi;
        }
    }

    // Tampilkan hasil
    if (!empty($kursi_tersimpan)) {
        echo "Berhasil memesan kursi: " . implode(", ", $kursi_tersimpan) . "<br>";
    }

    if (!empty($kursi_terpakai)) {
        echo "Kursi yang sudah terisi: " . implode(", ", $kursi_terpakai);
    }
}
?>
