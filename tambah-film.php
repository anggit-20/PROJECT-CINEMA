<?php
// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database (gunakan PDO atau MySQLi)
    $host = 'localhost';
    $dbname = 'db_cinema';
    $username = 'root';
    
    try {
        // Koneksi ke database
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Ambil data dari form
        $judul = $_POST['judul'];
        $tahun = $_POST['tahun'];
        $durasi = $_POST['durasi'];
        $genre = $_POST['genre'];
        $usia = $_POST['usia'];
        $harga = $_POST['harga'];
        $sinopsis = $_POST['sinopsis'];
        $studio = $_POST['studio'];

        // Jika ada file gambar diupload
        if (isset($_FILES['thumbnail'])) {
            $file_name = $_FILES['thumbnail']['name'];
            $file_tmp = $_FILES['thumbnail']['tmp_name'];
            $upload_dir = 'theme/dist/tumbnail';  // Tentukan folder untuk menyimpan file
            move_uploaded_file($file_tmp, $upload_dir . $file_name);
        } else {
            $file_name = null;
        }

        // Query untuk menyimpan data film
        $sql = "INSERT INTO film (judul, tahun, durasi, genre, usia, harga, sinopsis, studio, thumbnail) 
                VALUES (:judul, :tahun, :durasi, :genre, :usia, :harga, :sinopsis, :studio, :thumbnail)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':judul', $judul);
        $stmt->bindParam(':tahun', $tahun);
        $stmt->bindParam(':durasi', $durasi);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':usia', $usia);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':sinopsis', $sinopsis);
        $stmt->bindParam(':studio', $studio);
        $stmt->bindParam(':thumbnail', $file_name);

        // Eksekusi query
        $stmt->execute();

        // Redirect ke halaman utama atau tampilkan pesan sukses
        header("Location: index-cineplex.php?message=Film berhasil ditambahkan");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
