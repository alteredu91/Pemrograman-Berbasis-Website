<h3>Daftar Komentar</h3>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Nama</th>
        <th>Komentar</th>
        <th>Waktu</th>
    </tr>
    <?php while ($row = $guests->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['comment']); ?></td>
        <td><?php echo $row['created_at']; ?></td>
    </tr>
    <?php } ?>
</table>