<?php
session_start();

// Cek apakah pengguna sudah login, jika belum redirect ke halaman login.php
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts - My Blog</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>BOOK DFH</h1>
            <nav>
                <a href="index.php">Home</a>
                <a href="new_post.php">New Post</a>
                <a href="logout.php">Logout</a>
            </nav>
        </div>
    </header>
    <main class="container">
        <h2>Recent Posts</h2>
        <article>
            <h3><a href="post.php?id=1">Post Title 1</a></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt turpis eu fermentum.</p>
        </article>
        <article>
            <h3><a href="post.php?id=2">Post Title 2</a></h3>
            <p>Phasellus nec elit non ante scelerisque fringilla.</p>
        </article>
        <!-- Contoh artikel lainnya -->
    </main>
    <footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> BOOK DFH. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
