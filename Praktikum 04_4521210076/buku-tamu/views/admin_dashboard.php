<h2>Dashboard Admin</h2>
<p>Selamat datang, Admin!</p>
<a href="logout.php">Logout</a>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Nama</th>
        <th>Komentar</th>
        <th>Waktu</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = $guests->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['comment']); ?></td>
        <td><?php echo $row['created_at']; ?></td>
        <td>
            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="admin.php?delete_id=<?php echo $row['id']; ?>"
                onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>