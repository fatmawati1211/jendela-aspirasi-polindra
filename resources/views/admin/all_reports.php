<!-- File: admin/view/resource/all_reports.php -->
<?php
// Memanggil koneksi database
require_once '../../config/db_connection.php';

// Query untuk mengambil data dari tabel reports
$sql = "SELECT * FROM reports ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seluruh Laporan</title>
</head>
<body>
    <h1>Daftar Seluruh Laporan</h1>
    
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>" . $row["created_at"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada laporan.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>

<?php
// Tutup koneksi
$conn->close();
?>
