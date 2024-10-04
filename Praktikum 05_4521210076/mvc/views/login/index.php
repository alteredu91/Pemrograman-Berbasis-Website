<h2>Form Login</h2>
<form action="<?= BASEURL; ?>index.php?url=login/auth" method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>