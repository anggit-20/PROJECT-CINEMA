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
        $jam_tayang = $_POST['jam_tayang'];

        // Jika ada file gambar diupload
        if (isset($_FILES['thumbnail'])) {
            $file_name = $_FILES['thumbnail']['name'];
            $file_tmp = $_FILES['thumbnail']['tmp_name'];
            $upload_dir = 'theme/dist/thumbnail/';  // Tentukan folder untuk menyimpan file
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

        //ambil id film yang baru saja ditambahkan
        $film_id = $pdo->lastInsertId();

        //simpan jam tayang
        foreach($jam_tayang as $jam) {
            $stmt_jam = $pdo->prepare("INSERT INTO showtime (film_id, jam) VALUES (:film_id, :jam)");
            $stmt_jam->bindParam(':film_id', $film_id);
            $stmt_jam->bindParam(':jam', $jam);
            $stmt_jam->execute();
        }

        // Eksekusi query
        $stmt->execute();

        // Redirect ke halaman utama atau tampilkan pesan sukses
        header("Location: index-cineplex.php?message=Film berhasil ditambahkan");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
