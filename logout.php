<?php
// Start the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to login page or any other page after logout
ob_start(); // Start output buffering
header("Location: login.php");
ob_end_flush(); // Flush the output buffer and send the header
exit;
?>
