<?php
// Mengimpor file koneksi
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku Tamu</title>
</head>

<body>
    <h1>Daftar Buku Tamu</h1>

    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Komentar</th>
            <th>Tanggal</th>
        </tr>

        <?php
        // Ambil data dari tabel tamu
        $sql = "SELECT nama, email, komentar, tanggal FROM tamu ORDER BY tanggal DESC";
        $result = $conn->query($sql);

        // Tampilkan data tamu dalam tabel
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["nama"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["komentar"]) . "</td>";
                echo "<td>" . $row["tanggal"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Belum ada data tamu.</td></tr>";
        }

        // Menutup koneksi
        $conn->close();
        ?>
    </table>

    <p><a href="index.php">Kembali ke Landing Page</a></p>
</body>

</html>