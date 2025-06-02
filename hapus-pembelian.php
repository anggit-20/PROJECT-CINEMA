<?php
include 'koneksi.php';

if (isset($_GET['id_pemesanan'])) {
    $id = $_GET['id_pemesanan'];

    $sql = "DELETE FROM pemesanan WHERE id_pemesanan = :id_pemesanan";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_pemesanan', $id);

    if ($stmt->execute()) {
        // Redirect ke halaman daftar film
        header("Location: index-admin.php?status=sukses");
        exit();
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID film tidak ditemukan.";
}

?>