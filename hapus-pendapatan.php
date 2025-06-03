<?php
include 'koneksi.php';

if (isset($_GET['tanggal'])) {
    $tanggal = $_GET['tanggal'];

    $sql = "DELETE FROM pendapatan WHERE tanggal = :tanggal";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':tanggal', $tanggal);

    if ($stmt->execute()) {
        // Redirect ke halaman daftar film
        header("Location: index-admin.php?status=sukses");
        exit();
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "tanggal tidak ditemukan.";
}

?>