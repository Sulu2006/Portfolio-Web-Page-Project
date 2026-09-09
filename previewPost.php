<?php
/* Starts the session and blocks users who are not logged in. */
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

/* Gets the preview title and body from the form or saved session data. */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST["title"]);
    $body = trim($_POST["body"]);

    if ($title == "" || $body == "") {
        header("Location: addEntry.php");
        exit();
    }

    $_SESSION["preview_title"] = $title;
    $_SESSION["preview_body"] = $body;
} else if (isset($_SESSION["preview_title"]) && isset($_SESSION["preview_body"])) {
    $title = $_SESSION["preview_title"];
    $body = $_SESSION["preview_body"];
} else {
    header("Location: addEntry.php");
    exit();
}

/* Loads all previous blog posts from the database. */
require "dbconnect.php";

$posts = array();
$sql = "SELECT id, title, body, created_at FROM blog_posts";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
}

/* Sorts posts by newest date first using insertion sort. */
for ($i = 1; $i < count($posts); $i++) {
    $currentPost = $posts[$i];
    $position = $i - 1;

    while ($position >= 0 && strtotime($posts[$position]["created_at"]) < strtotime($currentPost["created_at"])) {
        $posts[$position + 1] = $posts[$position];
        $position--;
    }

    $posts[$position + 1] = $currentPost;
}

/* Closes the database connection. */
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta information -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Blog</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="stylesheetVIEWBLOG.css">
    <link rel="stylesheet" href="responsive.css">
</head>

<body>

    <header>
        <!-- Navigation bar -->
        <nav>
            <img id="small-logo" src="Images/Transparant Logo (1).png" alt="Suleyman logo">

            <span>Suleyman Macit</span>

            <a href="logout.php" id="login">Log out</a>
            <a href="index.php">Home</a>
            <a href="skills.php">Skills</a>
            <a href="education.php">Education</a>
            <a href="portfolio.php">Portfolio</a>
            <a href="viewBlog.php">Blog</a>
        </nav>
    </header>

    <main id="page-content">
        <section id="blog-section">
            <h1>Preview Blog Post</h1>

            <p id="preview-links">
                <a href="addPost.php?fromPreview=1">Upload Post</a>
                <a href="addEntry.php">Edit Post</a>
            </p>

            <article class="blog-post">
                <p class="post-date">
                    <?php echo date("jS F Y, H:i"); ?>
                </p>

                <h2 class="post-title">
                    <?php echo htmlspecialchars($title); ?>
                </h2>

                <p class="post-body">
                    <?php echo nl2br(htmlspecialchars($body)); ?>
                </p>
            </article>

            <hr>

            <h2 id="preview-heading">Previous Blog Posts</h2>

            <?php if (count($posts) == 0): ?>
                <article class="blog-post">
                    <p class="post-body">There are no previous blog posts yet.</p>
                </article>
            <?php endif; ?>

            <?php foreach ($posts as $post): ?>
                <article class="blog-post">
                    <p class="post-date">
                        <?php echo date("jS F Y, H:i", strtotime($post["created_at"])); ?>
                    </p>

                    <h2 class="post-title">
                        <?php echo htmlspecialchars($post["title"]); ?>
                    </h2>

                    <p class="post-body">
                        <?php echo nl2br(htmlspecialchars($post["body"])); ?>
                    </p>
                </article>

                <hr>
            <?php endforeach; ?>
        </section>
    </main>

    <!-- Contact links -->
    <footer id="contact">
        <a href="mailto:smacit2006@gmail.com?subject=Portfolio%20Contact">
            <img src="Images/email.png" alt="Email">
        </a>

        <a href="https://github.com/Sulu2006" target="_blank">
            <img src="Images/github.png" alt="GitHub">
        </a>

        <a href="https://www.linkedin.com/in/suleyman-macit/" target="_blank">
            <img src="Images/linkedin.png" alt="LinkedIn">
        </a>

        <a href="https://www.freepik.com/" target="_blank" id="freepik-credit">
            Background image source: Freepik
        </a>
    </footer>

</body>
</html>
