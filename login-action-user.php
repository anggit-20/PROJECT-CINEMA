<?php
include 'koneksi.php';

// $nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM user WHERE email = :email";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && $user['password'] == $password) {
    session_start();
    // $_SESSION['nama'] = $user['nama'];
    $_SESSION['id_user'] = $user['id_user'];
    $_SESSION['email'] = $user['email'];

    header("Location: index-user.php");
    exit;
} else {
    echo "Email atau password salah.";
}


?>
