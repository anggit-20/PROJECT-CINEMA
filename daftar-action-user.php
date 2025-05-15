<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO user (nama, email, password) VALUES (:nama, :email, :password)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':nama', $nama);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);

$stmt->execute();

header('Location: index-cineplex.php');
?>
