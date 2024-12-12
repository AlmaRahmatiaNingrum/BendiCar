<?php
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $sql)) {
        header('Location: login.php');
    } else {
        $error = "Terjadi kesalahan.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
    <script src="myscript.js"></script>
</head>
<body>
    <header>
        <h1>Register</h1>
    </header>
    <main>
        <form method="POST" action="">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Register</button>
        </form>
        <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    </main>
</body>
</html>
