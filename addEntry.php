<?php
/* Starts the session so this page can access login and preview data stored in $_SESSION. */
session_start();

/* 
Checks whether the user is logged in.
If no user_id exists in the session, the user is redirected back to the login page.
*/
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

/* Sets default empty values for the blog form fields. */
$savedTitle = "";
$savedBody = "";

/* 
If the user came back from the preview page, reuse the saved title
so they do not have to type it again.
*/
if (isset($_SESSION["preview_title"])) {
    $savedTitle = $_SESSION["preview_title"];
}

/* 
If the user came back from the preview page, reuse the saved blog body
so they do not have to type it again.
*/
if (isset($_SESSION["preview_body"])) {
    $savedBody = $_SESSION["preview_body"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta information -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="stylesheetADDENTRY.css">
    <link rel="stylesheet" href="responsive.css">

    <!-- JavaScript -->
    <script src="addEntry.js" defer></script>
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
        </nav>
    </header>

    <main id="page-content">
        <aside id="login-status">
            <p>Welcome <?php echo htmlspecialchars($_SESSION["email"]); ?></p>
            <p>You are logged in and can add a blog post.</p>
        </aside>

        <section>
            <form method="post" action="addPost.php">
                <fieldset>
                    <legend>Post Blog</legend>

                    <!-- Blog input fields -->
                    <article>
                        <fieldset>
                            <p>
                                <label for="title">Blog Title</label>
                                <input type="text" placeholder="Blog title here..." name="title" id="title" value="<?php echo htmlspecialchars($savedTitle); ?>">
                            </p>

                            <p>
                                <label for="body">Blog Body</label>
                                <textarea name="body" id="body" rows="10" placeholder="Write your blog post here..."><?php echo htmlspecialchars($savedBody); ?></textarea>
                            </p>
                        </fieldset>
                    </article>

                    <!-- Form buttons -->
                    <article>
                        <p class="button">
                            <button type="submit" formaction="previewPost.php">Preview Blog</button>
                            <button type="submit">Post Blog</button>
                            <button type="reset">Clear Blog</button>
                        </p>
                    </article>

                </fieldset>
            </form>
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
