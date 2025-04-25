<?php

include 'koneksi.php'; // file koneksi

$judul = $_POST['judul'];
$tahun = $_POST['tahun'];
$durasi = $_POST['durasi'];
$genre = $_POST['genre'];
$usia = $_POST['usia'];
$harga = $_POST['harga'];
$sinopsis = $_POST['sinopsis'];
$studio = $_POST['studio'];

// Upload gambar
$target_dir = "uploads/";
$thumbnail = basename($_FILES["thumbnail"]["name"]);
$target_file = $target_dir . $thumbnail;
move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);

// Simpan ke database
$sql = "INSERT INTO film (judul, tahun, durasi, genre, usia, harga, sinopsis, studio, thumbnail)
        VALUES ('$judul', '$tahun', '$durasi', '$genre', '$usia', '$harga', '$sinopsis', '$studio', '$thumbnail')";

if (mysqli_query($conn, $sql)) {
    echo "Data film berhasil disimpan.";
    header("Location: index-admin.php"); // redirect ke halaman admin
} else {
    echo "Gagal menyimpan data: " . mysqli_error($conn);
}
?>