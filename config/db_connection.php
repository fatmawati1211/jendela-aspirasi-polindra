<!-- File: config/db_connection.php -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jap_db";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
