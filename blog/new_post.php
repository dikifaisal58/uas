<?php
session_start();

// Cek apakah pengguna sudah login, jika belum redirect ke halaman login.php
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Pesan kesalahan upload foto
$image_error = '';

// Proses upload foto jika form dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extensions) === false) {
        $image_error = "Extensinya tidak diijinkan, pilih file yang lain";
    }

    if ($file_size > 2097152) {
        $image_error = 'File melebihi batas maksimal';
    }

    if (empty($image_error) == true) {
        move_uploaded_file($file_tmp, "img/" . $file_name);
        echo "Sukses";
    } else {
        echo "gagal";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Post - My Blog</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>BOOK DFH</h1>
            <nav>
                <a href="index.php">Home</a>
                <a href="post.php">Posts</a>
                <a href="logout.php">Logout</a>
            </nav>
        </div>
    </header>
    <main class="container">
        <h2>Create a New Post</h2>
        <form action="new_post.php" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="input-group">
                <label for="content">Content:</label>
                <textarea id="content" name="content" required></textarea>
            </div>
            <div class="input-group">
                <label for="image">Choose Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>
        <?php if (!empty($image_error)): ?>
            <p class="error"><?php echo htmlspecialchars($image_error); ?></p>
        <?php endif; ?>
    </main>
    <footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> BOOK DFH. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
