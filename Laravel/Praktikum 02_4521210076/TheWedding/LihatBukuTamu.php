<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Buku Tamu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-top: 20px;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        p {
            font-size: 14px;
            line-height: 1.5;
            margin-top: 20px;
        }
        .last-entry {
            font-weight: bold;
            color: #3498db;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #3498db;
        }
    </style>
</head>
<body>
<h2>Daftar Buku Tamu</h2>

<!--Embed kode PHP di dalam HTML-->
<?php
// Cek apakah file buku tamu ada
if (file_exists("bukutamu.txt")) {
    // Baca isi file buku tamu
    $data = file("bukutamu.txt", FILE_IGNORE_NEW_LINES);

    if (!empty($data)) {
        echo "<table>";
        echo "<tr><th>Nama</th><th>Email</th><th>Komentar</th><th>Gender</th></tr>";

        // Loop melalui setiap baris data dan buat tabel
        foreach ($data as $line) {
            $guest = explode(" | ", $line);  // Memisahkan data berdasarkan " | "
            echo "<tr>";
            foreach ($guest as $info) {
                echo "<td>$info</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Belum Ada Data Buku Tamu.</p>";
    }
} else {
    echo "<p>Belum Ada Data Buku Tamu.</p>";
}

// Tampilkan nama pengunjung terakhir yang tersimpan di cookies
if (isset($_COOKIE['Nama'])) {
    echo "<p class='last-entry'>Terakhir diisi oleh: " . $_COOKIE['Nama'] . "</p>";
}
?>
<!--Akhir kode PHP-->
<a href="index.php">Kembali ke halaman utama</a>
</body>
</html>