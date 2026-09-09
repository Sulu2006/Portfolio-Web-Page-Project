<?php
/* Starts the current session so it can be cleared. */
session_start();

/* Removes all session variables. */
$_SESSION = array();

/* Destroys the session on the server. */
session_destroy();

/* Sends the user back to the homepage. */
header("Location: index.php");
exit();
?>