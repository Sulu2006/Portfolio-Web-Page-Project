<?php
/* Stores the database connection details. */
$servername = "127.0.0.1";
$username = "root";
$password = ""; 
$dbname = "smacit_phase2";

/* Creates a connection to the MySQL database. */
$conn = new mysqli($servername, $username, $password, $dbname);

/* Stops the script if the database connection fails. */
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>