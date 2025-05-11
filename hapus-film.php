<?php
include 'koneksi.php';

$id = $_GET['id_film'];

$sql = "DELETE FROM film WHERE id_film=:id_film";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':id_film', $id);

$stmt->execute();
?>