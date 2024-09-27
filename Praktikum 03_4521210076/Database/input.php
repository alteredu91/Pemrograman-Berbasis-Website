<?php
// Mengimpor file koneksi
include 'koneksi.php';

// Proses penyimpanan data jika formulir disubmit
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $komentar = $_POST['komentar'];

    // SQL untuk insert data ke tabel tamu
    $sql = "INSERT INTO tamu (nama, email, komentar) VALUES ('$nama', '$email', '$komentar')";

    // Eksekusi query dan cek keberhasilannya
    if ($conn->query($sql) === TRUE) {
        echo "<p>Terima kasih, data Anda telah disimpan!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Buku Tamu</title>
</head>

<body>
    <h1>Isi Buku Tamu</h1>

    <!-- Formulir untuk input data tamu -->
    <form method="post" action="input.php">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="komentar">Komentar:</label><br>
        <textarea id="komentar" name="komentar" required></textarea><br><br>

        <input type="submit" name="submit" value="Kirim">
    </form>

    <p><a href="index.php">Kembali ke Landing Page</a></p>
</body>

</html>