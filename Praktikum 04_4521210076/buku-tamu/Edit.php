<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

require_once 'controllers/GuestController.php';

$guestController = new GuestController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $guestController->readAll();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($row['id'] == $id) {
            $name = $row['name'];
            $comment = $row['comment'];
            break;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $guestController->update($id, $name, $comment);
    header("Location: admin.php");
}

?>

<h2>Edit Komentar</h2>
<form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="name">Nama:</label><br>
    <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required><br><br>
    <label for="comment">Komentar:</label><br>
    <textarea name="comment" rows="5" required><?php echo htmlspecialchars($comment); ?></textarea><br><br>
    <input type="submit" value="Update">
</form>