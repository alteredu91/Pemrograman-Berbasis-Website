<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fungsi untuk membersihkan data input agar aman
    function clean_input($data) {
        // Menghapus spasi di awal dan akhir
        $data = trim($data);
        // Menghapus karakter backslash
        $data = stripslashes($data);
        // Mengubah karakter berbahaya menjadi entitas HTML untuk mencegah XSS
        $data = htmlspecialchars($data);
        return $data;
    }

    // Membersihkan semua input dari form
    $nama = clean_input($_POST['Nama']);
    $email = clean_input($_POST['Email']);
    $komentar = clean_input($_POST['Khomentar']);
    $gender = clean_input($_POST['Gender']);

    // Simpan nama di cookies selama 1 hari (cookie aman)
    setcookie('Nama', $nama, time() + 86400, "", "", false, true); // Cookie aman dengan HttpOnly flag

    // Format data yang akan disimpan
    $data = "$nama | $email | $komentar | $gender\n";

    // Simpan data ke file text
    file_put_contents("bukutamu.txt", $data, FILE_APPEND | LOCK_EX);

    // Tampilkan pesan konfirmasi
    echo "Terima Kasih Telah Mengisi Buku Tamu!";
    echo "<br><a href='index.php'>Kembali Ke Halaman Utama</a>";
}
?>