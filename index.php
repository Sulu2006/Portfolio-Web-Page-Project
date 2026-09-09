<?php
/* Sets the navigation login link depending on whether the user is logged in. */
session_start();

if (isset($_SESSION["user_id"])) {
    $loginLink = "logout.php";
    $loginText = "Log out";
} else {
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
    <title>Suleyman's Webpage</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="stylesheetINDEX.css">
    <link rel="stylesheet" href="responsive.css">
</head>

<body>
    <header>
        <nav>
            <img id="small-logo" src="Images/Transparant Logo (1).png" alt="Suleyman logo">

            <span>Suleyman Macit</span>

            <a href="<?php echo $loginLink; ?>" id="login"><?php echo $loginText; ?></a>
            <a href="skills.php">Skills</a>
            <a href="education.php">Education</a>
            <a href="portfolio.php">Portfolio</a>
            <a href="viewBlog.php">Blog</a>
        </nav>
    </header>

    <main>
        <!-- FIRST PAGE / WELCOME SECTION -->
        <section id="welcome">
            <img id="big-logo" src="Images/Transparant Logo (1).png" alt="Suleyman Macits logo">
            <h1>Welcome to my portfolio</h1>
        </section>

        <!-- SECOND PAGE / ABOUT SECTION -->
        <section id="about">
            <section>
                <figure>
                    <img src="Images/edited(2).png" alt="Portrait of Suleyman Macit">
                    <figcaption>Aspiring CS student.</figcaption>
                </figure>
            </section>

            <article>
                <h2 id="AboutMe">About Me</h2>

                <div id="about-grid">
                    <div class="about-box">Dedicated first-year BSc Computer Science undergraduate studying at Queen Mary</div>
                    <div class="about-box">Has an interest in staying active, like going to the gym and playing basketball.</div>
                    <div class="about-box">Strong interest in programming, problem-solving, and software development.</div>
                    <div class="about-box">Tends to learn new technical concepts quickly and apply them efficiently.</div>
                </div>
              </article>
        </section>
    </main>

    <!--Contact links-->
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
