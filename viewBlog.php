<?php
/* Starts the session and connects to the database. */
session_start();
require "dbconnect.php";

/* Gets all blog posts from the database. */
$posts = array();
$sql = "SELECT id, title, body, created_at FROM blog_posts";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
}

/* Sorts posts newest-first using insertion sort. */
for ($i = 1; $i < count($posts); $i++) {
    $currentPost = $posts[$i];
    $position = $i - 1;

    while ($position >= 0 && strtotime($posts[$position]["created_at"]) < strtotime($currentPost["created_at"])) {
        $posts[$position + 1] = $posts[$position];
        $position--;
    }

    $posts[$position + 1] = $currentPost;
}

/* Closes the database connection after loading the posts. */
$conn->close();

/* Gets the selected archive month from the URL. */
$selectedMonth = "all";

if (isset($_GET["month"])) {
    $selectedMonth = $_GET["month"];
}

/* Builds the month archive and filters posts by the selected month. */
$months = array();
$filteredPosts = array();

foreach ($posts as $post) {
    $postMonth = date("Y-m", strtotime($post["created_at"]));

    if (!in_array($postMonth, $months)) {
        $months[] = $postMonth;
    }

    if ($selectedMonth == "all" || $selectedMonth == $postMonth) {
        $filteredPosts[] = $post;
    }
}

/* Sets the Add Post and login/logout links depending on session status. */
if (isset($_SESSION["user_id"])) {
    $addPostLink = "addEntry.php";
    $loginLink = "logout.php";
    $loginText = "Log out";
} else {
    $addPostLink = "login.php";
    $loginLink = "login.php";
    $loginText = "Log in";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta information -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Blog</title>

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

            <a href="<?php echo $loginLink; ?>" id="login"><?php echo $loginText; ?></a>
            <a href="index.php">Home</a>
            <a href="skills.php">Skills</a>
            <a href="education.php">Education</a>
            <a href="portfolio.php">Portfolio</a>
            <a href="viewBlog.php">Blog</a>
        </nav>
    </header>

    <main id="page-content">
        <section id="blog-section">
            <h1>Blog</h1>

            <p id="add-post-link">
                <a href="<?php echo $addPostLink; ?>">Add Post</a>
            </p>

            <form id="archive-form" method="get" action="viewBlog.php">
                <label for="month">View posts from</label>

                <select name="month" id="month">
                    <option value="all">All months</option>

                    <?php foreach ($months as $month): ?>
                        <option value="<?php echo htmlspecialchars($month); ?>" <?php if ($selectedMonth == $month) { echo "selected"; } ?>>
                            <?php echo date("F Y", strtotime($month . "-01")); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <button type="submit">View</button>
            </form>

            <?php if (count($filteredPosts) == 0): ?>
                <article class="blog-post">
                    <?php if (count($posts) == 0): ?>
                        <p class="post-body">There are no blog posts yet.</p>
                    <?php else: ?>
                        <p class="post-body">There are no blog posts for this month.</p>
                    <?php endif; ?>
                </article>
            <?php endif; ?>

            <?php foreach ($filteredPosts as $post): ?>
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
