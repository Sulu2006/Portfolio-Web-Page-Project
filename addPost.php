<?php
/* Starts the session so login and preview data can be used. */
session_start();

/* Redirects users who are not logged in. */
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

/* Gets the blog title and body from either the form or the preview session. */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST["title"]);
    $body = trim($_POST["body"]);
} else if (isset($_GET["fromPreview"]) && isset($_SESSION["preview_title"]) && isset($_SESSION["preview_body"])) {
    $title = trim($_SESSION["preview_title"]);
    $body = trim($_SESSION["preview_body"]);
} else {
    header("Location: addEntry.php");
    exit();
}

/* Connects to the database. */
require "dbconnect.php";

/* Stops empty blog posts from being added. */
if ($title == "" || $body == "") {
    header("Location: addEntry.php");
    exit();
}

/* Escapes the data before placing it into the SQL query. */
$title = $conn->real_escape_string($title);
$body = $conn->real_escape_string($body);
$created_at = date("Y-m-d H:i:s");

/* Inserts the new blog post into the database. */
$sql = "INSERT INTO blog_posts (title, body, created_at)
        VALUES ('$title', '$body', '$created_at')";

/* If the insert works, clear preview data and redirect to the blog page. */
if ($conn->query($sql) === TRUE) {
    unset($_SESSION["preview_title"]);
    unset($_SESSION["preview_body"]);

    $conn->close();
    header("Location: viewBlog.php");
    exit();
}

/* Shows a database error if the insert fails. */
echo "Error adding blog post: " . $conn->error;
$conn->close();
?>
