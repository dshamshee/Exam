<?php
// Example of handling registration input
session_start();

// Retrieve submitted data
$username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';

echo "<h1>Registration Successful!</h1>";
echo "<p>Thank you, $username. You have been registered with the email $email.</p>";
echo "<a href='index.php'>Back to Login</a>";
?>
