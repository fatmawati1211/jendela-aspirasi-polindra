// File: controller/submit_report.php
<?php
// Memanggil koneksi database
require_once '../config/db_connection.php';

// Ambil data dari form
$title = $_POST['title'];
$description = $_POST['description'];

// Query untuk memasukkan data ke tabel reports
$sql = "INSERT INTO reports (title, description, created_at) VALUES ('$title', '$description', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "Laporan berhasil dikirim!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
