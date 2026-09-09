<?php
/* Starts the session and connects to the database. */
session_start();
require "dbconnect.php";

/* Checks submitted login details against the users table. */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    $sql = "SELECT id, email FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    /* If exactly one matching user is found, save their details in the session. */
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        $_SESSION["user_id"] = $row["id"];
        $_SESSION["email"] = $row["email"];

        header("Location: addEntry.php");
        exit();
    }
}

/* Closes the database connection. */
$conn->close();

/* Sets the navigation login/logout link. */
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
    <title>Login Failed</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="stylesheetLOGIN.css">
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
        <section>
            <fieldset>
                <legend>Login Failed</legend>

                <p>The email address or password was incorrect.</p>

                <p class="button">
                    <a href="login.php">Try Again</a>
                </p>
            </fieldset>
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
