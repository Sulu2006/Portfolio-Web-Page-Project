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
    <title>Education</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="stylesheetEDUCATION.css">
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
            <a href="portfolio.php">Portfolio</a>
            <a href="viewBlog.php">Blog</a>
        </nav>
    </header>

    <main id="page-content">
        <h1 id="education-text">Education</h1>

        <article id="education-content">

            <section id="education-intro">
                <p>
                    First-year Computer Science student building a strong academic foundation through university study and previous qualifications.
                </p>
            </section>

            <!-- Qualifications section -->
            <section id="qualifications-section">
                <h2>Qualifications</h2>

                <section id="qualification-grid">

                    <!-- University qualification -->
                    <article class="qualification-box">
                        <h3>Queen Mary University of London</h3>
                        <p>Sep 2025 - Jul 2028</p>
                        <p>BSc Computer Science</p>
                        <p>First-year undergraduate student.</p>
                    </article>

                    <!-- School qualification -->
                    <article class="qualification-box">
                        <h3>Harris Academy Battersea</h3>

                        <div id="education-inner-grid">
                            <div class="mini-education-box">Sep 2018 - Jul 2025</div>
                            <div class="mini-education-box">A - Physics</div>
                            <div class="mini-education-box">A - Mathematics</div>
                            <div class="mini-education-box">B - Economics</div>
                        </div>
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
