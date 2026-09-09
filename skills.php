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
    <title>Skills</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="stylesheetSKILLS.css">
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
            <a href="education.php">Education</a>
            <a href="portfolio.php">Portfolio</a>
            <a href="viewBlog.php">Blog</a>
        </nav>
    </header>

    <main id="page-content">
        <h1 id="skills-text">Skills</h1>

        <article id="skills-content">

            <section id="skills-intro">
                <p>
                    This page outlines my technical, academic, and professional strengths developed through university study, coursework, and personal development.
                </p>
            </section>

            <!-- Skills section -->
            <section id="skills-section">
                <h2>Skills & Experience</h2>

                <section id="skills-grid">

                    <!-- Technical skills box -->
                    <article class="skills-box">
                        <h3>Technical and Professional Skills</h3>

                        <div id="skills-inner-grid">
                            <div class="mini-skill-box">Java</div>
                            <div class="mini-skill-box">HTML/CSS</div>
                            <div class="mini-skill-box">Problem solving</div>
                            <div class="mini-skill-box">Communication and Teamwork</div>
                        </div>
                    </article>

                    <!-- Experience box -->
                    <article class="skills-box">
                        <h3>Experience</h3>
                        <p>Sep 2023 - Sep 2023</p>
                        <p>Here™ (previously known as OpenFin)</p>
                        <p>Enterprise software company</p>
                    </article>

                </section>
            </section>

        </article>
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
