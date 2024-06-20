<?php
session_start();

// Cek apakah pengguna sudah login, jika sudah redirect ke halaman new_post.php
if (isset($_SESSION['username'])) {
    header("Location: new_post.php");
    exit();
}

// Pesan error default
$error = '';

// Proses login jika form dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Data username dan password yang valid (secara sederhana, ini adalah contoh statis)
    $valid_username = 'admin';
    $valid_password = 'password';

    // Bandingkan username dan password yang dimasukkan dengan yang valid
    if ($username === $valid_username && $password === $valid_password) {
        // Set session untuk menandakan pengguna sudah login
        $_SESSION['username'] = $username;
        header("Location: new_post.php");
        exit();
    } else {
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - My Blog</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>BOOK DFH</h1>
            <nav>
                <a href="index.php">Home</a>
            </nav>
        </div>
    </header>
    <main class="container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
            <?php if (!empty($error)): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
        </form>
    </main>
    <footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> BOOK DFH. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
