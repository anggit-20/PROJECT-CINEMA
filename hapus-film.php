<?php
include 'koneksi.php';

if (isset($_GET['id_film'])) {
    $id = $_GET['id_film'];

    $sql = "DELETE FROM film WHERE id_film = :id_film";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_film', $id);

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
